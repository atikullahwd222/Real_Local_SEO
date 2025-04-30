<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        $user = $request->user();

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('assets/img/avatar', $filename, 'public');
            $user->profile_picture = $path;
        }

        $user->fill($request->validated())->save();

        return response()->json([
            'message' => 'Profile updated successfully.',
            'profile_picture' => $user->profile_picture ? Storage::url($user->profile_picture) : null,
        ]);
    }

    /**
     * Update the user's profile picture.
     */
    public function updateProfilePicture(Request $request, $id)
    {
        $user = User::findOrFail($id);


        if ($request->profile_picture) {
            if ($request->hasFile('profile_picture')) {

                if ($user->profile_picture !== 'assets/img/avatar/default.png' && file_exists(public_path($user->profile_picture))) {
                    unlink(public_path($user->profile_picture));
                }

                $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
                $destinationPath = public_path('assets/img/avatar');
                $request->file('profile_picture')->move($destinationPath, $fileName);
                $profile_pic_path = 'assets/img/avatar/' . $fileName;
                $user->profile_picture = $profile_pic_path;
                $user->save();
            }
        } else {
            return Redirect::route('profile.edit', $id)->with(['verify' => 'profile-updated', 'status' => 'danger', 'message' => 'Select a photo']);
        }

        return Redirect::route('profile.edit', $id)->with(['verify' => 'profile-updated', 'status' => 'success', 'message' => 'Profile updated successfully']);
    }

    /**
     * Display the settings page.
     */
    public function settings()
    {
        return view('settings');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'delete_confirmation' => ['required', 'string', 'in:DELETE'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'account-deleted');
    }
}
