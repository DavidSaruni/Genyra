@extends('admin.layouts.app')

@section('title', 'View News')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold">News Article</h1>
    <div class="space-x-3">
        <a href="{{ route('admin.news.edit', $news) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-edit mr-2"></i> Edit
        </a>
        <a href="{{ route('admin.news.index') }}" class="border border-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100">
            Back to List
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-6">
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">{{ $news->title }}</h2>
                <span class="px-3 py-1 text-sm rounded-full {{ $news->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($news->status) }}
                </span>
            </div>
            
            <div class="text-sm text-gray-500 space-y-1">
                <p><strong>Created:</strong> {{ $news->created_at->format('M d, Y H:i') }}</p>
                <p><strong>Updated:</strong> {{ $news->updated_at->format('M d, Y H:i') }}</p>
                @if($news->published_at)
                    <p><strong>Published:</strong> {{ $news->published_at->format('M d, Y H:i') }}</p>
                @endif
                <p><strong>Slug:</strong> {{ $news->slug }}</p>
                @if($news->categories->count() > 0)
                    <p><strong>Category:</strong> 
                        <span class="inline-block px-2 py-1 text-xs bg-genyra-accent text-genyra-dark rounded-full">{{ $news->categories->first()->name }}</span>
                    </p>
                @endif
                @if($news->read_time)
                    <p><strong>Read Time:</strong> {{ $news->read_time }} minutes</p>
                @endif
            </div>
        </div>

        @if($news->main_image)
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-3">Main Image</h3>
                <img src="{{ asset('storage/' . $news->main_image) }}" alt="{{ $news->title }}" class="max-w-md h-auto rounded-lg shadow">
            </div>
        @endif

        @if($news->additional_images)
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-3">Additional Images</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($news->additional_images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $news->title }}" class="w-full h-32 object-cover rounded-lg shadow">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($news->excerpt)
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-3">Excerpt</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-700">{{ $news->excerpt }}</p>
                </div>
            </div>
        @endif

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-3">Content</h3>
            <div class="prose max-w-none">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $news->content }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-6 border-t">
            <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news article?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    <i class="fas fa-trash mr-2"></i> Delete
                </button>
            </form>
            <a href="{{ route('admin.news.edit', $news) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
        </div>
    </div>
</div>
@endsection
