@extends('web.app')

@section('title', 'Board Of Directors')
@section('meta_description', 'Meet the genyra Group board of directors providing governance, strategic oversight, and leadership across our healthcare and medtech operations in East Africa.')

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
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Board of Directors</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Board of Directors</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-10">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-2">Corporate Governance</p>
    <h2 class="text-xl font-bold text-[#1e3a6e] mb-3">Leadership &amp; Oversight</h2>
    <p class="text-sm text-[#4b5563] leading-relaxed max-w-3xl">
      genyra Group is governed by a board of experienced professionals committed to ethical leadership, strategic oversight, and delivering lasting value to healthcare systems across East Africa. The board provides guidance, accountability, and strategic direction to the executive management team.
    </p>
  </div>

  {{-- ── Chairman & Secretary/CEO Featured ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Executive Board</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-6">
      @foreach([
        [
          'Chairman',
          'David Masinde',
          '',
          'Experienced NGO leader with expertise in managing donor-funded programs (USAID, EU, ECHO, BMZ, ADA, among others) and leading teams of 600+ staff. Skilled in resource mobilization, stakeholder engagement, and organizational leadership, with a strong track record of building partnerships and driving impact in the development sector.',
          'images/directors/david.jpg',
        ],
        [
          'Secretary / Chief Executive Officer',
          'Ms. Rhodah N. Mukopi',
          '',
          'Leads genyra Group\'s overall strategy and operations with a focus on innovation, quality, and regional growth. With a background spanning biomedical engineering and executive management, instrumental in positioning genyra as East Africa\'s most trusted healthcare solutions partner.',
          null,
        ],
      ] as [$role, $name, $credentials, $bio, $photo])
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
        <div class="h-1.5 bg-[#00a0c6]"></div>
        <div class="flex flex-col sm:flex-row">
          <div class="sm:w-48 w-full h-auto sm:h-auto bg-[#eaf6fb] flex flex-col items-center justify-center gap-2 flex-shrink-0 overflow-hidden">
            @if($photo)
              <img src="{{ asset($photo) }}" alt="{{ $name }}" class="w-full h-full object-cover object-top">
            @else
            <div class="w-20 h-20 rounded-full bg-[#c8dce8] flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#1e3a6e" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </div>
            <p class="text-[0.68rem] text-[#94a3b8] tracking-wide">Photo</p>
            @endif
          </div>
          <div class="border-l-4 border-[#00a0c6] px-6 py-6 flex flex-col justify-center">
            <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">{{ $role }}</p>
            <h3 class="font-bold text-[#1e3a6e] text-[1.05rem] leading-tight">{{ $name }}</h3>
            <p class="text-[0.75rem] text-[#6b7280] italic mt-0.5 mb-3">{{ $credentials }}</p>
            <p class="text-[0.82rem] text-[#4b5563] leading-relaxed">{{ $bio }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ── 5 Board Members ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Board Members</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 pt-6">
      @foreach([
        [
          'Board Member',
          'Damary Okwako',
          'PhD in Strategic Management (MMUST) · MBA, Strategic Planning (University of Nairobi) · BEd (Kenyatta University)',
          'A strategic management scholar and lecturer at Masinde Muliro University of Science and Technology (MMUST), with published research on how strategic planning practices influence organizational performance. Brings academic rigor and strategic planning expertise to support genyra\'s long-term institutional direction and governance practices.',
          'images/directors/damary okwako.jpg',
        ],
        [
          'Board Member',
          'Dr. Nelson Menza',
          'PhD, Medical Laboratory Science (Medical Mycology & Bacteriology) · Kenyatta University',
          'Chairperson of the Department of Medical Laboratory Science at Kenyatta University\'s School of Medicine, with an extensive research and publication record spanning infectious disease diagnostics, microbiology, and laboratory systems. A licensed member of the Kenya Medical Laboratory Technologist and Technicians Board, he provides scientific oversight and academic linkage to genyra\'s BioSciences division.',
          'images/directors/Dr_Nelson_Chengo_Menza.jpg',
        ],
        [
          'Board Member',
          'Dr. Filex Otieno',
          '',
          'A public health physician and health systems specialist with experience working with the Ministry of Health, WHO, and international NGOs. Guides genyra\'s Health Systems Advisory division with strong policy expertise.',
          'images/directors/dr-filex-odhiambo.jpg.jpeg',
        ],
        [
          'Board Member',
          'Ms. Zabib Musa Loro',
          'BSc, Human Resource Management · Diplomas in Development Studies, Gender Studies, Islamic Studies & Leadership',
          'Executive Director of Women for Justice and Equality (WOJE), with over a decade of leadership in gender programming, human rights advocacy, and HIV/AIDS response across South Sudan and Eastern Africa. A 2025 US International Women of Courage Award recipient, she brings deep expertise in community health programming and regional advocacy networks, strengthening genyra\'s commitment to equitable, people-centered healthcare delivery.',
          'images/directors/zabibloro.jpeg',
        ],
        
      ] as [$role, $name, $credentials, $bio, $photo])
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col">
        <div class="h-1.5 bg-[#1e3a6e]"></div>
        <div class="h-75 bg-[#f1f5f9] flex flex-col items-center justify-center gap-2 flex-shrink-0 overflow-hidden">
          @if($photo)
            <img src="{{ asset($photo) }}" alt="{{ $name }}" class="w-full h-full object-cover object-top">
          @else
          <div class="w-16 h-16 rounded-full bg-[#dde6f0] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#1e3a6e" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </div>
          <p class="text-[0.65rem] text-[#94a3b8] tracking-wide">Photo</p>
          @endif
        </div>
        <div class="px-5 py-5 flex flex-col flex-1">
          <p class="text-[0.62rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">{{ $role }}</p>
          <h3 class="font-bold text-[#1e3a6e] text-[0.9rem]">{{ $name }}</h3>
          <p class="text-[0.72rem] text-[#6b7280] italic mt-0.5 mb-3">{{ $credentials }}</p>
          <p class="text-[0.8rem] text-[#4b5563] leading-relaxed border-t border-[#f0f4f8] pt-3 mt-auto">{{ $bio }}</p>
        </div>
      </div>
      @endforeach

      {{-- Empty slot --}}
      <!-- <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col items-center justify-center min-h-[300px] border-2 border-dashed border-[#c8dce8]">
        <div class="w-16 h-16 rounded-full border-2 border-dashed border-[#c8dce8] flex items-center justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#c8dce8" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          </svg>
        </div>
        <p class="text-[0.75rem] text-[#c8dce8] font-medium">Position to be filled</p>
      </div> -->
    </div>
  </div>

</div>
</div>

@endsection