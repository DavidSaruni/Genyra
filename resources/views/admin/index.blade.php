@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-500 rounded-lg">
                <i class="fas fa-check-circle text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">Published</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\News::where('status', 'published')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-amber-500 rounded-lg">
                <i class="fas fa-edit text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">Drafts</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\News::where('status', 'draft')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
        <div class="flex items-center">
            <div class="p-3 bg-genyra-accent rounded-lg">
                <i class="fas fa-clock text-white text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-gray-500 text-sm">This Month</p>
                <p class="text-2xl font-bold text-gray-800">{{ \App\Models\News::whereMonth('created_at', now()->month)->count() }}</p>
            </div>
        </div>
    </div>
</div>

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
        @if($recentNews = \App\Models\News::latest()->take(5)->get())
            @if($recentNews->count() > 0)
                <div class="space-y-4">
                    @foreach($recentNews as $news)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800">{{ Str::limit($news->title, 50) }}</h4>
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
@endsection