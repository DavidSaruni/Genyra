@extends('admin.layouts.app')

@section('title', 'Reply to Contact - Genyra Admin')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .field-label { display:block; font-size:0.78rem; font-weight:600; color:#374151; margin-bottom:0.4rem; }
    .field-hint  { font-size:0.72rem; color:#94a3b8; margin:0.3rem 0 0; }
    .field-error { font-size:0.72rem; color:#dc2626; margin:0.3rem 0 0; }
    .form-input {
        width:100%; padding:0.6rem 0.8rem; border:1.5px solid #e2e8f0; border-radius:6px;
        font-size:0.83rem; color:#0f172a; background:#fff; outline:none;
        transition:border-color 0.15s, box-shadow 0.15s; box-sizing:border-box;
    }
    .form-input:focus { border-color:#1e3a6e; box-shadow:0 0 0 3px rgba(30,58,110,0.08); }
    .form-input::placeholder { color:#cbd5e1; }
    .card { background:#fff; border-radius:8px; border:1px solid #e2e8f0; box-shadow:0 1px 4px rgba(0,0,0,0.05); overflow:hidden; margin-bottom:1.25rem; }
    .card-header { padding:0.8rem 1.25rem; border-bottom:1px solid #f1f5f9; background:#f8fafc; }
    .card-header p { font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin:0; }
    .card-body { padding:1.25rem; }
    .ql-toolbar.ql-snow { border-radius:6px 6px 0 0; border-color:#e2e8f0 !important; background:#f8fafc; }
    .ql-container.ql-snow { border-radius:0 0 6px 6px; border-color:#e2e8f0 !important; font-size:0.85rem; }
    .ql-editor { min-height:180px; }
</style>

{{-- Page header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; flex-wrap:wrap; gap:0.75rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">Reply to Contact Message</h1>
        <p style="font-size:0.78rem; color:#64748b; margin:0.2rem 0 0;">Send a response to {{ $contact->name }}</p>
    </div>
    <a href="{{ route('admin.contacts.show', $contact->id) }}"
       style="display:inline-flex; align-items:center; gap:0.4rem; font-size:0.78rem; color:#64748b; text-decoration:none;"
       onmouseover="this.style.color='#1e3a6e'" onmouseout="this.style.color='#64748b'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Back to Message
    </a>
</div>

<form action="{{ route('admin.contacts.send-reply', $contact->id) }}" method="POST">
@csrf

<div style="display:grid; grid-template-columns:1fr; gap:1.25rem;">
    <div>

        {{-- Original Message --}}
        <div class="card">
            <div class="card-header"><p>Original Message</p></div>
            <div class="card-body" style="background:#f8fafc; border-radius:6px; padding:1rem;">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
                    <div>
                        <span style="font-size:0.7rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">From</span>
                        <p style="font-weight:600; color:#0f172a; margin:0.2rem 0 0;">{{ $contact->name }}</p>
                        <p style="font-size:0.78rem; color:#64748b; margin:0;">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <span style="font-size:0.7rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Date</span>
                        <p style="font-weight:600; color:#0f172a; margin:0.2rem 0 0;">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                @if($contact->subject)
                    <div style="margin-bottom:1rem;">
                        <span style="font-size:0.7rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Subject</span>
                        <p style="font-weight:600; color:#0f172a; margin:0.2rem 0 0;">{{ $contact->subject }}</p>
                    </div>
                @endif
                <div>
                    <span style="font-size:0.7rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.05em;">Message</span>
                    <p style="color:#374151; line-height:1.6; margin:0.5rem 0 0;">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        {{-- Your Reply --}}
        <div class="card">
            <div class="card-header"><p>Your Reply</p></div>
            <div class="card-body">
                <label class="field-label">Reply Message <span style="color:#ef4444;">*</span></label>
                <div id="editor"></div>
                <input type="hidden" id="reply_message" name="reply_message" value="{{ old('reply_message') }}">
                <p class="field-hint">This will be sent to {{ $contact->email }}</p>
                @error('reply_message') <p class="field-error">{{ $message }}</p> @enderror
            </div>
        </div>

    </div>
</div>

{{-- Bottom action bar --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; padding:1rem 1.25rem; display:flex; align-items:center; justify-content:space-between; gap:0.75rem; margin-top:0.5rem; box-shadow:0 1px 4px rgba(0,0,0,0.05);">
    <a href="{{ route('admin.contacts.show', $contact->id) }}"
       style="padding:0.6rem 1.25rem; border:1.5px solid #e2e8f0; border-radius:6px; font-size:0.82rem; font-weight:600; color:#64748b; text-decoration:none; transition:all 0.15s;"
       onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
        Cancel
    </a>
    <button type="submit"
        style="padding:0.6rem 1.5rem; background:#1e3a6e; color:#fff; border:none; border-radius:6px; font-size:0.82rem; font-weight:600; cursor:pointer; transition:background 0.15s; display:inline-flex; align-items:center; gap:0.4rem;"
        onmouseover="this.style.background='#00a0c6'" onmouseout="this.style.background='#1e3a6e'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
        </svg>
        Send Reply
    </button>
</div>

</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Type your reply message here...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ align: [] }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        var initialContent = document.getElementById('reply_message').value;
        if (initialContent) quill.root.innerHTML = initialContent;

        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('reply_message').value = quill.root.innerHTML;
        });
    });
</script>
@endsection
