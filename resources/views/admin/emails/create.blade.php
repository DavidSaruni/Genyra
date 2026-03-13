@extends('admin.layouts.app')

@section('title', 'Send Email')

@section('content')
<div class="max-w-4xl">
    {{-- Top bar --}}
    <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
        <nav class="flex items-center gap-2 text-sm text-slate-400">
            <a href="{{ route('admin.index') }}" class="hover:text-slate-700 transition-colors">Dashboard</a>
            <span class="text-slate-300">›</span>
            <span class="text-slate-700 font-semibold">Send Email</span>
        </nav>
    </div>

    {{-- Email Compose Card --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center gap-2 px-6 py-3 border-b border-slate-100 bg-slate-50">
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="text-[0.65rem] font-bold text-slate-500 uppercase tracking-widest">
                Compose New Email
            </span>
        </div>

        <form action="{{ route('admin.emails.send') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            {{-- Recipient --}}
            <div class="mb-6">
                <label for="to_email" class="block text-sm font-semibold text-slate-700 mb-2">
                    Recipient Email Address
                </label>
                <input type="email" 
                       id="to_email" 
                       name="to_email" 
                       required
                       value="{{ old('to_email') }}"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                       placeholder="recipient@example.com">
                @error('to_email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Subject --}}
            <div class="mb-6">
                <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">
                    Subject
                </label>
                <input type="text" 
                       id="subject" 
                       name="subject" 
                       required
                       value="{{ old('subject') }}"
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                       placeholder="Enter email subject">
                @error('subject')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Message --}}
            <div class="mb-6">
                <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">
                    Message
                </label>
                <div id="editor" style="height: 300px; border: 1px solid #e2e8f0; border-radius: 8px;"></div>
                <textarea id="message" 
                          name="message" 
                          hidden
                          required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Attachments --}}
            <div class="mb-6">
                <label for="attachments" class="block text-sm font-semibold text-slate-700 mb-2">
                    Attachments
                    <span class="text-xs text-slate-500 font-normal ml-2">(Maximum 10MB per file)</span>
                </label>
                <div class="border-2 border-dashed border-slate-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <input type="file" 
                           id="attachments" 
                           name="attachments[]" 
                           multiple
                           class="hidden"
                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png,.gif,.txt,.zip">
                    <label for="attachments" class="cursor-pointer">
                        <span class="text-sm text-slate-600">Click to upload or drag and drop</span>
                        <p class="text-xs text-slate-500 mt-1">PDF, Word, Excel, PowerPoint, Images, ZIP files</p>
                    </label>
                </div>
                
                {{-- File List --}}
                <div id="fileList" class="mt-3 space-y-2"></div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="{{ route('admin.index') }}" 
                   class="px-4 py-2 text-slate-600 hover:text-slate-800 transition-colors">
                    Cancel
                </a>
                <div class="flex gap-3">
                    <!-- <button type="button" 
                            id="saveDraft"
                            class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">
                        Save Draft
                    </button> -->
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Send Email
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Quill Editor --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor
    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Compose your message here...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                [{ script: 'sub' }, { script: 'super' }],
                [{ indent: '-1' }, { indent: '+1' }],
                [{ align: [] }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    var messageInput = document.getElementById('message');

    // Restore old() value on validation failure
    if (messageInput.value) {
        quill.root.innerHTML = messageInput.value;
    }

    // Keep hidden input in sync on every keystroke
    quill.on('text-change', function() {
        messageInput.value = quill.root.innerHTML;
    });

    // Belt-and-suspenders: also set on submit
    document.querySelector('form').addEventListener('submit', function() {
        messageInput.value = quill.root.innerHTML;
    });

    // File upload handling
    const fileInput = document.getElementById('attachments');
    const fileList = document.getElementById('fileList');
    
    fileInput.addEventListener('change', function(e) {
        fileList.innerHTML = '';
        const files = Array.from(e.target.files);
        
        files.forEach(file => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between p-3 bg-slate-50 rounded-lg';
            fileItem.innerHTML = `
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-slate-700">${file.name}</p>
                        <p class="text-xs text-slate-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            fileList.appendChild(fileItem);
        });
    });

    // Drag and drop
    const dropZone = fileInput.parentElement.parentElement;
    
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-blue-400', 'bg-blue-50');
    });
    
    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50');
    });
    
    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50');
        
        const files = Array.from(e.dataTransfer.files);
        fileInput.files = e.dataTransfer.files;
        
        // Trigger change event
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);
    });
});
</script>
@endsection
