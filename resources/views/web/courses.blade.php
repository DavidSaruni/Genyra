@extends('web.app')

@section('title', 'Professional Training Programmes - genyra Institute')

@section('body')

<style>
  :root {
    --navy:   #1E3A6E;
    --cyan:   #00A0C6;
    --cream:  #f0ece4;
    --sand:   #f7f5f1;
    --muted:  #f0ede8;
    --ink:    #1a1510;
    --warm:   #6b5f52;
  }

  * { font-family: 'DM Sans', sans-serif !important; }
  .font-cormorant { font-family: 'Cormorant Garamond', serif !important; }
  .     { font-family: 'DM Mono', monospace !important; }
  html { scroll-behavior: smooth; }

  /* ── CARD CORE ── */
  .course-card {
    position: relative;
    background: #fff;
    border-radius: 12px;
    border: 1px solid rgba(0,0,0,0.09);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s cubic-bezier(.22,1,.36,1), box-shadow 0.3s cubic-bezier(.22,1,.36,1);
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }
  .course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(30,58,110,0.14);
  }

  /* ── CARD HEADER BAND ── */
  .card-band {
    position: relative;
    padding: 1.4rem 1.5rem 1.1rem;
    overflow: hidden;
  }
  .card-band::before {
    content: '';
    position: absolute;
    inset: 0;
    opacity: 0.06;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }
  .card-band-icon {
    position: absolute;
    right: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.12;
  }

  /* ── CARD CODE PILL ── */
  .code-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.2rem 0.6rem;
    border-radius: 4px;
    font-family: 'DM Mono', monospace !important;
    font-size: 0.68rem;
    font-weight: 400;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    border: 1px solid currentColor;
    opacity: 0.9;
    width: fit-content;
    margin-bottom: 0.65rem;
  }

  /* ── CARD BODY ── */
  .card-body {
    padding: 1.25rem 1.5rem 1rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }
  .card-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--ink);
    line-height: 1.35;
    margin: 0;
  }


  /* ── CARD FOOTER ── */
  .card-footer {
    padding: 1rem 1.5rem 1.25rem;
    border-top: 1px solid #f0f0f0;
    background: #fafafa;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }
  .who-label text-blue-500 {
    font-family: 'DM Mono', monospace !important;
    font-size: 0.6rem;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--warm);
    margin-bottom: 0.25rem;
    opacity: 0.75;
  }
  .who-text text-gray-700 {
    font-size: 0.72rem;
    line-height: 1.55;
    color: var(--ink);
  }

  /* ── TAGS ROW ── */
  .tags-row {
    display: flex;
    flex-wrap: wrap;
    gap: 0.3rem;
  }
  .tag {
    display: inline-flex;
    align-items: center;
    gap: 0.2rem;
    padding: 0.22rem 0.55rem;
    border-radius: 99px;
    font-size: 0.62rem;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
  }

  /* ── ENROL BUTTON ── */
  .enrol-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.45rem;
    width: 100%;
    padding: 0.6rem 1rem;
    border-radius: 7px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-decoration: none;
    transition: all 0.2s cubic-bezier(.22,1,.36,1);
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .enrol-btn::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0);
    transition: background 0.2s;
  }
  .enrol-btn:hover::after { background: rgba(255,255,255,0.12); }
  .enrol-btn svg { transition: transform 0.2s; }
  .enrol-btn:hover svg { transform: translateX(2px); }

  /* ── FILTER BAR ── */
  .filter-btn {
    padding: 0.45rem 1.1rem;
    border-radius: 99px;
    border: 1.5px solid rgba(0,0,0,0.15);
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--warm);
    background: transparent;
    cursor: pointer;
    transition: all 0.15s;
    white-space: nowrap;
    letter-spacing: 0.02em;
  }
  .filter-btn:hover  { border-color: var(--navy); color: var(--navy); background: rgba(30,58,110,0.04); }
  .filter-btn.active { background: var(--navy); color: #fff; border-color: var(--navy); }

  /* ── PILLAR DIVIDER ── */
  .pillar-header {
    display: flex;
    align-items: flex-end;
    gap: 1.5rem;
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
    position: relative;
  }
  .pillar-header::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--accent-color) 0%, transparent 100%);
  }

  /* ── CARD ENTER ANIMATION ── */
  @keyframes cardIn {
    from { opacity:0; transform: translateY(20px); }
    to   { opacity:1; transform: translateY(0); }
  }
  .course-card { animation: cardIn 0.4s ease both; }
  .course-card:nth-child(2) { animation-delay: 0.06s; }
  .course-card:nth-child(3) { animation-delay: 0.12s; }
  .course-card:nth-child(4) { animation-delay: 0.18s; }
  .course-card:nth-child(5) { animation-delay: 0.24s; }

  .pillar-section.hidden { display: none; }
