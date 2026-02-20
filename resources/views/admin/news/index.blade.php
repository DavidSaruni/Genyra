@extends('admin.layouts.app')

@section('title', 'News Management')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold">News Management</h1>
    <a href="{{ route('admin.news.create') }}" class="bg-genyra-primary text-white px-4 py-2 rounded-lg hover:bg-genyra-secondary transition-colors">
        <i class="fas fa-plus mr-2"></i> Create News
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="px-4 py-3 text-left">Title</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Published Date</th>
                        <th class="px-4 py-3 text-left">Created</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $article)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div>
                                    <p class="font-medium">{{ Str::limit($article->title, 60) }}</p>
                                    @if($article->excerpt)
                                        <p class="text-sm text-gray-500">{{ Str::limit($article->excerpt, 80) }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs rounded-full {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if($article->published_at)
                                    {{ $article->published_at->format('M d, Y') }}
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">
                                {{ $article->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.news.show', $article) }}" class="text-genyra-primary hover:text-genyra-secondary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $article) }}" class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                No news articles found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($news->hasPages())
            <div class="mt-6">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
