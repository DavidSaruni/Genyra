@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- News Stats -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-genyra-primary rounded-lg">
                <i class="fas fa-newspaper text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">Total News</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\News::count() }}</p>
            </div>
        </div>
    </div>

    <!-- Contacts Stats -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-500 rounded-lg">
                <i class="fas fa-envelope text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">Total Messages</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Contact::count() }}</p>
            </div>
        </div>
    </div>

    <!-- Posters Stats -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-500 rounded-lg">
                <i class="fas fa-image text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">Total Posters</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Poster::count() }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent News -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Recent News</h3>
                <a href="{{ route('admin.news.index') }}" class="text-genyra-primary hover:text-genyra-secondary font-medium">
                    View All
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentNews = \App\Models\News::latest()->take(3)->get())
                @if($recentNews->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentNews as $news)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">{{ Str::limit($news->title, 40) }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $news->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $news->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                                        {{ ucfirst($news->status) }}
                                    </span>
                                    <a href="{{ route('admin.news.edit', $news) }}" class="text-genyra-primary hover:text-genyra-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-newspaper text-gray-300 text-4xl mb-4"></i>
                        <p class="text-gray-500">No news articles found.</p>
                        <a href="{{ route('admin.news.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary">
                            <i class="fas fa-plus mr-2"></i> Create First News
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Recent Messages</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-genyra-primary hover:text-genyra-secondary font-medium">
                    View All
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentContacts = \App\Models\Contact::latest()->take(3)->get())
                @if($recentContacts->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentContacts as $contact)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">{{ Str::limit($contact->name, 30) }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $contact->created_at->format('M d, Y') }}</p>
                                    @if(!$contact->read_at)
                                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 mt-2">
                                            Unread
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-genyra-primary hover:text-genyra-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-envelope text-gray-300 text-4xl mb-4"></i>
                        <p class="text-gray-500">No contact messages found.</p>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <!-- Recent Posters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-10">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Recent Posters</h3>
                <a href="{{ route('admin.posters.index') }}" class="text-genyra-primary hover:text-genyra-secondary font-medium">
                    View All
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentPosters = \App\Models\Poster::latest()->take(3)->get())
                @if($recentPosters->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentPosters as $poster)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">{{ Str::limit($poster->title, 30) }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $poster->created_at->format('M d, Y') }}</p>
                                    @if($poster->is_active)
                                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 mt-2">
                                            Active
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('admin.posters.edit', $poster) }}" class="text-genyra-primary hover:text-genyra-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-image text-gray-300 text-4xl mb-4"></i>
                        <p class="text-gray-500">No posters found.</p>
                        <a href="{{ route('admin.posters.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-genyra-primary text-white rounded-lg hover:bg-genyra-secondary">
                            <i class="fas fa-plus mr-2"></i> Create First Poster
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection