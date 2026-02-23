@extends('admin.layouts.app')

@section('title', 'Posters')

@section('content')
{{-- Header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
    <div>
        <h1 style="font-size:1.1rem; font-weight:700; color:#0f172a; margin:0;">Poster Management</h1>
        <p style="font-size:0.78rem; color:#64748b; margin:0.2rem 0 0;">Manage website posters and promotional images</p>
    </div>
    <a href="{{ route('admin.posters.create') }}"
       style="display:inline-flex; align-items:center; gap:0.4rem; padding:0.55rem 1rem; background:#1e3a6e; color:#fff; font-size:0.8rem; font-weight:600; border-radius:6px; text-decoration:none; transition:background 0.15s;"
       onmouseover="this.style.background='#00a0c6'" onmouseout="this.style.background='#1e3a6e'">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        New Poster
    </a>
</div>

{{-- Table --}}
<div style="background:#fff; border-radius:8px; border:1px solid #e2e8f0; box-shadow:0 1px 4px rgba(0,0,0,0.05); overflow:hidden;">
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.82rem;">
            <thead>
                <tr style="background:#f8fafc; border-bottom:1px solid #e2e8f0;">
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Preview</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Title</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Status</th>
                    <th style="padding:0.75rem 1.25rem; text-align:left; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Created</th>
                    <th style="padding:0.75rem 1.25rem; text-align:right; font-size:0.68rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posters as $poster)
                    <tr style="border-bottom:1px solid #f1f5f9; transition:background 0.12s;"
                        onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        {{-- Preview --}}
                        <td style="padding:0.9rem 1.25rem;">
                            <img src="{{ asset($poster->image_path) }}" 
                                 alt="{{ $poster->title }}" 
                                 style="height:3.5rem; width:5.5rem; object-fit:cover; border-radius:6px; border:1px solid #e2e8f0;">
                        </td>

                        {{-- Title --}}
                        <td style="padding:0.9rem 1.25rem; max-width:320px;">
                            <p style="font-weight:600; color:#0f172a; margin:0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                {{ $poster->title }}
                            </p>
                            @if($poster->description)
                                <p style="font-size:0.75rem; color:#94a3b8; margin:0.2rem 0 0; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                    {{ Str::limit($poster->description, 80) }}
                                </p>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap;">
                            @if($poster->is_active)
                                <span style="display:inline-flex; align-items:center; gap:0.35rem; padding:0.25rem 0.65rem; background:#f0fdf4; color:#15803d; border:1px solid #bbf7d0; border-radius:99px; font-size:0.7rem; font-weight:600;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#22c55e;"></span> Active
                                </span>
                            @else
                                <span style="display:inline-flex; align-items:center; gap:0.35rem; padding:0.25rem 0.65rem; background:#f8fafc; color:#64748b; border:1px solid #e2e8f0; border-radius:99px; font-size:0.7rem; font-weight:600;">
                                    <span style="width:6px; height:6px; border-radius:50%; background:#94a3b8;"></span> Inactive
                                </span>
                            @endif
                        </td>

                        {{-- Created --}}
                        <td style="padding:0.9rem 1.25rem; white-space:nowrap; font-size:0.78rem; color:#64748b;">
                            {{ $poster->created_at->format('M d, Y') }}
                        </td>

                        {{-- Actions --}}
                        <td style="padding:0.9rem 1.25rem;">
                            <div style="display:flex; align-items:center; justify-content:flex-end; gap:0.2rem;">

                                {{-- Edit --}}
                                <a href="{{ route('admin.posters.edit', $poster->id) }}" title="Edit"
                                   style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#94a3b8; text-decoration:none; transition:all 0.12s;"
                                   onmouseover="this.style.background='#f0fdf4'; this.style.color='#16a34a';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#94a3b8';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.posters.destroy', $poster->id) }}" method="POST"
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
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.032-3.032a.75.75 0 0 0-1.061 0L6.97 11.78a.75.75 0 0 1-1.061 0l-2.031-2.031a.75.75 0 0 0-1.061 0L3.002 9.845V3a1 1 0 0 1 1-1h12z"/>
                                    </svg>
                                </div>
                                <p style="font-weight:600; color:#64748b; font-size:0.85rem; margin:0;">No posters found.</p>
                                <p style="font-size:0.78rem; color:#94a3b8; margin:0;">Create your first poster to display on the website.</p>
                                <a href="{{ route('admin.posters.create') }}"
                                   style="font-size:0.78rem; color:#1e3a6e; font-weight:500; text-decoration:none;"
                                   onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                    Create your first poster →
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posters->hasPages())
        <div style="padding:0.9rem 1.25rem; border-top:1px solid #f1f5f9; background:#f8fafc;">
            {{ $posters->links() }}
        </div>
    @endif
</div>
@endsection
