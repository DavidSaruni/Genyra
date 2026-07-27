@extends('admin.layouts.app')

@section('title', 'Contact Message')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Contact Message</h4>
    <p class="mb-0 text-body-secondary">Message #{{ $contact->id }}</p>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-label-secondary">Back</a>
    <a href="{{ route('admin.contacts.reply', $contact->id) }}" class="btn btn-primary">
      <i class="icon-base ti tabler-mail-forward me-1"></i> Reply
    </a>
    <a href="mailto:{{ $contact->email }}" class="btn btn-label-secondary">Email Client</a>
    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Name</label>
          <div class="fw-medium">{{ $contact->name }}</div>
        </div>
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Email</label>
          <div><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
        </div>
        @if($contact->phone)
          <div>
            <label class="form-label text-body-secondary mb-1">Phone</label>
            <div>{{ $contact->phone }}</div>
          </div>
        @endif
      </div>
      <div class="col-md-6">
        @if($contact->subject)
          <div class="mb-3">
            <label class="form-label text-body-secondary mb-1">Subject</label>
            <div class="fw-medium">{{ $contact->subject }}</div>
          </div>
        @endif
        <div class="mb-3">
          <label class="form-label text-body-secondary mb-1">Received</label>
          <div>{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
        <div>
          <label class="form-label text-body-secondary mb-1">Status</label>
          <div>
            @if($contact->read_at)
              <span class="badge bg-label-success">Read</span>
            @else
              <span class="badge bg-label-danger">Unread</span>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="border-top pt-4">
      <label class="form-label text-body-secondary mb-2">Message</label>
      <div class="bg-label-secondary rounded p-4" style="white-space:pre-wrap;">{{ $contact->message }}</div>
    </div>
  </div>
</div>
@endsection