</style>

{{-- ── HERO ── --}}
<header class="relative mt-28 overflow-hidden flex items-center" style="min-height: 450px !important;">

  {{-- Background photo --}}
  <div class="absolute inset-0 z-0">
    <img src="https://images.pexels.com/photos/8617742/pexels-photo-8617742.jpeg?auto=compress&cs=tinysrgb&w=1920"
         alt="genyra Institute" class="w-full h-full object-cover">
    <div class="absolute inset-0" style="background: linear-gradient(105deg, #0a1628 0%, #0d1f3c 45%, rgba(13,31,60,0.65) 100%);"></div>
  </div>

  {{-- Cyan glow orb --}}
  <div class="absolute top-[-60px] right-[8%] w-[400px] h-[400px] rounded-full opacity-10 blur-[90px] z-0 pointer-events-none"
       style="background: radial-gradient(circle, #00A0C6, transparent 70%);"></div>

  <div class="relative z-10 w-full px-6 lg:px-20 py-14">

    {{-- Wordmark --}}
    <div class="flex items-center gap-3 mb-10">
      <div class="h-px w-7 bg-[#00A0C6]"></div>
      <span class="font-cormorant text-[1.4rem] tracking-[0.12em] text-white/90">
        gen<span class="text-[#00A0C6]">y</span>ra <em class="italic">Institute</em>
      </span>
      <div class="h-px w-10" style="background: linear-gradient(to right, rgba(0,160,198,0.4), transparent);"></div>
      <span class="text-[10px] tracking-[0.3em] text-white uppercase hidden md:block">
        Continuing Education Catalogue · 2025
      </span>
    </div>

    {{-- Two-column layout --}}
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-10 lg:gap-16 items-center">

      {{-- LEFT: Headline --}}
      <div>
        <h1 class="font-cormorant text-[2.6rem] lg:text-[3.4rem] text-white font-bold leading-[1.08] mb-5">
          Learn from<br>
          <span class="italic text-[#00A0C6]">Africa's</span> Leading<br>
          Healthcare Experts
        </h1>
        <p class="text-white/50 text-[14px] leading-relaxed max-w-[400px] mb-7">
          Practical, accredited programmes built for working health professionals delivered entirely online.
        </p>
        <a href="https://academy.genyragroup.com/" target="_blank"
           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-white transition-all duration-200"
           style="background: #00A0C6; box-shadow: 0 6px 20px rgba(0,160,198,0.35);"
           onmouseover="this.style.boxShadow='0 10px 28px rgba(0,160,198,0.5)'; this.style.transform='translateY(-1px)'"
           onmouseout="this.style.boxShadow='0 6px 20px rgba(0,160,198,0.35)'; this.style.transform='none'">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
          </svg>
          Visit genyra Institute Platform
        </a>
      </div>

      {{-- RIGHT: Category cards --}}
      <div class="flex flex-col gap-2.5">

        <p class="text-[10px] tracking-[0.28em] text-white uppercase mb-2">
          Choose a category
        </p>

        {{-- Card 1 Professional Short Courses --}}
        <a href="#section-biosciences"
           class="group relative flex items-center gap-4 px-5 py-4 rounded-xl no-underline overflow-hidden transition-all duration-250 hover:-translate-y-px"
           style="background: rgba(0,160,198,0.1); border: 1px solid rgba(0,160,198,0.25);"
           onmouseover="this.style.background='rgba(0,160,198,0.2)'; this.style.borderColor='rgba(0,160,198,0.5)'; this.style.boxShadow='0 16px 40px rgba(0,160,198,0.15)'"
           onmouseout="this.style.background='rgba(0,160,198,0.1)'; this.style.borderColor='rgba(0,160,198,0.25)'; this.style.boxShadow='none'">

          {{-- Left accent bar --}}
          <div class="absolute left-0 top-0 bottom-0 w-[3px] rounded-l-xl" style="background: #00A0C6;"></div>

          {{-- Icon --}}
          <div class="flex-shrink-0 w-11 h-11 rounded-lg flex items-center justify-center"
               style="background: rgba(0,160,198,0.18); border: 1px solid rgba(0,160,198,0.3);">
            <svg class="w-5 h-5" style="color:#00A0C6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13
                       C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477
                       14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477
                       18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>

          {{-- Content --}}
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-0.5">
              <span class="text-white font-bold text-[14.5px]">Professional Short Courses</span>
              <span class="text-[7.5px] tracking-[0.15em] uppercase px-2 py-0.5 rounded-full flex-shrink-0"
                    style="color:#00A0C6; background:rgba(0,160,198,0.15); border:1px solid rgba(0,160,198,0.3);">Online</span>
            </div>
            <p class="text-white/45 text-[12px] leading-snug">
              CPD-credited · 4 business pillars · 20 courses · Self-paced
            </p>
          </div>

          {{-- Arrow --}}
          <svg class="w-4 h-4 flex-shrink-0 transition-all duration-200 group-hover:translate-x-0.5"
               style="color:rgba(0,160,198,0.5);"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>

        {{-- Card 2 Certificates & Diplomas --}}
        <a href="#section-certificates"
           class="group relative flex items-center gap-4 px-5 py-4 rounded-xl no-underline overflow-hidden transition-all duration-250 hover:-translate-y-px"
           style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
           onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.22)'; this.style.boxShadow='0 16px 40px rgba(0,0,0,0.18)'"
           onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none'">

          <div class="absolute left-0 top-0 bottom-0 w-[3px] rounded-l-xl" style="background: rgba(255,255,255,0.2);"></div>

          <div class="flex-shrink-0 w-11 h-11 rounded-lg flex items-center justify-center"
               style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);">
            <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0
                       3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946
                       3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138
                       3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806
                       3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438
                       3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
          </div>

          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-0.5">
              <span class="text-white font-bold text-[14.5px]">Certificates &amp; Diplomas</span>
              <span class="text-[7.5px] tracking-[0.15em] uppercase px-2 py-0.5 rounded-full flex-shrink-0"
                    style="color:rgba(255,255,255,0.5); background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.13);">Online</span>
            </div>
            <p class="text-white/45 text-[12px] leading-snug">
              Health · Information Sciences · Business · Humanities &amp; Social Sciences
            </p>
          </div>

          <svg class="w-4 h-4 flex-shrink-0 transition-all duration-200 group-hover:translate-x-0.5"
               style="color:rgba(255,255,255,0.25);"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>

        {{-- Card 3 Webinars --}}
        <a href="#section-webinars"
           class="group relative flex items-center gap-4 px-5 py-4 rounded-xl no-underline overflow-hidden transition-all duration-250 hover:-translate-y-px"
           style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);"
           onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.22)'; this.style.boxShadow='0 16px 40px rgba(0,0,0,0.18)'"
           onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none'">

          <div class="absolute left-0 top-0 bottom-0 w-[3px] rounded-l-xl" style="background: rgba(255,255,255,0.2);"></div>

          <div class="flex-shrink-0 w-11 h-11 rounded-lg flex items-center justify-center"
               style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);">
            <svg class="w-5 h-5 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M15 10l4.553-2.069A1 1 0 0121 8.845v6.31a1 1 0 01-1.447.894L15 14
                       M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
            </svg>
          </div>

          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-0.5">
              <span class="text-white font-bold text-[14.5px]">Webinars</span>
              <span class="text-[7.5px] tracking-[0.15em] uppercase px-2 py-0.5 rounded-full flex-shrink-0"
                    style="color:rgba(255,255,255,0.5); background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.13);">On-demand</span>
            </div>
            <p class="text-white/45 text-[12px] leading-snug">
              Pre-recorded expert sessions · Watch anytime · No schedule required
            </p>
          </div>

          <svg class="w-4 h-4 flex-shrink-0 transition-all duration-200 group-hover:translate-x-0.5"
               style="color:rgba(255,255,255,0.25);"
               fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>

        {{-- Trust row --}}
        <div class="flex items-center gap-6 pt-4 mt-1" style="border-top: 1px solid rgba(255,255,255,0.07);">
          @foreach([
            ['M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'CPD Credited'],
            ['M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064', '6 Countries'],
            ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'Self-paced'],
          ] as [$path, $label])
          <div class="flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 text-[#00A0C6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
            </svg>
            <span class="text-[9px] tracking-[0.12em] text-white uppercase">{{ $label }}</span>
          </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</header>

