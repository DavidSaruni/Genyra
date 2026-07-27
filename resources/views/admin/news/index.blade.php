@extends('admin.layouts.app')

@section('title', 'News Management')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-6 gap-3">
  <div>
    <h4 class="mb-1">News</h4>
    <p class="mb-0 text-body-secondary">Manage and publish news articles</p>
  </div>
  <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
    <i class="icon-base ti tabler-plus me-1"></i> Add Article
  </a>
</div>

<div class="card">
  <h5 class="card-header">All Articles</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Article</th>
          <th>Category</th>
          <th>Status</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($news as $article)
          <tr>
            <td>
              <div class="d-flex align-items-center">
                @if($article->main_image)
                  <img src="{{ asset('storage/' . $article->main_image) }}" alt="" class="rounded me-3" width="38" height="38" style="object-fit:cover;">
                @else
                  <i class="icon-base ti tabler-news icon-md text-primary me-3"></i>
                @endif
                <div>
                  <span class="fw-medium">{{ Str::limit($article->title, 48) }}</span>
                  @if($article->excerpt)
                    <br><small class="text-body-secondary">{{ Str::limit($article->excerpt, 55) }}</small>
                  @endif
                </div>
              </div>
            </td>
            <td>{{ $article->categories->first()->name ?? '—' }}</td>
            <td>
              <span class="badge {{ $article->status === 'published' ? 'bg-label-success' : 'bg-label-warning' }} me-1">
                {{ ucfirst($article->status) }}
              </span>
            </td>
            <td>{{ $article->published_at ? $article->published_at->format('M d, Y') : '—' }}</td>
            <td>
              <div class="dropdown table-actions-dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow table-actions-toggle" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-actions-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.news.show', $article) }}">
                      <i class="icon-base ti tabler-eye me-1"></i> View
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.news.edit', $article) }}">
                      <i class="icon-base ti tabler-pencil me-1"></i> Edit
                    </a>
                  </li>
                  <li>
                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="dropdown-item">
                        <i class="icon-base ti tabler-trash me-1"></i> Delete
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-8 text-body-secondary">
              No articles found.
              <a href="{{ route('admin.news.create') }}">Create one</a>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($news->hasPages())
    <div class="card-footer">{{ $news->links() }}</div>
  @endif
</div>
@endsection
