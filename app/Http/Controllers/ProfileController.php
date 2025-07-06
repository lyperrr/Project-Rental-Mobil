<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rent;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userProfile = $user->userProfile;
        $search = $request->input('search');

        // Hitung total statistik
        $totalRents = Rent::where('user_id', $user->id)->count();
        $totalSpent = Rent::where('user_id', $user->id)->sum('total_price');

        // Query dengan pencarian
        $rentalQuery = Rent::with('car')
            ->where('user_id', $user->id)
            ->when($search, function ($query, $search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('order_id', 'like', "%{$search}%")
                        ->orWhereHas('car', function ($q) use ($search) {
                            $q->where('model', 'like', "%{$search}%")
                                ->orWhere('license_plate', 'like', "%{$search}%");
                        });
                });
            })
            ->orderByDesc('created_at');
            

        // Pagination dan carry search value
        $rentalHistory = $rentalQuery->paginate(6)->appends(['search' => $search]);

        return view('profile', [
            'title' => 'Profile',
            'user' => $user,
            'userProfile' => $userProfile,
            'totalRents' => $totalRents,
            'totalSpent' => $totalSpent,
            'rentalHistory' => $rentalHistory,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:100|unique:users,username,' . $user->id,
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'full_name' => 'nullable|string|max:150',
            'phone' => 'nullable|string|max:20',
            'ktp_number' => 'nullable|string|max:50',
            'sim_number' => 'nullable|string|max:50',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ktp_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sim_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $profileData = [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'ktp_number' => $request->ktp_number,
            'sim_number' => $request->sim_number,
        ];

        if ($request->hasFile('photo_profile')) {
            $profileData['photo_profile'] = file_get_contents($request->file('photo_profile')->getRealPath());
            $profileData['photo_profile_mime'] = $request->file('photo_profile')->getMimeType();
        }

        if ($request->hasFile('ktp_image')) {
            $profileData['ktp_image'] = file_get_contents($request->file('ktp_image')->getRealPath());
            $profileData['ktp_image_mime'] = $request->file('ktp_image')->getMimeType();
        }

        if ($request->hasFile('sim_image')) {
            $profileData['sim_image'] = file_get_contents($request->file('sim_image')->getRealPath());
            $profileData['sim_image_mime'] = $request->file('sim_image')->getMimeType();
        }

        if ($user->userProfile) {
            $user->userProfile->update($profileData);
        } else {
            $user->userProfile()->create($profileData);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
