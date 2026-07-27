@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-6 gap-3">
  <div>
    <h4 class="mb-1">Contacts</h4>
    <p class="mb-0 text-body-secondary">Website inquiries and messages</p>
  </div>
  <span class="badge bg-label-primary rounded-pill px-3 py-2">{{ $contacts->total() }} total</span>
</div>

<div class="card">
  <h5 class="card-header">All Messages</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Contact</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($contacts as $contact)
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-3">
                  <span class="avatar-initial rounded-circle {{ $contact->read_at ? 'bg-label-secondary' : 'bg-label-danger' }}">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                  </span>
                </div>
                <div>
                  <span class="fw-medium">{{ $contact->name }}</span>
                  <br><small class="text-body-secondary">{{ $contact->email }}</small>
                </div>
              </div>
            </td>
            <td>{{ Str::limit($contact->subject ?? 'No subject', 40) }}</td>
            <td>
              @if($contact->read_at)
                <span class="badge bg-label-success me-1">Read</span>
              @else
                <span class="badge bg-label-danger me-1">Unread</span>
              @endif
            </td>
            <td>{{ $contact->created_at->format('M d, Y') }}</td>
            <td>
              <div class="dropdown table-actions-dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow table-actions-toggle" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-actions-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.contacts.show', $contact) }}">
                      <i class="icon-base ti tabler-eye me-1"></i> View
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.contacts.reply', $contact) }}">
                      <i class="icon-base ti tabler-send me-1"></i> Reply
                    </a>
                  </li>
                  <li>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message?')">
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
            <td colspan="5" class="text-center py-8 text-body-secondary">No contact messages found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($contacts->hasPages())
    <div class="card-footer">{{ $contacts->links() }}</div>
  @endif
</div>
@endsection
