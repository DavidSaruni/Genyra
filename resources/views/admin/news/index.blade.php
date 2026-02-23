@extends('admin.layouts.app')

@section('title', 'News Management')

@section('content')

{{-- Header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">News Articles</h1>
        <p style="font-size:0.96rem; color:#64748b; margin:0.2rem 0 0;">Manage and publish your news content</p>
    </div>
    <a href="{{ route('admin.news.create') }}"
       style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.55rem 1rem; background:#1e3a6e; color:#fff; font-size:0.8rem; font-weight:600; border-radius:6px; text-decoration:none; transition:background 0.15s;"
       onmouseover="this.style.background='#00a0c6'" onmouseout="this.style.background='#1e3a6e'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        New Article
    </a>
</div>

{{-- Table --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; box-shadow:0 1px 4px rgba(0,0,0,0.05); overflow:hidden;">
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.96rem;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:1px solid #e2e8f0;">
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Article</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Status</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Published</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Created</th>
                    <th style="padding:0.75rem 1.25rem; text-align:right; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $article)
                    <tr style="border-bottom:1px solid #f1f5f9; transition:background 0.12s;"
                        onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        {{-- Article --}}
                        <td style="padding:0.9rem 1.25rem; max-width:320px;">
                            <p style="font-weight:600; color:#0f172a; margin:0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ Str::limit($article->title, 60) }}
                            </p>
                            @if($article->excerpt)
                                <p style="font-size:0.75rem; color:#94a3b8; margin:0.2rem 0 0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                    {{ Str::limit($article->excerpt, 80) }}
                                </p>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap;">
                            @if($article->status === 'published')
                                <span style="display:inline-flex; align-items:center; gap:0.35rem; padding:0.25rem 0.65rem; background:#f0fdf4; color:#15803d; border:1px solid #bbf7d0; border-radius:99px; font-size:0.7rem; font-weight:600;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#22c55e;"></span> Published
                                </span>
                            @else
                                <span style="display:inline-flex; align-items:center; gap:0.35rem; padding:0.25rem 0.65rem; background:#fffbeb; color:#b45309; border:1px solid #fde68a; border-radius:99px; font-size:0.7rem; font-weight:600;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#f59e0b;"></span> Draft
                                </span>
                            @endif  
                        </td>

                        {{-- Published date --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap; font-size:0.96rem; color:#64748b;">
                            @if($article->published_at)
                                {{ $article->published_at->format('M d, Y') }}
                            @else
                                <span style="color:#cbd5e1;">—</span>
                            @endif
                        </td>

                        {{-- Created --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap; font-size:0.96rem; color:#64748b;">
                            {{ $article->created_at->format('M d, Y') }}
                        </td>

                        {{-- Actions --}}
                        <td style="padding:0.9rem 1.25rem;">
                            <div style="display:flex; align-items:center; justify-content:flex-end; gap:0.2rem;">

                                {{-- View --}}
                                <a href="{{ route('admin.news.show', $article) }}" title="View"
                                   style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; text-decoration:none; transition:all 0.12s;"
                                   onmouseover="this.style.background='#eaf6fb'; this.style.color='#1e3a6e';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.news.edit', $article) }}" title="Edit"
                                   style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; text-decoration:none; transition:all 0.12s;"
                                   onmouseover="this.style.background='#f0fdf4'; this.style.color='#16a34a';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.news.destroy', $article) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?')" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"
                                        style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; background:none; border:none; cursor:pointer; transition:all 0.12s;"
                                        onmouseover="this.style.background='#fef2f2'; this.style.color='#dc2626';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding:3.5rem 1.25rem; text-align:center;">
                            <div style="display:flex; flex-direction:column; align-items:center; gap:0.65rem;">
                                <div style="width:3rem; height:3rem; border-radius:50%; background:#f1f5f9; display:flex; align-items:center; justify-content:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#cbd5e1" viewBox="0 0 16 16">
                                        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                                    </svg>
                                </div>
                                <p style="font-weight:600; color:#64748b; font-size:0.85rem; margin:0;">No news articles found.</p>
                                <a href="{{ route('admin.news.create') }}"
                                   style="font-size:0.96rem; color:#1e3a6e; font-weight:500; text-decoration:none;"
                                   onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                    Create your first article →
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($news->hasPages())
        <div style="padding:0.9rem 1.25rem; border-top:1px solid #f1f5f9; background:#f8fafc;">
            {{ $news->links() }}
        </div>
    @endif
</div>

@endsection