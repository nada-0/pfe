<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profiles.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profiles.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = '/storage/' . $imagePath;
        }
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->route('profiles.profile')->with('success', 'Profile updated successfully.');
    }

    public function toggleNotifications(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['status' => 'User not authenticated.'], 401);
        }
        $user->notifications_on = $request->has('notifications_on');
        $user->save();
        
        return response()->json(['status' => 'Notification preference updated successfully.']);
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->destroy();

        return redirect('/')->with('success', 'User account deleted successfully.');
    }
}