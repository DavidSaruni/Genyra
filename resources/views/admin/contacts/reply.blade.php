@extends('admin.layouts.app')

@section('title', 'Reply to Contact')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  #editor { min-height: 180px; }
  .ql-toolbar.ql-snow { border-radius: .375rem .375rem 0 0; }
  .ql-container.ql-snow { border-radius: 0 0 .375rem .375rem; }
</style>
@endpush

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Reply to Contact Message</h4>
    <p class="mb-0 text-body-secondary">Send a response to {{ $contact->name }}</p>
  </div>
  <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<form action="{{ route('admin.contacts.send-reply', $contact->id) }}" method="POST">
  @csrf

  <div class="card mb-6">
    <div class="card-header"><h5 class="card-title mb-0">Original Message</h5></div>
    <div class="card-body">
      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <small class="text-body-secondary text-uppercase">From</small>
          <div class="fw-medium">{{ $contact->name }}</div>
          <div class="text-body-secondary">{{ $contact->email }}</div>
        </div>
        <div class="col-md-6">
          <small class="text-body-secondary text-uppercase">Date</small>
          <div class="fw-medium">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
      </div>
      @if($contact->subject)
        <div class="mb-3">
          <small class="text-body-secondary text-uppercase">Subject</small>
          <div class="fw-medium">{{ $contact->subject }}</div>
        </div>
      @endif
      <div>
        <small class="text-body-secondary text-uppercase">Message</small>
        <p class="mb-0 mt-1">{{ $contact->message }}</p>
      </div>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-header"><h5 class="card-title mb-0">Your Reply</h5></div>
    <div class="card-body">
      <label class="form-label">Reply Message <span class="text-danger">*</span></label>
      <div id="editor" class="border rounded" style="min-height:180px;background:var(--bs-paper-bg,#fff);"></div>
      <input type="hidden" id="reply_message" name="reply_message" value="{{ old('reply_message') }}">
      <div class="form-text">This will be sent to {{ $contact->email }}</div>
      @error('reply_message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
    </div>
  </div>

  <div class="card">
    <div class="card-body d-flex justify-content-between gap-2">
      <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-label-secondary">Cancel</a>
      <button type="submit" class="btn btn-primary">
        <i class="icon-base ti tabler-send me-1"></i> Send Reply
      </button>
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

  function initContactReplyQuill() {
    var editor = document.getElementById('editor');
    var contentInput = document.getElementById('reply_message');
    if (!editor || !contentInput) return;
    if (editor.dataset.quillReady === '1' || editor.classList.contains('ql-container')) return;

    ensureQuillAssets(function () {
      editor = document.getElementById('editor');
      contentInput = document.getElementById('reply_message');
      if (!editor || !contentInput || typeof Quill === 'undefined') return;
      if (editor.dataset.quillReady === '1' || editor.classList.contains('ql-container')) return;

      var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write your reply message here...',
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
    document.addEventListener('DOMContentLoaded', initContactReplyQuill);
  } else {
    initContactReplyQuill();
  }
  document.addEventListener('livewire:navigated', initContactReplyQuill);
})();
</script>
@endpush
