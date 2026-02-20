@extends('admin.layouts.app')

@section('title', 'Contact Message - Genyra Admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.contacts.index') }}" 
                       class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="text-lg font-semibold text-gray-900">Contact Message</h3>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.contacts.reply', $contact->id) }}" 
                       class="px-4 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary transition-colors">
                        <i class="fas fa-reply mr-2"></i>
                        Reply
                    </a>
                    <a href="mailto:{{ $contact->email }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Client
                    </a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Message Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Sender Information -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <p class="text-gray-900">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-gray-900">
                            <a href="mailto:{{ $contact->email }}" 
                               class="text-genyra-primary hover:text-genyra-secondary">
                                {{ $contact->email }}
                            </a>
                        </p>
                    </div>
                    @if($contact->phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <p class="text-gray-900">{{ $contact->phone }}</p>
                        </div>
                    @endif
                </div>

                <!-- Message Metadata -->
                <div class="space-y-4">
                    @if($contact->subject)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <p class="text-gray-900">{{ $contact->subject }}</p>
                        </div>
                    @endif
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Received</label>
                        <p class="text-gray-900">
                            {{ $contact->created_at->format('M d, Y \a\t h:i A') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message ID</label>
                        <p class="text-gray-500 text-sm">#{{ $contact->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="border-t border-gray-200 pt-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">Message</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