{{-- ── INTRO + STATS ── --}}
<section class="relative z-[5] bg-white px-6 lg:px-20 py-12 border-b-2 border-black/10 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
  <div>
    <p class="text-md md:text-lg text-gray-900 leading-relaxed">
      Genyra Group's training programmes are designed for working professionals seeking to deepen expertise, earn recognised competencies, or stay current in rapidly evolving fields. Our short courses are practical, evidence-based, and tightly aligned with industry standards and regulatory frameworks delivered by seasoned practitioners across our four business pillars.
    </p>
  </div>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
    @foreach([['20','Courses'],['4','Pillars'],['CPD','Credited'],['∞','Impact']] as [$n,$l])
    <div class="text-center px-3 py-5 border border-black/15 rounded-lg">
      <span class="font-cormorant text-[2.375rem] text-[#1a1510] leading-none block">{{ $n }}</span>
      <span class="text-[9px] tracking-[0.2em] text-[#6b5f52] uppercase block mt-1.5">{{ $l }}</span>
    </div>
    @endforeach
  </div>
</section>

{{-- ── FILTER ── --}}
<div class="relative z-[5] bg-[#f0ede8] px-6 lg:px-20 py-5 border-b border-black/10 flex items-center gap-3 flex-wrap">
  <span class="text-[9px] tracking-[0.3em] text-[#6b5f52] uppercase mr-2 whitespace-nowrap">Filter by pillar</span>
  <button class="filter-btn active" data-filter="all">All Courses</button>
  <button class="filter-btn" data-filter="biosciences">BioSciences</button>
  <button class="filter-btn" data-filter="medtech">MedTech</button>
  <button class="filter-btn" data-filter="health-systems">Health Systems</button>
  <button class="filter-btn" data-filter="metrology">Metrology &amp; Calibration</button>
