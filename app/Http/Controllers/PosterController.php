<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posters = Poster::latest()->paginate(10);
        return view('admin.posters.index', compact('posters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            try {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/posters'), $imageName);
                $imagePath = 'images/posters/' . $imageName;
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'No image file was uploaded. Please select an image file.');
        }

        // Deactivate all other posters since we only want one active
        Poster::where('is_active', true)->update(['is_active' => false]);

        $poster = Poster::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', compact('poster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', $poster->is_active),
        ];

        // Handle image upload if new image provided
        if ($request->hasFile('image_path')) {
            // Delete old image
            if ($poster->image_path && file_exists(public_path($poster->image_path))) {
                unlink(public_path($poster->image_path));
            }

            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posters'), $imageName);
            $data['image_path'] = 'images/posters/' . $imageName;
        }

        // Deactivate all other posters if this one is being activated
        if ($request->boolean('is_active', $poster->is_active)) {
            Poster::where('id', '!=', $poster->id)->where('is_active', true)->update(['is_active' => false]);
        }

        $poster->update($data);

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poster $poster)
    {
        // Delete image file
        if ($poster->image_path && file_exists(public_path($poster->image_path))) {
            unlink(public_path($poster->image_path));
        }

        $poster->delete();

        return redirect()->route('admin.posters.index')
            ->with('success', 'Poster deleted successfully.');
    }
}
