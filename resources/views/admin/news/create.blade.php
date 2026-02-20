@extends('admin.layouts.app')

@section('title', 'Create News')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Create News Article</h1>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="p-6 space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary" placeholder="Enter news article title...">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary" placeholder="Write a brief summary of the news article...">{{ old('excerpt') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Brief summary of the news article (optional)</p>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="main_image" class="block text-sm font-medium text-gray-700 mb-2">Main Image</label>
                <input type="file" id="main_image" name="main_image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                <p class="mt-1 text-sm text-gray-500">Primary image for news listing (JPEG, PNG, JPG, GIF - Max 2MB)</p>
                @error('main_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Images</label>
                <div class="space-y-4">
                    <div>
                        <label for="image_2" class="block text-sm text-gray-600 mb-1">Image 2</label>
                        <input type="file" id="image_2" name="image_2" accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                        @error('image_2')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="image_3" class="block text-sm text-gray-600 mb-1">Image 3</label>
                        <input type="file" id="image_3" name="image_3" accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                        @error('image_3')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="image_4" class="block text-sm text-gray-600 mb-1">Image 4</label>
                        <input type="file" id="image_4" name="image_4" accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                        @error('image_4')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-500">Additional images for detailed news page (optional)</p>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="status" name="status" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select id="category_id" name="category_id" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <p class="mt-1 text-sm text-gray-500">Select the primary category for this news article</p>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="read_time" class="block text-sm font-medium text-gray-700 mb-2">Read Time (minutes)</label>
                <input type="number" id="read_time" name="read_time" min="1" max="30" value="{{ old('read_time', 5) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary"
                    placeholder="Estimated reading time in minutes">
                <p class="mt-1 text-sm text-gray-500">Estimated time to read this article (1-30 minutes)</p>
                @error('read_time')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t flex justify-end space-x-3">
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary transition-colors">
                Create News Article
            </button>
        </div>
    </form>
</div>

<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill Editor -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write the full news article content here...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean']
                ]
            }
        });

        // Set initial content if exists
        var initialContent = document.getElementById('content').value;
        if (initialContent) {
            quill.root.innerHTML = initialContent;
        }

        // Update hidden input on form submit
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('content').value = quill.root.innerHTML;
        });
    });
</script>
@endsection
