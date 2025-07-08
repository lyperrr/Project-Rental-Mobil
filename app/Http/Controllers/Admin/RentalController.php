<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rent::with(['user', 'car'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $cars = Car::where('status', 'available')->get();

        return view('admin.rentals.create', compact('users', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        try {
            DB::beginTransaction();

            $conflict = Rent::where('car_id', $request->car_id)
                ->where('status', '!=', 'cancelled')
                ->where(function ($q) use ($request) {
                    $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                        ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                        ->orWhere(function ($q2) use ($request) {
                            $q2->where('start_date', '<=', $request->start_date)
                                ->where('end_date', '>=', $request->end_date);
                        });
                })
                ->exists();

            if ($conflict) {
                return back()->with('error', 'Mobil tidak tersedia untuk tanggal tersebut.');
            }

            $rental = Rent::create([
                'user_id' => $request->user_id,
                'car_id' => $request->car_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $request->total_price,
                'status' => $request->status,
                'transaction_id' => 'TXN-' . time() . '-' . rand(1000,9999)
            ]);

            if ($request->status === 'confirmed') {
                Car::where('id', $request->car_id)->update(['status' => 'rented']);
            }

            DB::commit();

            return redirect()->route('admin.rentals.index')->with('success', 'Penyewaan berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rental)
    {
        $rental->load(['user', 'car']);
        return view('admin.rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rental)
    {
        $users = User::where('role', 'user')->get();
        $cars = Car::where('status', 'available')
            ->orWhere('id', $rental->car_id)
            ->get();

        return view('admin.rentals.edit', compact('rental', 'users', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rental)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        try {
            DB::beginTransaction();

            $conflict = Rent::where('car_id', $request->car_id)
                ->where('id', '!=', $rental->id)
                ->where('status', '!=', 'cancelled')
                ->where(function ($q) use ($request) {
                    $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                        ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                        ->orWhere(function ($q2) use ($request) {
                            $q2->where('start_date', '<=', $request->start_date)
                                ->where('end_date', '>=', $request->end_date);
                        });
                })
                ->exists();

            if ($conflict) {
                return back()->with('error', 'Mobil tidak tersedia untuk tanggal tersebut.');
            }

            $oldStatus = $rental->status;
            $oldCarId = $rental->car_id;

            $rental->update([
                'user_id' => $request->user_id,
                'car_id' => $request->car_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $request->total_price,
                'status' => $request->status
            ]);

            if ($oldStatus !== $request->status) {
                if ($request->status === 'confirmed') {
                    Car::where('id', $request->car_id)->update(['status' => 'rented']);
                } elseif (in_array($request->status, ['completed', 'cancelled'])) {
                    Car::where('id', $request->car_id)->update(['status' => 'available']);
                }
            }

            if ($oldCarId !== $request->car_id) {
                Car::where('id', $oldCarId)->update(['status' => 'available']);
                if ($request->status === 'confirmed') {
                    Car::where('id', $request->car_id)->update(['status' => 'rented']);
                }
            }

            DB::commit();

            return redirect()->route('admin.rentals.index')->with('success', 'Penyewaan berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rental)
    {
        try {
            DB::beginTransaction();

            if ($rental->status === 'confirmed') {
                Car::where('id', $rental->car_id)->update(['status' => 'available']);
            }

            $rental->delete();

            DB::commit();

            return redirect()->route('admin.rentals.index')->with('success', 'Penyewaan berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update rental status
     */
    public function updateStatus(Request $request, Rent $rental)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        try {
            DB::beginTransaction();

            $rental->update(['status' => $request->status]);

            if ($request->status === 'confirmed') {
                Car::where('id', $rental->car_id)->update(['status' => 'rented']);
            } elseif (in_array($request->status, ['completed', 'cancelled'])) {
                Car::where('id', $rental->car_id)->update(['status' => 'available']);
            }

            DB::commit();

            return back()->with('success', 'Status penyewaan berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Get rental statistics
     */
    public function statistics()
    {
        $stats = [
            'total_rentals' => Rent::count(),
            'pending_rentals' => Rent::where('status', 'pending')->count(),
            'confirmed_rentals' => Rent::where('status', 'confirmed')->count(),
            'completed_rentals' => Rent::where('status', 'completed')->count(),
            'cancelled_rentals' => Rent::where('status', 'cancelled')->count(),
            'total_revenue' => Rent::where('status', 'completed')->sum('total_price'),
            'monthly_revenue' => Rent::where('status', 'completed')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total_price'),
        ];

        return view('admin.rentals.statistics', compact('stats'));
    }
}
