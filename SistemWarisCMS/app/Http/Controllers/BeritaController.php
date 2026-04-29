<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'editor' => 'nullable|max:100',
            'deskripsi' => 'nullable',
            'isi_konten' => 'required',
            'kategori' => 'required',
            'status' => 'required|in:draft,publish',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . time(); // Ensure uniqueness
        
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $mime = $file->getMimeType();
            
            // Check if GD extension is loaded and file is an image
            if (str_starts_with($mime, 'image/') && extension_loaded('gd')) {
                try {
                    $filename = pathinfo($file->hashName(), PATHINFO_FILENAME) . '.webp';
                    $relativePath = 'thumbnails/' . $filename;
                    
                    // Ensure directory exists
                    if (!Storage::disk('public')->exists('thumbnails')) {
                        Storage::disk('public')->makeDirectory('thumbnails');
                    }

                    $absolutePath = Storage::disk('public')->path($relativePath);
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
                        imagewebp($image, $absolutePath, 80);
                        imagedestroy($image);
                        $validated['thumbnail'] = $relativePath;
                    } else {
                        // Fallback
                        $validated['thumbnail'] = $file->store('thumbnails', 'public');
                    }
                } catch (\Exception $e) {
                    $validated['thumbnail'] = $file->store('thumbnails', 'public');
                }
            } else {
                $validated['thumbnail'] = $file->store('thumbnails', 'public');
            }
        }

        if (empty($validated['published_at']) && $validated['status'] == 'publish') {
            $validated['published_at'] = now();
        }

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:100',
            'editor' => 'nullable|max:100',
            'deskripsi' => 'nullable',
            'isi_konten' => 'required',
            'kategori' => 'required',
            'status' => 'required|in:draft,publish',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . time();

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($berita->thumbnail) {
                Storage::disk('public')->delete($berita->thumbnail);
            }
            
            $file = $request->file('thumbnail');
            $mime = $file->getMimeType();
            
            if (str_starts_with($mime, 'image/') && extension_loaded('gd')) {
                try {
                    $filename = pathinfo($file->hashName(), PATHINFO_FILENAME) . '.webp';
                    $relativePath = 'thumbnails/' . $filename;
                    
                    if (!Storage::disk('public')->exists('thumbnails')) {
                        Storage::disk('public')->makeDirectory('thumbnails');
                    }

                    $absolutePath = Storage::disk('public')->path($relativePath);
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
                        imagewebp($image, $absolutePath, 80);
                        imagedestroy($image);
                        $validated['thumbnail'] = $relativePath;
                    } else {
                        $validated['thumbnail'] = $file->store('thumbnails', 'public');
                    }
                } catch (\Exception $e) {
                    $validated['thumbnail'] = $file->store('thumbnails', 'public');
                }
            } else {
                $validated['thumbnail'] = $file->store('thumbnails', 'public');
            }
        }

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->thumbnail) {
            Storage::disk('public')->delete($berita->thumbnail);
        }
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
