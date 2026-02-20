@extends('admin.layouts.app')

@section('title', 'Reply to Contact - Genyra Admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                       class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="text-lg font-semibold text-gray-900">Reply to Contact Message</h3>
                </div>
            </div>
        </div>

        <!-- Original Message Preview -->
        <div class="p-6 bg-gray-50 border-b border-gray-200">
            <h4 class="text-sm font-medium text-gray-700 mb-3">Original Message</h4>
            <div class="bg-white rounded-lg p-4 border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                    <div>
                        <span class="text-sm font-medium text-gray-600">From:</span>
                        <p class="text-gray-900">{{ $contact->name }} ({{ $contact->email }})</p>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-600">Date:</span>
                        <p class="text-gray-900">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                @if($contact->subject)
                    <div class="mb-3">
                        <span class="text-sm font-medium text-gray-600">Subject:</span>
                        <p class="text-gray-900">{{ $contact->subject }}</p>
                    </div>
                @endif
                <div>
                    <span class="text-sm font-medium text-gray-600">Message:</span>
                    <p class="text-gray-900 mt-1">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        <!-- Reply Form -->
        <div class="p-6">
            <form action="{{ route('admin.contacts.send-reply', $contact->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="reply_message" class="block text-sm font-medium text-gray-700 mb-2">
                        Your Reply <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="reply_message" 
                        name="reply_message" 
                        rows="8" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-genyra-primary focus:border-transparent"
                        placeholder="Type your reply message here..."
                        required>{{ old('reply_message') }}</textarea>
                    @error('reply_message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">
                        Minimum 10 characters. This will be sent to {{ $contact->email }}
                    </p>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                       class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <div class="space-x-3">
                        <button type="submit" 
                                class="px-6 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Reply
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