</div>

{{-- ── CATALOGUE ── --}}
<main class="relative z-[5] bg-[#f7f5f1] px-6 lg:px-20 py-16 pb-24">

  @php
  /* Shared SVG icons per pillar */
  $icons = [
    'bio' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M9.5 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm3 0a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zM9.5 4a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zm0 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zm0 2a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zM2 2a2 2 0 0 1 2-2h4.586A2 2 0 0 1 10 .586L13.414 4A2 2 0 0 1 14 5.414V16H2V2zm7-.5V4h2.5L9 1.5z"/></svg>',
    'med' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>',
    'hs'  => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/></svg>',
    'met' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg>',
  ];
  $enrol_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>';
  @endphp

  {{-- ════ PILLAR 1: BIOSCIENCES ════ --}}
  <div class="pillar-section mb-16" id="section-biosciences" style="--accent-color:#00A0C6;">
    <div class="pillar-header" style="--accent-color:#00A0C6;">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">BioSciences</h2>
        <span class="text-[9.5px] tracking-[0.3em] text-[#00A0C6] uppercase block mt-1">Life Sciences · Applied Biology · Research Methods</span>
      </div>
      <span class="text-[11px] text-[#6b5f52] tracking-wider">5 courses</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

      @php $bio = [
        ['GBS-101','Fundamentals of Medical Microbiology for Health Professionals','A rigorous introduction to clinical and diagnostic microbiology covering bacteria, fungi, viruses, and parasites in the context of human health. Participants learn infection pathways, specimen handling, laboratory safety, and the interpretation of microbiological reports in clinical decision-making.','Nurses, clinical officers, medical laboratory technicians, public health officers, and healthcare workers seeking foundational microbiology literacy.',['3 Days','Beginner','Lab + Theory'],'https://academy.genyragroup.com//course/view.php?id=3'],
        ['GBS-102','Biosafety & Biosecurity in Laboratory and Field Settings','Equips participants with practical knowledge of biological risk levels, containment strategies, personal protective measures, and emergency protocols. The course draws on WHO biosafety guidelines and real-world case scenarios, preparing learners to work safely in BSL 1–3 environments.','Laboratory scientists, research assistants, environmental health officers, hospital infection control staff, and biosafety officers.',['2 Days','All Levels','Practical'],'https://academy.genyragroup.com//course/view.php?id=2'],
        ['GBS-103','Introduction to Genomics & Molecular Diagnostics','Demystifies genomic science for non-specialists and intermediate practitioners. Topics include DNA/RNA structure, PCR and qPCR techniques, next-generation sequencing concepts, and the application of molecular diagnostics in infectious disease, oncology, and rare disease screening.','Laboratory scientists, clinicians, public health specialists, and researchers with at least a basic science background interested in molecular tools.',['4 Days','Intermediate','Theory + Demo'],'https://academy.genyragroup.com//course/view.php?id=4'],
        ['GBS-104','Scientific Research Design & Data Integrity','A hands-on course covering the end-to-end research process from formulating a research question and choosing study designs, to collecting data ethically and ensuring analytical rigour. Special emphasis is placed on Good Research Practice (GRP), research ethics, and documentation standards in health and life sciences.','Health researchers, postgraduate students, clinical trials staff, programme evaluators, and anyone initiating or managing scientific studies.',['5 Days','Intermediate','Workshops'],'https://academy.genyragroup.com/'],
        ['GBS-105','One Health: Linking Human, Animal & Environmental Health','A transdisciplinary course exploring the interconnected nature of human, animal, and ecosystem health. Drawing on real-world zoonotic outbreaks, antimicrobial resistance trends, and environmental surveillance, participants develop an integrated lens for understanding and responding to complex health threats.','Public health officers, veterinarians, environmental scientists, epidemiologists, and policymakers in health, agriculture, and environment sectors.',['3 Days','All Levels','Multi-Sector'],'https://academy.genyragroup.com/'],
      ]; @endphp

      @foreach($bio as [$code,$title,$desc,$who,$tags,$url])
      <div class="course-card">
        <div class="card-band" style="background:linear-gradient(135deg, #00A0C6 0%, #0077a0 100%); color:#fff;">
          {!! $icons['bio'] !!}
          <div class="code-pill" style="color:#fff; border-color:rgba(255,255,255,0.5);">{{ $code }}</div>
          <p class="text-sm md:text-md text-gray-700 font-bold" style="line-height:1.3; margin:0; color:#fff; position:relative; z-index:1; padding-right:3rem;">{{ $title }}</p>
        </div>
        <div class="card-body">
          <p class="text-sm md:text-md text-gray-700">{{ $desc }}</p>
        </div>
        <div class="card-footer">
          <div>
            <p class="who-label text-blue-500">Who should attend</p>
            <p class="who-text text-gray-700">{{ $who }}</p>
          </div>
          <div class="tags-row">
            @foreach($tags as $tag)
            <span class="tag" style="background:#e0f4fb; color:#006a85; border:1px solid #b3e8f5;">{{ $tag }}</span>
            @endforeach
          </div>
          <a href="{{ $url }}" target="_blank" class="enrol-btn"
             style="background:linear-gradient(135deg,#00A0C6,#0077a0); color:#fff; box-shadow:0 3px 12px rgba(0,160,198,0.35);">
            {!! $enrol_svg !!} Enrol on genyra Institute
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  {{-- ════ PILLAR 2: MEDTECH ════ --}}
  <div class="pillar-section mb-16" id="section-medtech" style="--accent-color:#1E3A6E;">
    <div class="pillar-header" style="--accent-color:#1E3A6E;">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">MedTech Solutions</h2>
        <span class="text-[9.5px] tracking-[0.3em] text-[#1E3A6E] uppercase block mt-1">Medical Technology · Device Management · Clinical Engineering</span>
      </div>
      <span class="text-[11px] text-[#6b5f52] tracking-wider">5 courses</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

      @php $med = [
        ['GMT-101','Healthcare Technology Management Essentials','An essential primer for anyone responsible for managing medical equipment in health facilities. Covers the full equipment lifecycle from needs assessment and procurement through to acceptance testing, preventive maintenance planning, and decommissioning with practical tools and checklists.','Biomedical engineers, hospital administrators, health facility managers, procurement officers, and clinical engineers at all career levels.',['4 Days','Foundational','Practical Tools'],'https://academy.genyragroup.com//course/view.php?id=5'],
        ['GMT-102','Medical Device Regulation & Market Authorisation','Navigates the complex landscape of medical device regulatory frameworks covering national regulatory pathways, CE marking, WHO prequalification, post-market surveillance obligations, and adverse event reporting. Participants gain the knowledge to achieve and maintain market authorisation for medical devices.','Regulatory affairs professionals, device manufacturers, procurement specialists, quality assurance staff, and health technology assessors.',['3 Days','Intermediate','Regulatory'],'https://academy.genyragroup.com/'],
        ['GMT-103','Health Technology Assessment (HTA): Evidence-Based Procurement','Introduces participants to HTA methodologies used to inform purchasing decisions for medical technologies. The course covers cost-effectiveness analysis, clinical evidence evaluation, burden of disease considerations, and stakeholder analysis empowering procurement teams to invest wisely in medical technology.','Hospital procurement teams, health economists, clinical engineers, health ministry officials, and insurance/reimbursement professionals.',['3 Days','Intermediate','Decision-Making'],'https://academy.genyragroup.com/'],
        ['GMT-104','Digital Health & Emerging Medical Technologies','A forward-looking survey of transformative technologies reshaping healthcare delivery from AI-assisted diagnostics and electronic health records to telehealth platforms, wearables, and point-of-care technologies. Participants explore both the promise and governance challenges of digital health in resource-variable settings.','Clinicians, health informaticians, hospital managers, policymakers, and technology enthusiasts in health and life sciences.',['2 Days','All Levels','Strategic'],'https://academy.genyragroup.com/'],
        ['GMT-105','Electro-Medical Equipment Safety & User Competency','Focused on the safe and effective use of electrical medical equipment in clinical environments. Covers electrical safety standards, user responsibilities, operator-level maintenance, alarm management, and incident reporting. Includes hands-on familiarisation with common clinical equipment types.','Nurses, clinical officers, ICU/theatre technicians, ward managers, and any clinical staff who regularly operate electromedical equipment.',['2 Days','Practical','Patient Safety'],'https://academy.genyragroup.com/'],
      ]; @endphp

      @foreach($med as [$code,$title,$desc,$who,$tags,$url])
      <div class="course-card">
        <div class="card-band" style="background:linear-gradient(135deg, #1E3A6E 0%, #152a52 100%); color:#fff;">
          {!! $icons['med'] !!}
          <div class="code-pill" style="color:#fff; border-color:rgba(255,255,255,0.5);">{{ $code }}</div>
          <p style="font-size:0.85rem; font-weight:700; line-height:1.3; margin:0; color:#fff; position:relative; z-index:1; padding-right:3rem;">{{ $title }}</p>
        </div>
        <div class="card-body">
          <p class="text-sm md:text-md text-gray-700">{{ $desc }}</p>
        </div>
        <div class="card-footer">
          <div>
            <p class="who-label text-blue-500">Who should attend</p>
            <p class="who-text text-gray-700">{{ $who }}</p>
          </div>
          <div class="tags-row">
            @foreach($tags as $tag)
            <span class="tag" style="background:#eef0f8; color:#1E3A6E; border:1px solid #c8d0e8;">{{ $tag }}</span>
            @endforeach
          </div>
          <a href="{{ $url }}" target="_blank" class="enrol-btn"
             style="background:linear-gradient(135deg,#1E3A6E,#152a52); color:#fff; box-shadow:0 3px 12px rgba(30,58,110,0.3);">
            {!! $enrol_svg !!} Enrol on genyra Institute
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  {{-- ════ PILLAR 3: HEALTH SYSTEMS ════ --}}
  <div class="pillar-section mb-16" id="section-health-systems" style="--accent-color:#0077B6;">
    <div class="pillar-header" style="--accent-color:#0077B6;">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">Health Systems Planning &amp; Advisory</h2>
        <span class="text-[9.5px] tracking-[0.3em] text-[#0077B6] uppercase block mt-1">Strategic Planning · Quality Management · Governance</span>
      </div>
      <span class="text-[11px] text-[#6b5f52] tracking-wider">5 courses</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

      @php $hs = [
        ['GHS-101','Strategic Planning for Health Institutions','Equips health leaders with the tools to develop, implement, and monitor strategic plans for hospitals, health programmes, and government health units. The course covers situational analysis, stakeholder mapping, theory of change, balanced scorecards, and results-based frameworks with real-plan case studies throughout.','Senior health managers, medical superintendents, department heads, public health directors, NGO programme leads, and county/district health officers.',['5 Days','Leadership','Facilitated'],'https://academy.genyragroup.com/'],
        ['GHS-102','Quality Management Systems (QMS) Design & Implementation','A comprehensive course on building, deploying, and sustaining a QMS in health and laboratory settings. Grounded in ISO 9001 and ISO 15189 principles, the course walks participants through process documentation, risk-based thinking, internal auditing, corrective action management, and management review processes.','Quality managers, laboratory managers, hospital quality teams, health facility administrators, and compliance officers.',['5 Days','ISO-Aligned','Intermediate'],'https://academy.genyragroup.com/'],
        ['GHS-103','Internal Audit Skills for Health & Laboratory Settings','Develops practical internal audit competencies in participants from audit planning and checklist development to conducting interviews, writing non-conformity reports, and following up on corrective actions. Taught within a health and laboratory quality systems context, fully aligned with ISO audit requirements.','Quality officers, laboratory supervisors, compliance managers, and staff designated as internal auditors in health or laboratory facilities.',['3 Days','Practical','ISO 19011'],'https://academy.genyragroup.com/'],
        ['GHS-104','Patient Safety & Clinical Risk Management','Focuses on building a culture of safety in health facilities. Covers root cause analysis of adverse events, near-miss reporting systems, failure mode and effects analysis (FMEA), and the design of safety checklists and clinical protocols. Draws on WHO Patient Safety Curriculum frameworks.','Clinical officers, nurses, hospital quality teams, risk managers, patient safety champions, and clinical governance staff.',['3 Days','WHO-Aligned','All Clinicals'],'https://academy.genyragroup.com/'],
        ['GHS-105','Health Systems Strengthening: Frameworks & Practice','An applied course on diagnosing and improving the six WHO health system building blocks: service delivery, health workforce, information, medical products, financing, and leadership/governance. Participants develop evidence-based recommendations for real or simulated health system challenges.','Public health practitioners, health ministry officials, development partners, NGO health programme staff, and health system researchers.',['4 Days','WHO Framework','Applied'],'https://academy.genyragroup.com/'],
      ]; @endphp

      @foreach($hs as [$code,$title,$desc,$who,$tags,$url])
      <div class="course-card">
        <div class="card-band" style="background:linear-gradient(135deg, #0077B6 0%, #005a8a 100%); color:#fff;">
          {!! $icons['hs'] !!}
          <div class="code-pill" style="color:#fff; border-color:rgba(255,255,255,0.5);">{{ $code }}</div>
          <p style="font-size:0.85rem; font-weight:700; line-height:1.3; margin:0; color:#fff; position:relative; z-index:1; padding-right:3rem;">{{ $title }}</p>
        </div>
        <div class="card-body">
          <p class="text-sm md:text-md text-gray-700">{{ $desc }}</p>
        </div>
        <div class="card-footer">
          <div>
            <p class="who-label text-blue-500">Who should attend</p>
            <p class="who-text text-gray-700">{{ $who }}</p>
          </div>
          <div class="tags-row">
            @foreach($tags as $tag)
            <span class="tag" style="background:#e8f4fc; color:#005a8a; border:1px solid #b3d8ef;">{{ $tag }}</span>
            @endforeach
          </div>
          <a href="{{ $url }}" target="_blank" class="enrol-btn"
             style="background:linear-gradient(135deg,#0077B6,#005a8a); color:#fff; box-shadow:0 3px 12px rgba(0,119,182,0.3);">
            {!! $enrol_svg !!} Enrol on genyra Institute
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  {{-- ════ PILLAR 4: METROLOGY ════ --}}
  <div class="pillar-section mb-16" id="section-metrology" style="--accent-color:#008BA3;">
    <div class="pillar-header" style="--accent-color:#008BA3;">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">Metrology &amp; Calibration Services</h2>
        <span class="text-[9.5px] tracking-[0.3em] text-[#008BA3] uppercase block mt-1">Precision Measurement · Instrument Assurance · Standards Compliance</span>
      </div>
      <span class="text-[11px] text-[#6b5f52] tracking-wider">5 courses</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

      @php $met = [
        ['GMC-101','Fundamentals of Metrology & Measurement Science','Introduces the science of measurement covering measurement units (SI system), measurement uncertainty, traceability, accuracy vs. precision, and the principles underpinning reliable metrology. Participants gain a conceptual and practical foundation applicable to clinical, laboratory, and industrial measurement contexts.','Laboratory technicians, clinical engineers, quality officers, biomedical staff, and technicians encountering measurement and calibration tasks in their roles.',['2 Days','Foundational','Theory + Practice'],'https://academy.genyragroup.com/'],
        ['GMC-102','Medical Instrument Calibration: Principles & Practice','A practical course on calibrating the most common medical instruments including thermometers, sphygmomanometers, weighing scales, infusion pumps, and patient monitors. Covers calibration procedures, reference standards, tolerance limits, and documentation requirements in line with ISO 17025 and regulatory norms.','Biomedical engineers, clinical engineers, technical staff in medical device departments, and quality assurance personnel in healthcare facilities.',['4 Days','Hands-On','ISO 17025'],'https://academy.genyragroup.com/'],
        ['GMC-103','Laboratory Instrument Verification & Performance Qualification','Covers Installation Qualification (IQ), Operational Qualification (OQ), and Performance Qualification (PQ) protocols for laboratory instruments including balances, pipettes, centrifuges, incubators, and spectrophotometers. Participants develop and execute validation plans and prepare compliant documentation packages.','Laboratory scientists, quality managers in pharmaceutical or clinical labs, regulatory compliance staff, and validation engineers.',['3 Days','Intermediate','IQ/OQ/PQ'],'https://academy.genyragroup.com/'],
        ['GMC-104','Measurement Uncertainty Estimation & Reporting','Provides a thorough grounding in the GUM (Guide to the Expression of Uncertainty in Measurement) framework. Participants learn to identify uncertainty sources, construct uncertainty budgets, and correctly report expanded uncertainty in calibration certificates and test reports a critical skill for ISO 17025 compliance.','Calibration laboratory staff, metrologists, quality assurance professionals, and technical managers preparing for ISO 17025 accreditation.',['3 Days','GUM Framework','Advanced'],'https://academy.genyragroup.com/'],
        ['GMC-105','ISO 17025 Compliance: Establishing & Sustaining a Calibration Lab','A comprehensive course preparing calibration and testing laboratories for ISO/IEC 17025 accreditation. Covers the standard\'s management and technical requirements, document control, method validation, proficiency testing, and readiness for external assessment. Includes gap analysis tools and a sample QMS document suite.','Laboratory managers, technical managers, quality managers, and staff of calibration, testing, or measurement laboratories pursuing or maintaining ISO 17025 accreditation.',['5 Days','ISO 17025','Accreditation'],'https://academy.genyragroup.com/'],
      ]; @endphp

      @foreach($met as [$code,$title,$desc,$who,$tags,$url])
      <div class="course-card">
        <div class="card-band" style="background:linear-gradient(135deg, #008BA3 0%, #00687c 100%); color:#fff;">
          {!! $icons['met'] !!}
          <div class="code-pill" style="color:#fff; border-color:rgba(255,255,255,0.5);">{{ $code }}</div>
          <p style="font-size:0.85rem; font-weight:700; line-height:1.3; margin:0; color:#fff; position:relative; z-index:1; padding-right:3rem;">{{ $title }}</p>
        </div>
        <div class="card-body">
          <p class="text-sm md:text-md text-gray-700">{{ $desc }}</p>
        </div>
        <div class="card-footer">
          <div>
            <p class="who-label text-blue-500">Who should attend</p>
            <p class="who-text text-gray-700">{{ $who }}</p>
          </div>
          <div class="tags-row">
            @foreach($tags as $tag)
            <span class="tag" style="background:#e5f6f9; color:#00687c; border:1px solid #aadfea;">{{ $tag }}</span>
            @endforeach
          </div>
          <a href="{{ $url }}" target="_blank" class="enrol-btn"
             style="background:linear-gradient(135deg,#008BA3,#00687c); color:#fff; box-shadow:0 3px 12px rgba(0,139,163,0.3);">
            {!! $enrol_svg !!} Enrol on genyra Institute
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</main>

