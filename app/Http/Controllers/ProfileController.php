<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $imageName = null;

        if ($request->image) {
            // unique image name
            $imageName =  Str::uuid() . "." . $request->image->getClientOriginalExtension();
            // create image manager with driver
            $manager = new ImageManager(new Driver());
            // process image
            $serverImage = $manager->read($request->image->getPathname());
            $serverImage->cover(width: 400, height: 400);
            // save image
            Storage::disk("local")->put("profile-pictures/$imageName", (string) $serverImage->encode());
            // delete previous image
            if (Auth::user()->image_path) {
                Storage::disk("local")->delete("profile-pictures/" . Auth::user()->image_path);
            }
            $user->image_path = $imageName;
        }
        // save changes
        $user->username = $request->validated()['username'];
        $user->save();

        return redirect()->route('post.index', ['username' => $user->username])->with('success', 'Your profile has been updated');
    }
    public function updatePassword(PasswordRequest $request)
    {
        $user = User::find(Auth::id());
        $newPassword = $request->validated()['new_password'];
        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()
            ->route('profiles.edit')
            ->with('success', 'Your password has been updated.');
    }
    //serve image
    public function image(User $user)
    {
        if ($user->image_path) {
            $relativePath = 'profile-pictures/' . $user->image_path;
            $absolutePath = storage_path('app/private/' . $relativePath);
            // option with FILE
            if (File::exists($absolutePath)) {
                $file = File::get($absolutePath);
                $mime = File::mimeType($absolutePath);
                return Response::make($file, 200)->header("Content-Type", $mime);
            }
            // option with Storage
            // if (Storage::disk('local')->exists($relativePath)) {
            //     $file = Storage::disk('local')->get($relativePath);
            //     $mime = Storage::disk('local')->mimeType($relativePath);
            //     return Response::make($file, 200)->header("Content-Type", $mime);
            // }
        }
        // return default profile picture
        $fallbackPath = public_path("img\account\usuario.svg");
        $file = File::get($fallbackPath);
        $mime = File::mimeType($fallbackPath);
        return Response::make($file, 200)->header("Content-Type", $mime);
    }
}

        // 'email' => ['nullable', 'max:50', 'email', Rule::unique('users', 'email')->ignore(Auth()->user->id)],
