@extends('admin.layouts.app')

@section('title', 'Email Management')

@section('content')
<div class="max-w-6xl">
    {{-- Top bar --}}
    <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
        <nav class="flex items-center gap-2 text-sm text-slate-400">
            <a href="{{ route('admin.index') }}" class="hover:text-slate-700 transition-colors">Dashboard</a>
            <span class="text-slate-300">›</span>
            <span class="text-slate-700 font-semibold">Email Management</span>
        </nav>
        <a href="{{ route('admin.emails.create') }}"
           class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4a2 2 0 002 2v8a2 2 0 002 2h8m8-8H4a2 2 0 002 2v8a2 2 0 002 2z"/>
            </svg>
            Compose Email
        </a>
    </div>

    {{-- Email Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-slate-600">Total Sent</span>
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.83 2H5a2 2 0 00-2 2v12a2 2 0 002 2h8.93l7.89-4.26A2 2 0 0018 18zM3 8a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                </svg>
            </div>
            <div class="text-2xl font-bold text-slate-900">{{ $emails->total() }}</div>
            <p class="text-xs text-slate-500 mt-1">Emails sent this month</p>
        </div>
        
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-slate-600">Recipients</span>
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3h14a3 3 0 003-3V8a3 3 0 00-3-3z"/>
                </svg>
            </div>
            <div class="text-2xl font-bold text-slate-900">{{ $emails->unique('to_email')->count() }}</div>
            <p class="text-xs text-slate-500 mt-1">Unique recipients</p>
        </div>
        
        <!-- <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-slate-600">Attachments</span>
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 112.828 2.828l6.586 6.586a2 2 0 002.828-2.828l-6.586-6.586a2 2 0 00-2.828-2.828L15.172 7z"/>
                </svg>
            </div>
            <div class="text-2xl font-bold text-slate-900">{{ $emails->sum('attachment_count') }}</div>
            <p class="text-xs text-slate-500 mt-1">Files attached</p>
        </div> -->
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('admin.emails.create') }}" 
                   class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">Compose New Email</h3>
                        <p class="text-sm text-slate-500">Send a custom email to any recipient</p>
                    </div>
                </a>
                
                <!-- <a href="#" 
                   class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">Email Templates</h3>
                        <p class="text-sm text-slate-500">Manage email templates</p>
                    </div>
                </a> -->
            </div>
        </div>
    </div>

    {{-- Recent Activity --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center gap-2 px-6 py-3 border-b border-slate-100 bg-slate-50">
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m0 0-3 3m-3-3h6m-6 4h6a2 2 0 002 2v8a2 2 0 002-2h6a2 2 0 00-2-2v-4a2 2 0 00-2-2z"/>
            </svg>
            <span class="text-[0.65rem] font-bold text-slate-500 uppercase tracking-widest">
                Recent Email Activity
            </span>
        </div>
        
        <div class="p-6">
            @if($emails->count() > 0)
                <div class="space-y-4">
                    @foreach($emails as $email)
                        <div class="border border-slate-200 rounded-lg p-4 hover:bg-slate-50 transition-colors">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <h3 class="font-semibold text-slate-900 text-lg">{{ $email->subject }}</h3>
                                    <p class="text-sm text-slate-600">To: {{ $email->to_email }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                        {{ $email->status === 'sent' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $email->status === 'sent' ? 'Sent' : 'Pending' }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="text-sm text-slate-600 space-y-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m0 0-3 3m-3-3h6m-6 4h6a2 2 0 002 2v8a2 2 0 002-2h6a2 2 0 00-2-2v-4a2 2 0 00-2-2z"/>
                                    </svg>
                                    <span>Sent: {{ $email->sent_at->format('M j, Y g:i A') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 112.828 2.828l6.586 6.586a2 2 0 002.828-2.828l-6.586-6.586a2 2 0 00-2.828-2.828L15.172 7z"/>
                                    </svg>
                                    <span>Attachments: {{ $email->attachment_count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6">
                    {{ $emails->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.83 2H5a2 2 0 00-2 2v12a2 2 0 002 2h8.93l7.89-4.26A2 2 0 0018 18zM3 8a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">No emails sent yet</h3>
                    <p class="text-slate-500 mb-6">Start composing your first email to see activity here</p>
                    <a href="{{ route('admin.emails.create') }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4a2 2 0 002 2v8a2 2 0 002 2h8m8-8H4a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        Compose Email
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