{{-- ── CTA ── --}}
<section class="relative z-[5] bg-[#1E3A6E] px-6 lg:px-20 py-16 grid grid-cols-1 lg:grid-cols-[1fr_auto] items-center gap-12">
  <div>
    <h2 class="font-cormorant text-5xl lg:text-6xl font-bold text-[#f0ece4] leading-tight mb-4">
      Ready to Build<br><em class="italic text-[#00A0C6]">Expert Capacity</em>?
    </h2>
    <p class="text-[14.5px] leading-[1.8] text-white/70 max-w-[520px] mb-7">
      All Genyra short courses can be delivered in-person, on-site at your organisation, or in a blended format. We also offer customised training programmes tailored to your specific institutional needs, regulatory context, and workforce profile. Contact us to discuss scheduling, group enrolment, and CPD certification options.
    </p>
    <a href="https://academy.genyragroup.com/" target="_blank"
       style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.75rem 1.75rem; background:#00A0C6; color:#fff; border-radius:6px; font-size:0.85rem; font-weight:600; text-decoration:none; letter-spacing:0.04em; transition:all 0.15s; box-shadow:0 4px 15px rgba(0,160,198,0.4);"
       onmouseover="this.style.background='#0090b5'; this.style.transform='translateY(-1px)'" onmouseout="this.style.background='#00A0C6'; this.style.transform='none'">
      <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>
      Browse All Courses on genyra Institute
    </a>
  </div>
  <div class="flex flex-col gap-4 min-w-[220px]">
    <div class="px-6 py-4 border border-white/10 rounded-lg bg-white/4">
      <strong class="block text-sm text-[#f0ece4] font-semibold mb-1 tracking-wide">In-Person & On-Site</strong>
      <span class="text-[11px] text-white/45 tracking-wide">Nairobi · Available nationwide</span>
    </div>
    <div class="px-6 py-4 border border-white/10 rounded-lg bg-white/4">
      <strong class="block text-sm text-[#f0ece4] font-semibold mb-1 tracking-wide">Group & Institutional Bookings</strong>
      <span class="text-[11px] text-white/45 tracking-wide">Custom programmes available</span>
    </div>
    <div class="px-6 py-4 border border-white/10 rounded-lg bg-white/4">
      <strong class="block text-sm text-[#f0ece4] font-semibold mb-1 tracking-wide">CPD-Credited</strong>
      <span class="text-[11px] text-white/45 tracking-wide">Certificates of completion issued</span>
    </div>
    <div class="px-6 py-4 border border-[#00A0C6]/40 rounded-lg" style="background:rgba(0,160,198,0.08);">
      <strong class="block text-sm text-[#00A0C6] font-semibold mb-1 tracking-wide">training@genyragroup.com</strong>
      <span class="text-[11px] text-white/60 tracking-wide">Enquire about any course</span>
    </div>
  </div>
</section>

<script>
  const buttons  = document.querySelectorAll('.filter-btn');
  const sections = document.querySelectorAll('.pillar-section');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const f = btn.dataset.filter;
      sections.forEach(s => {
        (f === 'all' || s.id.includes(f)) ? s.classList.remove('hidden') : s.classList.add('hidden');
      });
    });
  });
</script>

@endsection