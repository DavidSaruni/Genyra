@extends('admin.layouts.app')

@section('title', 'Posters')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-6 gap-3">
  <div>
    <h4 class="mb-1">Posters</h4>
    <p class="mb-0 text-body-secondary">Promotional images for the website</p>
  </div>
  <a href="{{ route('admin.posters.create') }}" class="btn btn-primary">
    <i class="icon-base ti tabler-plus me-1"></i> Add Poster
  </a>
</div>

<div class="card">
  <h5 class="card-header">All Posters</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Poster</th>
          <th>Title</th>
          <th>Status</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($posters as $poster)
          <tr>
            <td>
              <img src="{{ asset($poster->image_path) }}" alt="{{ $poster->title }}" class="rounded" width="64" height="40" style="object-fit:cover;">
            </td>
            <td>
              <span class="fw-medium">{{ $poster->title }}</span>
              @if($poster->description)
                <br><small class="text-body-secondary">{{ Str::limit($poster->description, 50) }}</small>
              @endif
            </td>
            <td>
              <span class="badge {{ $poster->is_active ? 'bg-label-success' : 'bg-label-secondary' }} me-1">
                {{ $poster->is_active ? 'Active' : 'Inactive' }}
              </span>
            </td>
            <td>{{ $poster->created_at->format('M d, Y') }}</td>
            <td>
              <div class="dropdown table-actions-dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow table-actions-toggle" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-actions-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.posters.edit', $poster) }}">
                      <i class="icon-base ti tabler-pencil me-1"></i> Edit
                    </a>
                  </li>
                  <li>
                    <form action="{{ route('admin.posters.destroy', $poster) }}" method="POST" onsubmit="return confirm('Delete this poster?')">
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
              No posters found.
              <a href="{{ route('admin.posters.create') }}">Create one</a>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if(method_exists($posters, 'hasPages') && $posters->hasPages())
    <div class="card-footer">{{ $posters->links() }}</div>
  @endif
</div>
@endsection
