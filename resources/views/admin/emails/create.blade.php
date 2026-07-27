@extends('admin.layouts.app')

@section('title', 'Send Email')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  #editor { min-height: 260px; }
  .ql-toolbar.ql-snow { border-radius: .375rem .375rem 0 0; }
  .ql-container.ql-snow { border-radius: 0 0 .375rem .375rem; }
  .email-dropzone {
    border: 2px dashed var(--bs-border-color);
    border-radius: .5rem;
    padding: 1.75rem 1.25rem;
    text-align: center;
    cursor: pointer;
    transition: border-color .15s ease, background-color .15s ease;
    background: var(--bs-paper-bg, #fff);
  }
  .email-dropzone:hover,
  .email-dropzone.is-dragover {
    border-color: var(--bs-primary);
    background: rgba(var(--bs-primary-rgb), 0.06);
  }
  .email-dropzone input[type="file"] {
    display: none;
  }
</style>
@endpush

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-6">
  <div>
    <h4 class="mb-1">Compose New Email</h4>
    <p class="mb-0 text-body-secondary">Send a custom email to any recipient</p>
  </div>
  <a href="{{ route('admin.emails.index') }}" class="btn btn-label-secondary">
    <i class="icon-base ti tabler-arrow-left me-1"></i> Back
  </a>
</div>

<div class="card">
  <div class="card-header"><h5 class="card-title mb-0">Email Details</h5></div>
  <div class="card-body">
    <form action="{{ route('admin.emails.send') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-4">
        <label for="to_email" class="form-label">Recipient Email Address <span class="text-danger">*</span></label>
        <input type="email" id="to_email" name="to_email" required value="{{ old('to_email') }}" class="form-control @error('to_email') is-invalid @enderror" placeholder="recipient@example.com">
        @error('to_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-4">
        <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
        <input type="text" id="subject" name="subject" required value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" placeholder="Enter email subject">
        @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-4">
        <label class="form-label">Message <span class="text-danger">*</span></label>
        <div id="editor" class="border rounded" style="min-height:260px;background:var(--bs-paper-bg,#fff);"></div>
        <textarea id="message" name="message" hidden required>{{ old('message') }}</textarea>
        @error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        <div class="form-text">Rich text editor for the email body</div>
      </div>

      <div class="mb-4">
        <label class="form-label">
          Attachments
          <span class="text-body-secondary small ms-1">(max 10MB per file)</span>
        </label>
        <div id="email-dropzone" class="email-dropzone" role="button" tabindex="0" aria-label="Upload attachments">
          <input
            type="file"
            id="attachments"
            name="attachments[]"
            multiple
            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.gif,.txt,.zip"
          >
          <div class="mb-2">
            <i class="icon-base ti tabler-cloud-upload icon-32px text-primary"></i>
          </div>
          <div class="fw-medium mb-1">Click to upload or drag and drop</div>
          <div class="text-body-secondary small">PDF, Word, Excel, PowerPoint, Images, ZIP</div>
        </div>
        <div id="fileList" class="mt-3"></div>
        @error('attachments.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between pt-2">
        <a href="{{ route('admin.emails.index') }}" class="btn btn-label-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">
          <i class="icon-base ti tabler-send me-1"></i> Send Email
        </button>
      </div>
    </form>
  </div>
</div>
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

  function renderFileList(fileInput, fileList) {
    fileList.innerHTML = '';
    Array.from(fileInput.files || []).forEach(function (file) {
      var item = document.createElement('div');
      item.className = 'alert alert-secondary d-flex justify-content-between align-items-center py-2 mb-2';
      item.innerHTML =
        '<span class="d-flex align-items-center gap-2">' +
          '<i class="icon-base ti tabler-paperclip"></i>' +
          '<span><strong>' + file.name + '</strong> ' +
          '<small class="text-body-secondary">(' + (file.size / 1024 / 1024).toFixed(2) + ' MB)</small></span>' +
        '</span>';
      fileList.appendChild(item);
    });
  }

  function assignFiles(fileInput, files) {
    var transfer = new DataTransfer();
    Array.from(files).forEach(function (file) {
      transfer.items.add(file);
    });
    fileInput.files = transfer.files;
    fileInput.dispatchEvent(new Event('change', { bubbles: true }));
  }

  function initEmailCompose() {
    var editor = document.getElementById('editor');
    var messageInput = document.getElementById('message');
    if (!editor || !messageInput) return;

    if (!(editor.dataset.quillReady === '1' || editor.classList.contains('ql-container'))) {
      ensureQuillAssets(function () {
        editor = document.getElementById('editor');
        messageInput = document.getElementById('message');
        if (!editor || !messageInput || typeof Quill === 'undefined') return;
        if (editor.dataset.quillReady === '1' || editor.classList.contains('ql-container')) return;

        var quill = new Quill('#editor', {
          theme: 'snow',
          placeholder: 'Compose your message here...',
          modules: {
            toolbar: [
              [{ header: [1, 2, 3, false] }],
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [{ list: 'ordered' }, { list: 'bullet' }],
              [{ align: [] }],
              ['link'],
              ['clean']
            ]
          }
        });

        editor.dataset.quillReady = '1';
        if (messageInput.value) quill.root.innerHTML = messageInput.value;
        quill.on('text-change', function () {
          messageInput.value = quill.root.innerHTML;
        });

        var form = messageInput.closest('form');
        if (form && form.dataset.quillSubmitBound !== '1') {
          form.dataset.quillSubmitBound = '1';
          form.addEventListener('submit', function () {
            messageInput.value = quill.root.innerHTML;
          });
        }
      });
    }

    var dropzone = document.getElementById('email-dropzone');
    var fileInput = document.getElementById('attachments');
    var fileList = document.getElementById('fileList');
    if (!dropzone || !fileInput || !fileList || dropzone.dataset.bound === '1') return;
    dropzone.dataset.bound = '1';

    dropzone.addEventListener('click', function () {
      fileInput.click();
    });

    dropzone.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        fileInput.click();
      }
    });

    fileInput.addEventListener('click', function (e) {
      e.stopPropagation();
    });

    fileInput.addEventListener('change', function () {
      renderFileList(fileInput, fileList);
    });

    ['dragenter', 'dragover'].forEach(function (eventName) {
      dropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.add('is-dragover');
      });
    });

    ['dragleave', 'dragend'].forEach(function (eventName) {
      dropzone.addEventListener(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.remove('is-dragover');
      });
    });

    dropzone.addEventListener('drop', function (e) {
      e.preventDefault();
      e.stopPropagation();
      dropzone.classList.remove('is-dragover');
      if (!e.dataTransfer || !e.dataTransfer.files || !e.dataTransfer.files.length) return;
      assignFiles(fileInput, e.dataTransfer.files);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initEmailCompose);
  } else {
    initEmailCompose();
  }
  document.addEventListener('livewire:navigated', initEmailCompose);
})();
</script>
@endpush
