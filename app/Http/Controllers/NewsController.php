<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('categories')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'required|exists:categories,id',
            'read_time' => 'nullable|integer|min:1|max:30',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('news', 'public');
            $validated['main_image'] = $imagePath;
        }

        // Handle additional images upload
        for ($i = 2; $i <= 4; $i++) {
            $fieldName = "image_{$i}";
            if ($request->hasFile($fieldName)) {
                $imagePath = $request->file($fieldName)->store('news', 'public');
                $validated[$fieldName] = $imagePath;
            }
        }

        $news = News::create($validated);
        $news->categories()->attach($validated['category_id']);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article created successfully.');
    }

    public function show(News $news)
    {
        $news->load('categories');
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $news->load('categories');
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'required|exists:categories,id',
            'read_time' => 'nullable|integer|min:1|max:30',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        if ($validated['status'] === 'published' && !$news->published_at) {
            $validated['published_at'] = now();
        } elseif ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('news', 'public');
            $validated['main_image'] = $imagePath;
        }

        // Handle additional images upload
        for ($i = 2; $i <= 4; $i++) {
            $fieldName = "image_{$i}";
            if ($request->hasFile($fieldName)) {
                $imagePath = $request->file($fieldName)->store('news', 'public');
                $validated[$fieldName] = $imagePath;
            }
        }

        $news->update($validated);
        $news->categories()->sync([$validated['category_id']]);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News article deleted successfully.');
    }
}
