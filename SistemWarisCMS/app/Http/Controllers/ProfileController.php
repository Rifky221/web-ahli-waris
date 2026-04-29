<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $mime = $file->getMimeType();
            $imageName = time() . '.webp';
            $destinationPath = public_path('uploads/avatars');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $success = false;

            if (str_starts_with($mime, 'image/') && extension_loaded('gd')) {
                try {
                    $sourcePath = $file->getRealPath();
                    $image = null;

                    switch ($mime) {
                        case 'image/jpeg':
                        case 'image/pjpeg':
                            $image = @imagecreatefromjpeg($sourcePath);
                            break;
                        case 'image/png':
                        case 'image/x-png':
                            $image = @imagecreatefrompng($sourcePath);
                            if ($image) {
                                imagepalettetotruecolor($image);
                                imagealphablending($image, true);
                                imagesavealpha($image, true);
                            }
                            break;
                        case 'image/gif':
                            $image = @imagecreatefromgif($sourcePath);
                            break;
                    }

                    if ($image) {
                        imagewebp($image, $destinationPath . '/' . $imageName, 80);
                        imagedestroy($image);
                        $success = true;
                    }
                } catch (\Exception $e) {
                    // Fallback handled below
                }
            }

            if (!$success) {
                $imageName = time() . '.' . $file->extension();
                $file->move($destinationPath, $imageName);
            }
            
            // Delete old avatar if exists
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                @unlink(public_path($user->avatar));
            }

            $user->avatar = 'uploads/avatars/'.$imageName;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
