@extends('admin.layouts.app')

@section('title', 'Edit Poster')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Edit Poster</h4>
    <p class="mb-0 text-body-secondary">Update poster details and image</p>
  </div>
  <a href="{{ route('admin.posters.index') }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<form action="{{ route('admin.posters.update', $poster->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="row g-6">
    <div class="col-md-6">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Poster Details</h5></div>
        <div class="card-body">
          <div class="mb-4">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $poster->title) }}" required class="form-control @error('title') is-invalid @enderror">
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="4" class="form-control">{{ old('description', $poster->description) }}</textarea>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $poster->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Make this poster active</label>
          </div>
          <div class="form-text">Only one poster can be active at a time.</div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-6">
        <div class="card-header"><h5 class="card-title mb-0">Current Image</h5></div>
        <div class="card-body">
          <img src="{{ asset($poster->image_path) }}" alt="{{ $poster->title }}" class="img-fluid rounded border mb-4" style="max-height:220px;object-fit:cover;width:100%;">
          <label for="image_path" class="form-label">Upload New Image</label>
          <input type="file" id="image_path" name="image_path" accept="image/*" class="form-control @error('image_path') is-invalid @enderror" onchange="previewImage(this)">
          <div class="form-text">Leave empty to keep the current image</div>
          @error('image_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div id="imagePreview" class="mt-3"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body d-flex justify-content-between gap-2">
      <a href="{{ route('admin.posters.index') }}" class="btn btn-label-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">Update Poster</button>
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
      preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded border" style="max-height:160px;">`;
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
