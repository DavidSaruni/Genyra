@extends('admin.layouts.app')

@section('title', 'View News')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">View Article</h4>
    <p class="mb-0 text-body-secondary">{{ $news->slug }}</p>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.news.index') }}" class="btn btn-label-secondary">Back</a>
    <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
      <i class="icon-base ti tabler-edit me-1"></i> Edit
    </a>
  </div>
</div>

<div class="card mb-6">
  @if($news->main_image)
    <img src="{{ asset('storage/' . $news->main_image) }}" alt="{{ $news->title }}" class="card-img-top" style="max-height:320px;object-fit:cover;">
  @endif
  <div class="card-body">
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span class="badge {{ $news->status === 'published' ? 'bg-label-success' : 'bg-label-warning' }}">
        {{ ucfirst($news->status) }}
      </span>
      @if($news->categories->count() > 0)
        <span class="badge bg-label-info">{{ $news->categories->first()->name }}</span>
      @endif
      @if($news->read_time)
        <span class="badge bg-label-secondary">{{ $news->read_time }} min read</span>
      @endif
    </div>
    <h3 class="mb-3">{{ $news->title }}</h3>
    @if($news->excerpt)
      <div class="alert alert-primary" role="alert">{{ $news->excerpt }}</div>
    @endif
    <div class="d-flex flex-wrap gap-3 text-body-secondary small mb-4">
      <span>Created {{ $news->created_at->format('M d, Y') }}</span>
      <span>Updated {{ $news->updated_at->format('M d, Y H:i') }}</span>
      @if($news->published_at)
        <span>Published {{ $news->published_at->format('M d, Y H:i') }}</span>
      @endif
    </div>
    <div class="border-top pt-4">{!! $news->content !!}</div>
  </div>
</div>

@if($news->additional_images && count($news->additional_images))
  <div class="card mb-6">
    <div class="card-header"><h5 class="card-title mb-0">Additional Images</h5></div>
    <div class="card-body">
      <div class="row g-3">
        @foreach($news->additional_images as $image)
          <div class="col-sm-4">
            <img src="{{ asset('storage/' . $image) }}" alt="" class="img-fluid rounded border">
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="card border-danger">
  <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div>
      <h6 class="text-danger mb-1">Danger Zone</h6>
      <p class="mb-0 text-body-secondary small">Permanently deletes this article. This cannot be undone.</p>
    </div>
    <form action="{{ route('admin.news.destroy', $news) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this article?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete Article</button>
    </form>
  </div>
</div>
@endsection
