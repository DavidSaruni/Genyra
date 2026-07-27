@extends('admin.layouts.app')

@section('title', 'Create Poster')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Create New Poster</h4>
    <p class="mb-0 text-body-secondary">Upload and configure a new promotional poster</p>
  </div>
  <a href="{{ route('admin.posters.index') }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<form action="{{ route('admin.posters.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row g-6">
    <div class="col-lg-8">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Poster Details</h5></div>
        <div class="card-body">
          <div class="mb-4">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter poster title...">
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div>
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="4" class="form-control" placeholder="Enter poster description (optional)">{{ old('description') }}</textarea>
            <div class="form-text">Brief description of the poster content</div>
          </div>
        </div>
      </div>

      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Poster Image</h5></div>
        <div class="card-body">
          <label for="image_path" class="form-label">Image File <span class="text-danger">*</span></label>
          <input type="file" id="image_path" name="image_path" accept="image/*" required class="form-control @error('image_path') is-invalid @enderror" onchange="previewImage(this)">
          <div class="form-text">JPEG, PNG, JPG, GIF (max 1MB)</div>
          @error('image_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div id="imagePreview" class="mt-3"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Publish Settings</h5></div>
        <div class="card-body">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
            <label class="form-check-label" for="is_active">Make this poster active</label>
          </div>
          <div class="form-text">Only one poster can be active at a time. This will deactivate all other posters.</div>
        </div>
      </div>

      <div class="alert alert-primary" role="alert">
        <h6 class="alert-heading mb-1">Tips</h6>
        <ul class="mb-0 ps-3 small">
          <li>Use high-quality images</li>
          <li>Recommended: 1920×1080px</li>
          <li>Keep file size under 1MB</li>
          <li>Only one poster can be active</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body d-flex justify-content-end gap-2">
      <a href="{{ route('admin.posters.index') }}" class="btn btn-label-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">Create Poster</button>
    </div>
  </div>
</form>
@endsection

@push('scripts')
<script>
function previewImage(input) {
  const preview = document.getElementById('imagePreview');
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.innerHTML = `<img src="${e.target.result}" class="rounded border" style="max-height:140px;">`;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
