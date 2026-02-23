@extends('admin.layouts.app')

@section('title', 'View News')

@section('content')

<div class="max-w-4xl">

    {{-- Top bar --}}
    <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
        <nav class="flex items-center gap-2 text-sm text-slate-400">
            <a href="{{ route('admin.news.index') }}" class="hover:text-slate-700 transition-colors">Articles</a>
            <span class="text-slate-300">›</span>
            <span class="text-slate-700 font-semibold">View Article</span>
        </nav>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.news.index') }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-blue-900 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back
            </a>
            <a href="{{ route('admin.news.edit', $news) }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-[#1e3a6e] rounded-lg hover:bg-[#00a0c6] transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z"/></svg>
                Edit Article
            </a>
        </div>
    </div>

    {{-- Hero card --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-4">

        {{-- Main image or placeholder --}}
        @if($news->main_image)
            <img src="{{ asset('storage/' . $news->main_image) }}"
                 alt="{{ $news->title }}"
                 class="w-full max-h-80 object-cover block">
        @else
            <div class="w-full h-40 bg-gradient-to-br from-[#1e3a6e] to-[#00a0c6] flex items-center justify-center">
                <svg class="w-12 h-12 text-white opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <path stroke-linecap="round" d="M21 15l-5-5L5 21"/>
                </svg>
            </div>
        @endif

        {{-- Title + badges --}}
        <div class="px-8 pt-7 pb-6">

            {{-- Status & category badges --}}
            <div class="flex items-center flex-wrap gap-2 mb-4">
                @if($news->status === 'published')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-wide bg-emerald-100 text-emerald-700">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 .5a7.5 7.5 0 1 1 0 15A7.5 7.5 0 0 1 8 .5zm3.354 5.146a.5.5 0 0 0-.708 0L7 9.293 5.354 7.646a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708z"/>
                        </svg>
                        Published
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-wide bg-yellow-100 text-yellow-700">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 .5a7.5 7.5 0 1 1 0 15A7.5 7.5 0 0 1 8 .5zM8 4a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 1 0v-4A.5.5 0 0 0 8 4zm0 6.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5z"/>
                        </svg>
                        Draft
                    </span>
                @endif

                @if($news->categories->count() > 0)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[0.65rem] font-bold uppercase tracking-wide bg-sky-100 text-sky-700">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A2 2 0 0 1 3 12V7a4 4 0 0 1 4-4z"/>
                        </svg>
                        {{ $news->categories->first()->name }}
                    </span>
                @endif
            </div>

            {{-- Title --}}
            <h1 class="text-2xl font-bold text-slate-900 leading-snug mb-5">{{ $news->title }}</h1>

            {{-- Excerpt --}}
            @if($news->excerpt)
                <div class="border-l-4 border-[#1e3a6e] bg-blue-50 rounded-r-lg px-5 py-3.5 text-sm text-slate-600 italic leading-relaxed">
                    {{ $news->excerpt }}
                </div>
            @endif
        </div>

        {{-- Meta pills strip --}}
        <div class="flex flex-wrap gap-2 px-8 py-3.5 border-t border-slate-100 bg-slate-50">

            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[0.7rem] text-slate-500 font-medium">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                Created {{ $news->created_at->format('M d, Y') }}
            </span>

            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[0.7rem] text-slate-500 font-medium">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M12 8v4l3 3"/><circle cx="12" cy="12" r="9"/>
                </svg>
                Updated {{ $news->updated_at->format('M d, Y H:i') }}
            </span>

            @if($news->published_at)
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[0.7rem] text-slate-500 font-medium">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M5 3l14 9-14 9V3z"/>
                    </svg>
                    Published {{ $news->published_at->format('M d, Y H:i') }}
                </span>
            @endif

            @if($news->read_time)
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[0.7rem] text-slate-500 font-medium">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    {{ $news->read_time }} min read
                </span>
            @endif

            <span class="inline-flex items-center px-3 py-1.5 bg-white border border-slate-200 rounded-full text-[0.68rem] text-slate-400 font-mono">
                /{{ $news->slug }}
            </span>

        </div>
    </div>

    {{-- Additional Images --}}
    @if($news->additional_images && count($news->additional_images))
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-4">
            <div class="flex items-center gap-2 px-6 py-3 border-b border-slate-100 bg-slate-50">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/>
                    <path stroke-linecap="round" d="M21 15l-5-5L5 21"/>
                </svg>
                <span class="text-[0.65rem] font-bold text-slate-500 uppercase tracking-widest">
                    Additional Images ({{ count($news->additional_images) }})
                </span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach($news->additional_images as $image)
                        <img src="{{ asset('storage/' . $image) }}"
                             alt="{{ $news->title }}"
                             class="w-full aspect-video object-cover rounded-lg border border-slate-200 hover:scale-[1.02] hover:shadow-md transition-all duration-200 cursor-pointer">
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Article Content --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-4">
        <div class="flex items-center gap-2 px-6 py-3 border-b border-slate-100 bg-slate-50">
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" d="M9 12h6M9 16h4M5 8h14M5 4h14M5 20h14"/>
            </svg>
            <span class="text-[0.65rem] font-bold text-slate-500 uppercase tracking-widest">Article Content</span>
        </div>
        <div class="p-8">
            <div class="prose prose-sm prose-slate max-w-none
                        prose-headings:font-bold prose-headings:text-slate-800
                        prose-p:text-slate-600 prose-p:leading-relaxed
                        prose-a:text-[#00a0c6] prose-a:no-underline hover:prose-a:underline
                        prose-blockquote:border-l-[#1e3a6e] prose-blockquote:bg-blue-50
                        prose-blockquote:rounded-r-lg prose-blockquote:py-1
                        prose-img:rounded-lg prose-img:shadow-sm">
                {!! $news->content !!}
            </div>
        </div>
    </div>

    {{-- Danger Zone --}}
    <div class="flex items-center justify-between flex-wrap gap-4 p-5 bg-red-50 border border-red-200 rounded-xl">
        <div>
            <p class="text-sm font-bold text-red-600 mb-0.5">Danger Zone</p>
            <p class="text-sm text-red-400 m-0">Permanently deletes this article and all its data. This cannot be undone.</p>
        </div>
        <form action="{{ route('admin.news.destroy', $news) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to permanently delete this article?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-red-600 bg-white border border-red-200 rounded-lg hover:bg-red-600 hover:text-white hover:border-red-600 transition-all cursor-pointer">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <polyline points="3 6 5 6 21 6"/>
                    <path stroke-linecap="round" d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6m5 0V4h4v2"/>
                </svg>
                Delete Article
            </button>
        </form>
    </div>

</div>

@endsection