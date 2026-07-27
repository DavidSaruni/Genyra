@extends('admin.layouts.app')

@section('title', 'Create News')

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
    <h4 class="mb-1">Create News Article</h4>
    <p class="mb-0 text-body-secondary">Fill in the details below to publish a new article</p>
  </div>
  <a href="{{ route('admin.news.index') }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row g-6">
    <div class="col-lg-8">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Article Title</h5></div>
        <div class="card-body">
          <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
          <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter news article title...">
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Excerpt</h5></div>
        <div class="card-body">
          <label for="excerpt" class="form-label">Brief Summary</label>
          <textarea id="excerpt" name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Write a brief summary...">{{ old('excerpt') }}</textarea>
          <div class="form-text">Shown on the news listing page (optional)</div>
          @error('excerpt')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Full Content</h5></div>
        <div class="card-body">
          <label class="form-label">Article Body <span class="text-danger">*</span></label>
          <div id="editor" class="border rounded" style="min-height:220px;background:var(--bs-paper-bg,#fff);"></div>
          <input type="hidden" id="content" name="content" value="{{ old('content') }}">
          @error('content')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          <div class="form-text">Rich text editor for the full article</div>
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Images</h5></div>
        <div class="card-body">
          <div class="mb-4">
            <label for="main_image" class="form-label">Main Image <span class="text-danger">*</span></label>
            <input type="file" id="main_image" name="main_image" accept="image/*" class="form-control @error('main_image') is-invalid @enderror">
            <div class="form-text">JPEG, PNG, JPG, GIF — max 2MB</div>
            @error('main_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="row g-3">
            @foreach([2, 3, 4] as $n)
              <div class="col-md-4">
                <label for="image_{{ $n }}" class="form-label">Image {{ $n }}</label>
                <input type="file" id="image_{{ $n }}" name="image_{{ $n }}" accept="image/*" class="form-control">
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
            <select id="status" name="status" required class="form-select @error('status') is-invalid @enderror">
              <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-4">
            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
            <select id="category_id" name="category_id" required class="form-select @error('category_id') is-invalid @enderror">
              <option value="">Select a category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="read_time" class="form-label">Read Time (minutes)</label>
            <input type="number" id="read_time" name="read_time" min="1" max="30" value="{{ old('read_time', 5) }}" class="form-control">
          </div>
        </div>
      </div>

      <div class="alert alert-primary" role="alert">
        <h6 class="alert-heading mb-1">Tips</h6>
        <ul class="mb-0 ps-3 small">
          <li>Add a clear, descriptive title</li>
          <li>Write a short excerpt for previews</li>
          <li>Upload a main image (required)</li>
          <li>Save as Draft to review first</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body d-flex justify-content-end gap-2">
      <a href="{{ route('admin.news.index') }}" class="btn btn-label-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">Publish Article</button>
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
        placeholder: 'Write the full news article content here...',
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
