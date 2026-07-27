@extends('admin.layouts.app')

@section('title', 'Email Management')

@push('styles')
<style>
  .email-subject-cell {
    max-width: 220px;
    width: 220px;
    white-space: normal !important;
    overflow: hidden;
    vertical-align: middle;
  }
  .email-subject-text {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    line-height: 1.35;
    max-height: calc(1.35em * 2);
    max-width: 100%;
  }
  .email-actions-cell {
    position: relative;
    z-index: 2;
    width: 1%;
    white-space: nowrap;
  }
</style>
@endpush

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-6 gap-3">
  <div>
    <h4 class="mb-1">Emails</h4>
    <p class="mb-0 text-body-secondary">Outbound email history</p>
  </div>
  <a href="{{ route('admin.emails.create') }}" class="btn btn-primary">
    <i class="icon-base ti tabler-send me-1"></i> Compose
  </a>
</div>

<div class="row g-6 mb-6">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-1 me-2">{{ $totalSent }}</h5>
          <p class="mb-0">Total Sent</p>
        </div>
        <span class="badge bg-label-primary rounded p-2"><i class="icon-base ti tabler-mail icon-26px"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-1 me-2">{{ $totalRecipients }}</h5>
          <p class="mb-0">Recipients</p>
        </div>
        <span class="badge bg-label-success rounded p-2"><i class="icon-base ti tabler-users icon-26px"></i></span>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-1 me-2">{{ $totalAttachments }}</h5>
          <p class="mb-0">Attachments</p>
        </div>
        <span class="badge bg-label-info rounded p-2"><i class="icon-base ti tabler-paperclip icon-26px"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <h5 class="card-header">Email History</h5>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Recipient</th>
          <th>Attachments</th>
          <th>Status</th>
          <th>Sent</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($emails as $email)
          <tr>
            <td class="email-subject-cell">
              <span class="fw-medium email-subject-text" title="{{ $email->subject }}">{{ $email->subject }}</span>
            </td>
            <td><span class="text-nowrap">{{ $email->to_email }}</span></td>
            <td>{{ $email->attachment_count }}</td>
            <td>
              <span class="badge {{ $email->status === 'sent' ? 'bg-label-success' : 'bg-label-warning' }} me-1">
                {{ $email->status === 'sent' ? 'Sent' : 'Pending' }}
              </span>
            </td>
            <td><span class="text-nowrap">{{ optional($email->sent_at)->format('M d, Y g:i A') ?? '—' }}</span></td>
            <td class="email-actions-cell text-center">
              <div class="dropdown table-actions-dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow table-actions-toggle" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-actions-menu">
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.emails.show', $email) }}">
                      <i class="icon-base ti tabler-eye me-1"></i> View
                    </a>
                  </li>
                  <li>
                    <form action="{{ route('admin.emails.destroy', $email) }}" method="POST" onsubmit="return confirm('Remove this email from history?')">
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
            <td colspan="6" class="text-center py-8 text-body-secondary">
              No emails sent yet.
              <a href="{{ route('admin.emails.create') }}">Compose one</a>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if(method_exists($emails, 'hasPages') && $emails->hasPages())
    <div class="card-footer">{{ $emails->links() }}</div>
  @endif
</div>
@endsection
