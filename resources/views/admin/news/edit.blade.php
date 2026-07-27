@extends('admin.layouts.app')

@section('title', 'Edit News')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  #editor { min-height: 220px; }
  .ql-toolbar.ql-snow { border-radius: .375rem .375rem 0 0; }
  .ql-container.ql-snow { border-radius: 0 0 .375rem .375rem; }
</style>
@endpush

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Edit News Article</h4>
    <p class="mb-0 text-body-secondary">Update the content and settings for this article</p>
  </div>
  <a href="{{ route('admin.news.index') }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="row g-6">
    <div class="col-lg-8">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Article Title</h5></div>
        <div class="card-body">
          <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
          <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required class="form-control @error('title') is-invalid @enderror">
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Excerpt</h5></div>
        <div class="card-body">
          <label for="excerpt" class="form-label">Brief Summary</label>
          <textarea id="excerpt" name="excerpt" rows="3" class="form-control">{{ old('excerpt', $news->excerpt) }}</textarea>
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Full Content</h5></div>
        <div class="card-body">
          <label class="form-label">Article Body <span class="text-danger">*</span></label>
          <div id="editor" class="border rounded" style="min-height:220px;background:var(--bs-paper-bg,#fff);"></div>
          <input type="hidden" id="content" name="content" value="{{ old('content', $news->content) }}">
          @error('content')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          <div class="form-text">Rich text editor for the full article</div>
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Images</h5></div>
        <div class="card-body">
          <div class="mb-4">
            <label for="main_image" class="form-label">Main Image</label>
            <input type="file" id="main_image" name="main_image" accept="image/*" class="form-control">
            @if($news->main_image)
              <div class="mt-2">
                <img src="{{ asset('storage/' . $news->main_image) }}" alt="{{ $news->title }}" class="rounded border" style="height:64px;width:auto;">
              </div>
            @endif
          </div>
          <div class="row g-3">
            @foreach([2, 3, 4] as $n)
              <div class="col-md-4">
                <label for="image_{{ $n }}" class="form-label">Image {{ $n }}</label>
                <input type="file" id="image_{{ $n }}" name="image_{{ $n }}" accept="image/*" class="form-control">
                @if($news->{'image_' . $n})
                  <img src="{{ asset('storage/' . $news->{'image_' . $n}) }}" alt="" class="rounded border mt-2" style="height:48px;width:auto;">
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Publish Settings</h5></div>
        <div class="card-body">
          <div class="mb-4">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select id="status" name="status" required class="form-select">
              <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
            <select id="category_id" name="category_id" required class="form-select">
              <option value="">Select a category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $news->categories->first()?->id) == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-4">
            <label for="read_time" class="form-label">Read Time (minutes)</label>
            <input type="number" id="read_time" name="read_time" min="1" max="30" value="{{ old('read_time', $news->read_time ?? 5) }}" class="form-control">
          </div>
          @if($news->published_at)
            <div class="alert alert-secondary mb-0 py-2">
              <small>Published on: {{ $news->published_at->format('M d, Y H:i') }}</small>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body d-flex justify-content-end gap-2">
      <a href="{{ route('admin.news.index') }}" class="btn btn-label-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">Update Article</button>
    </div>
  </div>
</form>
@endsection

@push('scripts')
<script>
(function () {
  var QUILL_CSS = 'https://cdn.quilljs.com/1.3.6/quill.snow.css';
  var QUILL_JS = 'https://cdn.quilljs.com/1.3.6/quill.js';

  function ensureQuillAssets(callback) {
    if (!document.querySelector('link[href="' + QUILL_CSS + '"]')) {
      var link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = QUILL_CSS;
      document.head.appendChild(link);
    }

    if (typeof Quill !== 'undefined') {
      callback();
      return;
    }

    var existing = document.querySelector('script[data-quill-cdn]');
    if (existing) {
      existing.addEventListener('load', callback, { once: true });
      return;
    }

    var script = document.createElement('script');
    script.src = QUILL_JS;
    script.dataset.quillCdn = '1';
    script.onload = callback;
    document.body.appendChild(script);
  }

  function initNewsQuill() {
    var editor = document.getElementById('editor');
    var contentInput = document.getElementById('content');
    if (!editor || !contentInput) return;
    if (editor.dataset.quillReady === '1' || editor.classList.contains('ql-container')) return;

    ensureQuillAssets(function () {
      editor = document.getElementById('editor');
      contentInput = document.getElementById('content');
      if (!editor || !contentInput || typeof Quill === 'undefined') return;
      if (editor.dataset.quillReady === '1' || editor.classList.contains('ql-container')) return;

      var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write full news article content here...',
        modules: {
          toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            ['blockquote'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ align: [] }],
            ['link'],
            ['clean']
          ]
        }
      });

      editor.dataset.quillReady = '1';
      if (contentInput.value) quill.root.innerHTML = contentInput.value;
      quill.on('text-change', function () {
        contentInput.value = quill.root.innerHTML;
      });

      var form = contentInput.closest('form');
      if (form && form.dataset.quillSubmitBound !== '1') {
        form.dataset.quillSubmitBound = '1';
        form.addEventListener('submit', function () {
          contentInput.value = quill.root.innerHTML;
        });
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNewsQuill);
  } else {
    initNewsQuill();
  }
  document.addEventListener('livewire:navigated', initNewsQuill);
})();
</script>
@endpush
