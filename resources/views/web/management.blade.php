@extends('web.app')

@section('title', 'Management Team')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body, * { font-family: 'Inter', sans-serif !important; }
  .team-card { transition: all 0.25s ease; }
  .team-card:hover { box-shadow: 0 8px 28px rgba(30,58,110,0.13); transform: translateY(-2px); }
</style>

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Management Team</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Management Team</span>
    </div>
  </div>
</div>

@php
function photoPlaceholder($color = '#1e3a6e', $size = 'md') {
    $h = $size === 'lg' ? 'h-52' : 'h-44';
    $iw = $size === 'lg' ? '36' : '28';
    $aw = $size === 'lg' ? 'w-20 h-20' : 'w-16 h-16';
    return [$h, $iw, $aw];
}
@endphp

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-10">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-2">The People Behind Our Work</p>
    <h2 class="text-xl font-bold text-[#1e3a6e] mb-3">Experienced. Dedicated. Expert.</h2>
    <p class="text-sm text-[#4b5563] leading-relaxed max-w-3xl">
      Genyra Group's management team brings together specialists across biomedical engineering, laboratory sciences, health systems, metrology, finance, and research united by a shared commitment to transforming healthcare delivery across East Africa.
    </p>
  </div>

  {{-- ── CEO ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Executive Leadership</h2>
    </div>
    <div class="flex justify-center pt-6">
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden w-full max-w-lg">
        <div class="h-1.5 bg-[#00a0c6]"></div>
        <div class="flex flex-col sm:flex-row">
          <div class="sm:w-48 w-full h-52 sm:h-auto bg-[#eaf6fb] flex flex-col items-center justify-center gap-2 flex-shrink-0">
            <div class="w-20 h-20 rounded-full bg-[#c8dce8] flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#1e3a6e" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </div>
            <p class="text-[0.68rem] text-[#94a3b8] tracking-wide">Photo</p>
          </div>
          <div class="border-l-4 border-[#00a0c6] px-6 py-6 flex flex-col justify-center">
            <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">Chief Executive Officer</p>
            <h3 class="font-bold text-[#1e3a6e] text-[1.05rem] leading-tight">Name Here</h3>
            <p class="text-[0.75rem] text-[#6b7280] italic mt-0.5 mb-3">Qualifications Here</p>
            <p class="text-[0.82rem] text-[#4b5563] leading-relaxed">Provides overall strategic leadership across Genyra Group's four business lines, driving innovation, regional expansion, and operational excellence.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ── Technical Leads ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Technical Leadership</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-6">
      @foreach([
        ['Technical Lead', 'BioSciences',                         'Discovery. Diagnostics. Translation.',                        '#4caf50'],
        ['Technical Lead', 'MedTech Solutions',                   'Smart technologies for better health outcomes.',               '#e07b2a'],
        ['Technical Lead', 'Health Systems Planning & Advisory',  'Designing resilient, compliant health systems.',               '#5b7fa6'],
        ['Technical Lead', 'Metrology & Calibration Services',    'Precision you can trust.',                                     '#7b5ea7'],
      ] as [$title, $division, $tagline, $color])
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col">
        <div class="h-1.5" style="background:{{ $color }}"></div>
        <div class="h-44 flex flex-col items-center justify-center gap-2 flex-shrink-0" style="background:{{ $color }}14">
          <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background:{{ $color }}35">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="{{ $color }}" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </div>
          <p class="text-[0.65rem] tracking-wide" style="color:{{ $color }}99">Photo</p>
        </div>
        <div class="px-5 py-5 flex flex-col flex-1">
          <p class="text-[0.6rem] font-semibold tracking-widest uppercase mb-0.5" style="color:{{ $color }}">{{ $title }}</p>
          <p class="text-[0.66rem] font-medium text-[#6b7280] uppercase tracking-wide mb-1">{{ $division }}</p>
          <h3 class="font-bold text-[#1e3a6e] text-[0.9rem]">Name Here</h3>
          <p class="text-[0.72rem] text-[#6b7280] italic mt-0.5 mb-3">Qualifications Here</p>
          <p class="text-[0.78rem] text-[#4b5563] leading-relaxed border-t border-[#f0f4f8] pt-3 mt-auto italic">{{ $tagline }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ── Functional Managers ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Functional Management</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-6">
      @foreach([
        ['Research & Development Manager',  'Leads innovation initiatives, product validation pipelines, and research collaborations across the group.'],
        ['Product Engineering Manager',     'Manages engineering design, product development, and technical delivery across our MedTech portfolio.'],
        ['Strategic Consulting Manager',    'Oversees health systems advisory engagements, quality management programmes, and regulatory readiness projects.'],
        ['Laboratory Services Manager',     'Heads calibration laboratory operations, equipment audits, measurement verification, and ISO/IEC 17025 compliance.'],
      ] as [$role, $desc])
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col">
        <div class="h-1.5 bg-[#1e3a6e]"></div>
        <div class="h-44 bg-[#f1f5f9] flex flex-col items-center justify-center gap-2 flex-shrink-0">
          <div class="w-16 h-16 rounded-full bg-[#dde6f0] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#1e3a6e" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </div>
          <p class="text-[0.65rem] text-[#94a3b8] tracking-wide">Photo</p>
        </div>
        <div class="px-5 py-5 flex flex-col flex-1">
          <p class="text-[0.6rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">{{ $role }}</p>
          <h3 class="font-bold text-[#1e3a6e] text-[0.9rem]">Name Here</h3>
          <p class="text-[0.72rem] text-[#6b7280] italic mt-0.5 mb-3">Qualifications Here</p>
          <p class="text-[0.78rem] text-[#4b5563] leading-relaxed border-t border-[#f0f4f8] pt-3 mt-auto">{{ $desc }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ── Corporate Shared Services (department strip no individuals) ── --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#455a64] px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Corporate Shared Services</h2>
      <p class="text-white/50 text-xs mt-0.5">Supporting all business divisions across the group</p>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 divide-y sm:divide-y-0 divide-x divide-[#f0f4f8]">
      @foreach([
        ['Finance & Accounting',       'fa-coins'],
        ['Human Resources',            'fa-users'],
        ['Information Technology',     'fa-server'],
        ['Legal & Compliance',         'fa-scale-balanced'],
        ['Marketing & Communications', 'fa-bullhorn'],
      ] as [$dept, $icon])
      <div class="px-4 py-5 text-center flex flex-col items-center gap-2">
        <div class="w-9 h-9 rounded-full bg-[#eaf6fb] flex items-center justify-center">
          <i class="fas {{ $icon }} text-[#1e3a6e] text-[0.75rem]"></i>
        </div>
        <p class="text-[#1e3a6e] font-semibold text-[0.75rem] leading-tight">{{ $dept }}</p>
      </div>
      @endforeach
    </div>
  </div>

</div>
</div>

@endsection