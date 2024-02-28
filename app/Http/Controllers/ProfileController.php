<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Get the authenticated user
        $user = Auth::user();
        // Fetch the user's avatar
        $selectedAvatar = $user->avatar;

        return view('profile.edit', [
            'user' => $user,
            'selectedAvatar' => $selectedAvatar,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // public function updateAvatar(Request $request){

    //     $validator = Validator::make($request->all(), [
    //         'avatar' => 'required',],
    //         ['avatar.required' => 'Please select an avatar image.', // Ensure 'avatar' field is required
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    

    //     // Get the authenticated user
    //     $user = Auth::user();

    //     // Update the user's avatar
    //     $user->avatar = $request->avatar;
    //     $user->save();

    //     // Redirect back or to a specific route
    //     return redirect()->back()->withSuccess('Avatar updated successfully.');
    // }
    
}
