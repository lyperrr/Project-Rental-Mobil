<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rent;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userProfile = $user->userProfile;

        // Hitung total rent
        $totalRents = Rent::where('user_id', $user->id)->count();
        $totalSpent = Rent::where('user_id', $user->id)->sum('total_price');

        return view('profile', compact('user', 'userProfile', 'totalRents', 'totalSpent'), ['title' => 'Profile']);
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

        // Update user data
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        // Handle profile data
        $profileData = [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'ktp_number' => $request->ktp_number,
            'sim_number' => $request->sim_number,
        ];

        // Handle file uploads
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

        // Create or update profile
        if ($user->userProfile) {
            $user->userProfile->update($profileData);
        } else {
            $user->userProfile()->create($profileData);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
