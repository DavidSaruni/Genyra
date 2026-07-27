@extends('admin.layouts.app')

@section('title', 'View Email')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Email Details</h4>
    <p class="mb-0 text-body-secondary">Message #{{ $email->id }}</p>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a href="{{ route('admin.emails.index') }}" class="btn btn-label-secondary">
      <i class="icon-base ti tabler-arrow-left me-1"></i> Back
    </a>
    <a href="{{ route('admin.emails.create') }}" class="btn btn-primary">
      <i class="icon-base ti tabler-send me-1"></i> Compose New
    </a>
    <form action="{{ route('admin.emails.destroy', $email) }}" method="POST" onsubmit="return confirm('Remove this email from history?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-label-danger">
        <i class="icon-base ti tabler-trash me-1"></i> Delete
      </button>
    </form>
  </div>
</div>

<div class="card mb-6">
  <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
    <h5 class="card-title mb-0">{{ $email->subject }}</h5>
    <span class="badge {{ $email->status === 'sent' ? 'bg-label-success' : 'bg-label-warning' }}">
      {{ $email->status === 'sent' ? 'Sent' : 'Pending' }}
    </span>
  </div>
  <div class="card-body">
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Recipient</label>
          <div class="fw-medium">
            <a href="mailto:{{ $email->to_email }}">{{ $email->to_email }}</a>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Subject</label>
          <div class="fw-medium">{{ $email->subject }}</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Sent At</label>
          <div>{{ optional($email->sent_at)->format('M d, Y \a\t h:i A') ?? '—' }}</div>
        </div>
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Attachments</label>
          <div>
            @if($email->attachment_count > 0)
              <span class="badge bg-label-info">{{ $email->attachment_count }} file(s)</span>
            @else
              <span class="text-body-secondary">None</span>
            @endif
          </div>
        </div>
        <div>
          <label class="form-label text-body-secondary mb-1">Recorded</label>
          <div>{{ $email->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
      </div>
    </div>

    <div class="border-top pt-4">
      <label class="form-label text-body-secondary mb-2">Message</label>
      <div class="border rounded p-4 bg-label-secondary">
        {!! $email->message !!}
      </div>
    </div>
  </div>
</div>
@endsection
