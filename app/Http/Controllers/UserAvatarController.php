<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048', // 2MB max
        ]);

        $user = $request->user();

        // Delete old avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Store new avatar
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
        $user->profile_photo_url = Storage::url($path);
        $user->save();

        return response()->json(['avatar_url' => $user->profile_photo_url]);
    }

    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        if ($user->avatar) {
            return response()->file(storage_path('app/public/' . $user->avatar));
        }
        // Return a default avatar if not set
        return response()->file(public_path('default-avatar.png'));
    }
}
