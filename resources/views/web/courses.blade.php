@extends('web.app')

@section('title', 'Professional Training Programmes - genyra Institute')
@section('meta_description', 'Professional healthcare training programmes from genyra Institute covering laboratory sciences, MedTech, health systems, and ISO 17025 calibration.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'genyra Institute', 'url' => route('courses')],
    ],
])
@endpush

@section('body')

<div class="font-['DM_Sans',sans-serif]">

@php
  // Hero photo: students working in a science lab (Pexels, free licence).
  // To use your own, e.g. asset('images/hero-lab-students.jpg')
  $heroImage = 'https://images.pexels.com/photos/6208728/pexels-photo-6208728.jpeg?auto=compress&cs=tinysrgb&w=1920';

  // Hanging 3D announcement bag (set 'enabled' => false to hide it)
  $announcement = [
    'enabled' => true,
    'label'   => 'Announcement',
    'title'   => 'Enrolment is open',
    'text'    => 'Start any of our 20 CPD-credited short courses today and learn at your own pace.',
    'cta'     => 'Enrol now',
    'url'     => 'https://academy.genyragroup.com/',
    'footer'  => 'CPD credited · Self-paced',
  ];
@endphp

{{-- ══════════════ HERO ══════════════ --}}
<header class="relative mt-28 overflow-hidden bg-[#0a1a3a] min-h-[560px] lg:min-h-[640px] flex items-center">

  {{-- Photo (right side on desktop, full-bleed behind text on mobile) --}}
  <div class="absolute inset-y-0 right-0 w-full lg:w-[64%]">
    <img src="{{ $heroImage }}"
         alt="Students conducting experiments in a science laboratory"
         class="h-full w-full object-cover object-center"
         fetchpriority="high">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0a1a3a] via-[#0a1a3a]/55 to-transparent hidden lg:block"></div>
    <div class="absolute inset-0 bg-[#0a1a3a]/80 lg:bg-transparent"></div>
    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#0a1a3a]/70 to-transparent"></div>
  </div>

  {{-- ── Hanging 3D announcement bag (desktop only) ── --}}
  @if($announcement['enabled'])
  <aside aria-label="Announcement" data-announcement
         class="absolute right-6 top-3 z-20 hidden w-[224px] lg:right-24 lg:block"
         style="perspective: 1000px; perspective-origin: 50% 20%;">

    {{-- Hook / pin the bag hangs from --}}
    <span class="absolute left-1/2 top-0 z-30 flex h-4 w-4 -translate-x-1/2 -translate-y-1/2 items-start justify-start rounded-full bg-gradient-to-br from-slate-200 to-slate-500 shadow-[0_3px_6px_rgba(0,0,0,0.45)] ring-1 ring-black/30">
      <span class="ml-[3px] mt-[3px] h-1.5 w-1.5 rounded-full bg-white/70"></span>
    </span>

    {{-- Swinging assembly: pivots from the hook --}}
    <div data-swing class="relative origin-top pt-[84px]" style="transform-style: preserve-3d;">

      {{-- The bag is a real box: front, back and a right gusset --}}
      <div class="relative" style="transform-style: preserve-3d; transform: rotateY(-24deg) rotateX(2deg);">

        {{-- Back rope handle (behind the bag) --}}
        <span class="absolute -top-[80px] left-[26%] h-[80px] w-[48%] rounded-t-full border-[3px] border-b-0 border-amber-300/70"
              style="transform: translateZ(-28px);"></span>

        {{-- Back face --}}
        <div class="absolute inset-0 rounded-b-xl bg-[#005f80]" style="transform: translateZ(-28px);"></div>

        {{-- Right gusset (side panel) with centre fold --}}
        <div class="absolute inset-y-0 -right-[28px] w-[56px] overflow-hidden rounded-b-lg"
             style="transform: rotateY(90deg); background:
               linear-gradient(90deg, rgba(0,0,0,.28) 0%, rgba(0,0,0,.05) 46%, rgba(0,0,0,.38) 50%, rgba(0,0,0,.08) 54%, rgba(0,0,0,.3) 100%),
               #006d8f;">
          <div class="h-6 bg-black/25"></div>
        </div>

        {{-- Front face --}}
        <div class="relative overflow-hidden rounded-b-xl rounded-t-sm bg-gradient-to-b from-[#00A0C6] to-[#0077a0] ring-1 ring-black/10"
             style="transform: translateZ(28px);">

          {{-- Folded top lip with eyelets --}}
          <div class="relative h-6 bg-black/15 shadow-[inset_0_-2px_3px_rgba(0,0,0,0.18)]">
            <span class="absolute left-[26%] top-[6px] h-3 w-3 -translate-x-1/2 rounded-full bg-[#0a1a3a] ring-2 ring-slate-300"></span>
            <span class="absolute left-[74%] top-[6px] h-3 w-3 -translate-x-1/2 rounded-full bg-[#0a1a3a] ring-2 ring-slate-300"></span>
          </div>

          {{-- Paper shading + diagonal sheen --}}
          <span class="pointer-events-none absolute inset-y-6 right-0 w-5 bg-gradient-to-l from-black/25 to-transparent"></span>
          <span class="pointer-events-none absolute inset-y-6 left-0 w-3 bg-gradient-to-r from-white/15 to-transparent"></span>
          <span class="pointer-events-none absolute inset-0 bg-gradient-to-br from-white/15 via-transparent to-black/10"></span>

          {{-- Printed content --}}
          <div class="relative px-5 pb-5 pt-4 text-white">

            <div class="flex items-center justify-between gap-2">
              <span class="inline-flex items-center gap-1.5 rounded-full bg-white/15 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.16em]">
                <span class="relative flex h-1.5 w-1.5">
                  <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white opacity-70"></span>
                  <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-white"></span>
                </span>
                {{ $announcement['label'] }}
              </span>

              <button type="button" data-announcement-close aria-label="Dismiss announcement"
                      class="flex h-6 w-6 items-center justify-center rounded-full text-white/70 transition hover:bg-white/20 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
              </button>
            </div>

            <h3 class="mt-3 text-[17px] font-semibold leading-snug">{{ $announcement['title'] }}</h3>
            <p class="mt-1.5 text-[12.5px] leading-relaxed text-white/85">{{ $announcement['text'] }}</p>

            <a href="{{ $announcement['url'] }}" target="_blank" rel="noopener"
               class="group mt-4 flex w-full items-center justify-center gap-1.5 rounded-full bg-white px-4 py-2.5 text-[12.5px] font-semibold text-[#1E3A6E] transition-colors hover:bg-[#f0ece4] focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#0088ad]">
              {{ $announcement['cta'] }}
              <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
              </svg>
            </a>

            <p class="mt-3 border-t border-white/20 pt-3 text-center text-[10.5px] tracking-wide text-white/75">
              genyra Institute · {{ $announcement['footer'] }}
            </p>
          </div>
        </div>

        {{-- Front rope handle (in front of the bag, ties into the eyelets) --}}
        <span class="pointer-events-none absolute -top-[80px] left-[26%] h-[86px] w-[48%] rounded-t-full border-[3px] border-b-0 border-amber-200"
              style="transform: translateZ(28px);"></span>
      </div>

      {{-- Soft contact shadow under the bag --}}
      <span class="pointer-events-none absolute -bottom-6 left-1/2 -z-10 h-5 w-40 -translate-x-1/2 rounded-full bg-black/45 blur-xl"></span>
    </div>
  </aside>
  @endif

  {{-- Soft brand glow --}}
  <div class="pointer-events-none absolute -left-24 top-1/3 h-[420px] w-[420px] rounded-full bg-[#00A0C6]/10 blur-[110px]"></div>

  {{-- Content --}}
  <div class="relative z-10 w-full px-6 lg:px-20 pt-16 pb-36 lg:pb-40">
    <div class="max-w-[560px]">

      <h1 class="text-[2.5rem] sm:text-5xl lg:text-[3.5rem] font-semibold leading-[1.08] tracking-tight text-white">
        Learn from
        <span class="text-[#00A0C6]">Africa's</span>
        leading healthcare experts
      </h1>

      <p class="mt-6 max-w-[470px] text-[15px] leading-relaxed text-white/75">
        Practical, CPD-credited programmes built for working health professionals,
        delivered entirely online and at your own pace.
      </p>

      <div class="mt-9 flex flex-wrap items-center gap-4">
        <a href="#section-biosciences"
           class="group inline-flex items-center gap-2 rounded-full bg-[#00A0C6] px-6 py-3 text-sm font-medium text-white transition-colors hover:bg-[#0092b5] focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#0a1a3a]">
          Explore courses
          <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
          </svg>
        </a>

        <a href="https://academy.genyragroup.com/" target="_blank" rel="noopener"
           class="group inline-flex items-center gap-3 rounded-full py-1.5 pl-1.5 pr-4 text-sm font-medium text-white transition hover:bg-white/5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white">
          <span class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#1E3A6E] shadow-lg transition group-hover:scale-105">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
          </span>
          <span class="leading-tight text-left">
            Visit the platform
            <span class="block text-[11px] font-normal text-white/55">academy.genyragroup.com</span>
          </span>
        </a>
      </div>

      <ul class="mt-10 flex flex-wrap gap-x-7 gap-y-3 border-t border-white/10 pt-6 text-[12.5px] text-white/80">
        @foreach([
          ['M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z', 'CPD credited'],
          ['M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z', 'Self-paced'],
          ['M3.055 11H5a2 2 0 0 1 2 2v1a2 2 0 0 0 2 2 2 2 0 0 1 2 2v2.945M8 3.935V5.5A2.5 2.5 0 0 0 10.5 8h.5a2 2 0 0 1 2 2 2 2 0 1 0 4 0 2 2 0 0 1 2-2h1.064M15 20.488V18a2 2 0 0 1 2-2h3.064', 'Learners in 6 countries'],
        ] as [$path, $label])
        <li class="flex items-center gap-2">
          <svg class="h-4 w-4 text-[#00A0C6]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
          </svg>
          {{ $label }}
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</header>

{{-- ── CATEGORY PANELS (overlap the bottom edge of the hero) ── --}}
<div class="relative z-[6] -mt-24 px-6 lg:px-20 pb-12">
  {{-- Light backdrop that starts below the overlap --}}
  <div class="absolute inset-x-0 bottom-0 top-24 -z-10 bg-[#f3f7fd]"></div>
  <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-5 md:grid-cols-3">

    @foreach([
      [
        '#section-biosciences', '_self', 'Professional Short Courses', 'Online',
        'CPD-credited · 4 business pillars · 20 courses · Self-paced',
        'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
      ],
      [
        'https://academy.genyragroup.com/', '_blank', 'Certificates & Diplomas', 'Online',
        'Health · Information Sciences · Business · Humanities & Social Sciences',
        'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 0 0 1.946-.806 3.42 3.42 0 0 1 4.438 0 3.42 3.42 0 0 0 1.946.806 3.42 3.42 0 0 1 3.138 3.138 3.42 3.42 0 0 0 .806 1.946 3.42 3.42 0 0 1 0 4.438 3.42 3.42 0 0 0-.806 1.946 3.42 3.42 0 0 1-3.138 3.138 3.42 3.42 0 0 0-1.946.806 3.42 3.42 0 0 1-4.438 0 3.42 3.42 0 0 0-1.946-.806 3.42 3.42 0 0 1-3.138-3.138 3.42 3.42 0 0 0-.806-1.946 3.42 3.42 0 0 1 0-4.438 3.42 3.42 0 0 0 .806-1.946 3.42 3.42 0 0 1 3.138-3.138z',
      ],
      [
        'https://academy.genyragroup.com/', '_blank', 'Webinars', 'On-demand',
        'Pre-recorded expert sessions · Watch anytime · No schedule required',
        'M15 10l4.553-2.069A1 1 0 0 1 21 8.845v6.31a1 1 0 0 1-1.447.894L15 14M5 18h8a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z',
      ],
    ] as [$href, $target, $name, $badge, $meta, $icon])
    <a href="{{ $href }}" target="{{ $target }}" @if($target === '_blank') rel="noopener" @endif
       class="group flex h-full flex-col overflow-hidden rounded-2xl shadow-[0_30px_60px_-20px_rgba(10,26,58,0.45)] ring-1 ring-black/5 transition-transform duration-200 hover:-translate-y-0.5 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#00A0C6]">

      {{-- Row 1: cyan band --}}
      <div class="flex items-center gap-3 bg-[#00A0C6] px-5 py-4 text-white">
        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
        </svg>
        <span class="text-[15px] font-semibold">{{ $name }}</span>
        <span class="ml-auto shrink-0 rounded-full bg-white/20 px-2.5 py-0.5 text-[10px] font-medium tracking-wide uppercase">{{ $badge }}</span>
      </div>

      {{-- Row 2: navy band --}}
      <div class="flex flex-1 items-center justify-between gap-5 bg-[#1E3A6E] px-5 py-5 text-white transition-colors group-hover:bg-[#1a3566]">
        <span class="text-[13px] leading-snug text-white/90">{{ $meta }}</span>
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#00A0C6] transition-transform group-hover:translate-x-1">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6"/>
          </svg>
        </span>
      </div>
    </a>
    @endforeach

  </div>
</div>
{{-- ══════════════ END HERO ══════════════ --}}

{{-- ── FILTER ── --}}
<div class="relative z-[5] flex flex-wrap items-center gap-3 border-b border-black/10 bg-[#f0ede8] px-6 py-5 lg:px-20">
  <span class="mr-2 whitespace-nowrap text-[9px] uppercase tracking-[0.3em] text-[#6b5f52]">Filter by pillar</span>
  @foreach([
    ['all', 'All Courses'],
    ['biosciences', 'BioSciences'],
    ['medtech', 'MedTech'],
    ['health-systems', 'Health Systems'],
    ['metrology', 'Metrology & Calibration'],
  ] as [$key, $label])
  <button type="button" data-filter="{{ $key }}" data-active="{{ $key === 'all' ? 'true' : 'false' }}" aria-pressed="{{ $key === 'all' ? 'true' : 'false' }}"
          class="cursor-pointer whitespace-nowrap rounded-full border-[1.5px] border-black/15 bg-transparent px-[1.1rem] py-[0.45rem] text-xs font-medium tracking-[0.02em] text-[#6b5f52] transition-colors duration-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1E3A6E] data-[active=false]:hover:border-[#1E3A6E] data-[active=false]:hover:bg-[#1E3A6E]/[0.04] data-[active=false]:hover:text-[#1E3A6E] data-[active=true]:border-[#1E3A6E] data-[active=true]:bg-[#1E3A6E] data-[active=true]:text-white">
    {{ $label }}
  </button>
  @endforeach
</div>

{{-- ── CATALOGUE ── --}}
<main class="relative z-[5] bg-[#f7f5f1] px-6 py-16 pb-24 lg:px-20">

  @php
  /* Shared SVG icons per pillar */
  $icons = [
    'bio' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M9.5 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm3 0a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zM9.5 4a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zm0 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zm0 2a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zM2 2a2 2 0 0 1 2-2h4.586A2 2 0 0 1 10 .586L13.414 4A2 2 0 0 1 14 5.414V16H2V2zm7-.5V4h2.5L9 1.5z"/></svg>',
    'med' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>',
    'hs'  => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/></svg>',
    'met' => '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg>',
  ];
  $enrol_svg = '<svg class="transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>';

  /* Pillars: theme classes are written out in full so Tailwind can detect them */
  $pillars = [

    [
      'id'       => 'biosciences',
      'title'    => 'BioSciences',
      'subtitle' => 'Life Sciences · Applied Biology · Research Methods',
      'icon'     => 'bio',
      'accent'   => 'text-[#00A0C6]',
      'line'     => 'from-[#00A0C6]',
      'band'     => 'bg-gradient-to-br from-[#00A0C6] to-[#0077a0]',
      'tag'      => 'bg-[#e0f4fb] text-[#006a85] border-[#b3e8f5]',
      'btn'      => 'bg-gradient-to-br from-[#00A0C6] to-[#0077a0] shadow-[0_3px_12px_rgba(0,160,198,0.35)]',
      'courses'  => [
        ['GBS-101','Fundamentals of Medical Microbiology for Health Professionals','A rigorous introduction to clinical and diagnostic microbiology covering bacteria, fungi, viruses, and parasites in the context of human health. Participants learn infection pathways, specimen handling, laboratory safety, and the interpretation of microbiological reports in clinical decision-making.','Nurses, clinical officers, medical laboratory technicians, public health officers, and healthcare workers seeking foundational microbiology literacy.',['8 Weeks','Beginner','Lab + Theory'],'https://academy.genyragroup.com//course/view.php?id=3'],
        ['GBS-102','Biosafety & Biosecurity in Laboratory and Field Settings','Equips participants with practical knowledge of biological risk levels, containment strategies, personal protective measures, and emergency protocols. The course draws on WHO biosafety guidelines and real-world case scenarios, preparing learners to work safely in BSL 1–3 environments.','Laboratory scientists, research assistants, environmental health officers, hospital infection control staff, and biosafety officers.',['8 Weeks','All Levels','Practical'],'https://academy.genyragroup.com//course/view.php?id=2'],
        ['GBS-103','Introduction to Genomics & Molecular Diagnostics','Demystifies genomic science for non-specialists and intermediate practitioners. Topics include DNA/RNA structure, PCR and qPCR techniques, next-generation sequencing concepts, and the application of molecular diagnostics in infectious disease, oncology, and rare disease screening.','Laboratory scientists, clinicians, public health specialists, and researchers with at least a basic science background interested in molecular tools.',['8 Weeks','Intermediate','Theory + Demo'],'https://academy.genyragroup.com//course/view.php?id=4'],
        ['GBS-104','Scientific Research Design & Data Integrity','A hands-on course covering the end-to-end research process from formulating a research question and choosing study designs, to collecting data ethically and ensuring analytical rigour. Special emphasis is placed on Good Research Practice (GRP), research ethics, and documentation standards in health and life sciences.','Health researchers, postgraduate students, clinical trials staff, programme evaluators, and anyone initiating or managing scientific studies.',['8 Weeks','Intermediate','Workshops'],'https://academy.genyragroup.com/'],
        ['GBS-105','One Health: Linking Human, Animal & Environmental Health','A transdisciplinary course exploring the interconnected nature of human, animal, and ecosystem health. Drawing on real-world zoonotic outbreaks, antimicrobial resistance trends, and environmental surveillance, participants develop an integrated lens for understanding and responding to complex health threats.','Public health officers, veterinarians, environmental scientists, epidemiologists, and policymakers in health, agriculture, and environment sectors.',['8 Weeks','All Levels','Multi-Sector'],'https://academy.genyragroup.com/'],
      ],
    ],

    [
      'id'       => 'medtech',
      'title'    => 'MedTech Solutions',
      'subtitle' => 'Medical Technology · Device Management · Clinical Engineering',
      'icon'     => 'med',
      'accent'   => 'text-[#1E3A6E]',
      'line'     => 'from-[#1E3A6E]',
      'band'     => 'bg-gradient-to-br from-[#1E3A6E] to-[#152a52]',
      'tag'      => 'bg-[#eef0f8] text-[#1E3A6E] border-[#c8d0e8]',
      'btn'      => 'bg-gradient-to-br from-[#1E3A6E] to-[#152a52] shadow-[0_3px_12px_rgba(30,58,110,0.3)]',
      'courses'  => [
        ['GMT-101','Healthcare Technology Management Essentials','An essential primer for anyone responsible for managing medical equipment in health facilities. Covers the full equipment lifecycle from needs assessment and procurement through to acceptance testing, preventive maintenance planning, and decommissioning with practical tools and checklists.','Biomedical engineers, hospital administrators, health facility managers, procurement officers, and clinical engineers at all career levels.',['8 Weeks','Foundational','Practical Tools'],'https://academy.genyragroup.com//course/view.php?id=5'],
        ['GMT-102','Medical Device Regulation & Market Authorisation','Navigates the complex landscape of medical device regulatory frameworks covering national regulatory pathways, CE marking, WHO prequalification, post-market surveillance obligations, and adverse event reporting. Participants gain the knowledge to achieve and maintain market authorisation for medical devices.','Regulatory affairs professionals, device manufacturers, procurement specialists, quality assurance staff, and health technology assessors.',['8 Weeks','Intermediate','Regulatory'],'https://academy.genyragroup.com/'],
        ['GMT-103','Health Technology Assessment (HTA): Evidence-Based Procurement','Introduces participants to HTA methodologies used to inform purchasing decisions for medical technologies. The course covers cost-effectiveness analysis, clinical evidence evaluation, burden of disease considerations, and stakeholder analysis empowering procurement teams to invest wisely in medical technology.','Hospital procurement teams, health economists, clinical engineers, health ministry officials, and insurance/reimbursement professionals.',['8 Weeks','Intermediate','Decision-Making'],'https://academy.genyragroup.com/'],
        ['GMT-104','Digital Health & Emerging Medical Technologies','A forward-looking survey of transformative technologies reshaping healthcare delivery from AI-assisted diagnostics and electronic health records to telehealth platforms, wearables, and point-of-care technologies. Participants explore both the promise and governance challenges of digital health in resource-variable settings.','Clinicians, health informaticians, hospital managers, policymakers, and technology enthusiasts in health and life sciences.',['8 Weeks','All Levels','Strategic'],'https://academy.genyragroup.com/'],
        ['GMT-105','Electro-Medical Equipment Safety & User Competency','Focused on the safe and effective use of electrical medical equipment in clinical environments. Covers electrical safety standards, user responsibilities, operator-level maintenance, alarm management, and incident reporting. Includes hands-on familiarisation with common clinical equipment types.','Nurses, clinical officers, ICU/theatre technicians, ward managers, and any clinical staff who regularly operate electromedical equipment.',['8 Weeks','Practical','Patient Safety'],'https://academy.genyragroup.com/'],
      ],
    ],

    [
      'id'       => 'health-systems',
      'title'    => 'Health Systems Planning & Advisory',
      'subtitle' => 'Strategic Planning · Quality Management · Governance',
      'icon'     => 'hs',
      'accent'   => 'text-[#0077B6]',
      'line'     => 'from-[#0077B6]',
      'band'     => 'bg-gradient-to-br from-[#0077B6] to-[#005a8a]',
      'tag'      => 'bg-[#e8f4fc] text-[#005a8a] border-[#b3d8ef]',
      'btn'      => 'bg-gradient-to-br from-[#0077B6] to-[#005a8a] shadow-[0_3px_12px_rgba(0,119,182,0.3)]',
      'courses'  => [
        ['GHS-101','Strategic Planning for Health Institutions','Equips health leaders with the tools to develop, implement, and monitor strategic plans for hospitals, health programmes, and government health units. The course covers situational analysis, stakeholder mapping, theory of change, balanced scorecards, and results-based frameworks with real-plan case studies throughout.','Senior health managers, medical superintendents, department heads, public health directors, NGO programme leads, and county/district health officers.',['8 Weeks','Leadership','Facilitated'],'https://academy.genyragroup.com/'],
        ['GHS-102','Quality Management Systems (QMS) Design & Implementation','A comprehensive course on building, deploying, and sustaining a QMS in health and laboratory settings. Grounded in ISO 9001 and ISO 15189 principles, the course walks participants through process documentation, risk-based thinking, internal auditing, corrective action management, and management review processes.','Quality managers, laboratory managers, hospital quality teams, health facility administrators, and compliance officers.',['8 Weeks','ISO-Aligned','Intermediate'],'https://academy.genyragroup.com/'],
        ['GHS-103','Internal Audit Skills for Health & Laboratory Settings','Develops practical internal audit competencies in participants from audit planning and checklist development to conducting interviews, writing non-conformity reports, and following up on corrective actions. Taught within a health and laboratory quality systems context, fully aligned with ISO audit requirements.','Quality officers, laboratory supervisors, compliance managers, and staff designated as internal auditors in health or laboratory facilities.',['8 Weeks','Practical','ISO 19011'],'https://academy.genyragroup.com/'],
        ['GHS-104','Patient Safety & Clinical Risk Management','Focuses on building a culture of safety in health facilities. Covers root cause analysis of adverse events, near-miss reporting systems, failure mode and effects analysis (FMEA), and the design of safety checklists and clinical protocols. Draws on WHO Patient Safety Curriculum frameworks.','Clinical officers, nurses, hospital quality teams, risk managers, patient safety champions, and clinical governance staff.',['8 Weeks','WHO-Aligned','All Clinicals'],'https://academy.genyragroup.com/'],
        ['GHS-105','Health Systems Strengthening: Frameworks & Practice','An applied course on diagnosing and improving the six WHO health system building blocks: service delivery, health workforce, information, medical products, financing, and leadership/governance. Participants develop evidence-based recommendations for real or simulated health system challenges.','Public health practitioners, health ministry officials, development partners, NGO health programme staff, and health system researchers.',['8 Weeks','WHO Framework','Applied'],'https://academy.genyragroup.com/'],
      ],
    ],

    [
      'id'       => 'metrology',
      'title'    => 'Metrology & Calibration Services',
      'subtitle' => 'Precision Measurement · Instrument Assurance · Standards Compliance',
      'icon'     => 'met',
      'accent'   => 'text-[#008BA3]',
      'line'     => 'from-[#008BA3]',
      'band'     => 'bg-gradient-to-br from-[#008BA3] to-[#00687c]',
      'tag'      => 'bg-[#e5f6f9] text-[#00687c] border-[#aadfea]',
      'btn'      => 'bg-gradient-to-br from-[#008BA3] to-[#00687c] shadow-[0_3px_12px_rgba(0,139,163,0.3)]',
      'courses'  => [
        ['GMC-101','Fundamentals of Metrology & Measurement Science','Introduces the science of measurement covering measurement units (SI system), measurement uncertainty, traceability, accuracy vs. precision, and the principles underpinning reliable metrology. Participants gain a conceptual and practical foundation applicable to clinical, laboratory, and industrial measurement contexts.','Laboratory technicians, clinical engineers, quality officers, biomedical staff, and technicians encountering measurement and calibration tasks in their roles.',['8 Weeks','Foundational','Theory + Practice'],'https://academy.genyragroup.com/'],
        ['GMC-102','Medical Instrument Calibration: Principles & Practice','A practical course on calibrating the most common medical instruments including thermometers, sphygmomanometers, weighing scales, infusion pumps, and patient monitors. Covers calibration procedures, reference standards, tolerance limits, and documentation requirements in line with ISO 17025 and regulatory norms.','Biomedical engineers, clinical engineers, technical staff in medical device departments, and quality assurance personnel in healthcare facilities.',['8 Weeks','Hands-On','ISO 17025'],'https://academy.genyragroup.com/'],
        ['GMC-103','Laboratory Instrument Verification & Performance Qualification','Covers Installation Qualification (IQ), Operational Qualification (OQ), and Performance Qualification (PQ) protocols for laboratory instruments including balances, pipettes, centrifuges, incubators, and spectrophotometers. Participants develop and execute validation plans and prepare compliant documentation packages.','Laboratory scientists, quality managers in pharmaceutical or clinical labs, regulatory compliance staff, and validation engineers.',['8 Weeks','Intermediate','IQ/OQ/PQ'],'https://academy.genyragroup.com/'],
        ['GMC-104','Measurement Uncertainty Estimation & Reporting','Provides a thorough grounding in the GUM (Guide to the Expression of Uncertainty in Measurement) framework. Participants learn to identify uncertainty sources, construct uncertainty budgets, and correctly report expanded uncertainty in calibration certificates and test reports a critical skill for ISO 17025 compliance.','Calibration laboratory staff, metrologists, quality assurance professionals, and technical managers preparing for ISO 17025 accreditation.',['8 Weeks','GUM Framework','Advanced'],'https://academy.genyragroup.com/'],
        ['GMC-105','ISO 17025 Compliance: Establishing & Sustaining a Calibration Lab','A comprehensive course preparing calibration and testing laboratories for ISO/IEC 17025 accreditation. Covers the standard\'s management and technical requirements, document control, method validation, proficiency testing, and readiness for external assessment. Includes gap analysis tools and a sample QMS document suite.','Laboratory managers, technical managers, quality managers, and staff of calibration, testing, or measurement laboratories pursuing or maintaining ISO 17025 accreditation.',['8 Weeks','ISO 17025','Accreditation'],'https://academy.genyragroup.com/'],
      ],
    ],

    /* Technology & AI pillar (parked): to enable, add another entry above with
         'id' => 'tech', 'title' => 'Technology, Data & Artificial Intelligence',
         'subtitle' => 'Data Analytics · Artificial Intelligence · Digital Innovation',
         'icon' => 'met', the same teal theme classes as Metrology, and this course:
         ['GTC-201','Introduction to Data Analytics','Provides a foundational understanding of data analytics including data collection, cleaning, analysis, and visualization. Participants learn how organizations use data to make strategic decisions and gain exposure to tools such as Excel, SQL, and Python for basic analytics workflows.','Students, business professionals, researchers, and beginners interested in understanding how data is analyzed to support decision making.',['8 Weeks','Beginner','Data Fundamentals'],'courses.readmore'] */

  ];
  @endphp

  @foreach($pillars as $p)
  {{-- ════ PILLAR ════ --}}
  <section class="mb-16" id="section-{{ $p['id'] }}" data-pillar="{{ $p['id'] }}">

    <div class="relative mb-6 flex items-end gap-6 pb-4">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">{{ $p['title'] }}</h2>
        <span class="mt-1 block text-[9.5px] uppercase tracking-[0.3em] {{ $p['accent'] }}">{{ $p['subtitle'] }}</span>
      </div>
      <span class="text-[11px] tracking-wider text-[#6b5f52]">{{ count($p['courses']) }} courses</span>
      <span class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r {{ $p['line'] }} to-transparent"></span>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

      @foreach($p['courses'] as [$code, $title, $desc, $who, $tags, $url])
      <article class="relative flex flex-col overflow-hidden rounded-xl border border-black/[0.09] bg-white shadow-[0_2px_8px_rgba(0,0,0,0.06)] transition duration-300 ease-out hover:-translate-y-[5px] hover:shadow-[0_20px_50px_rgba(30,58,110,0.14)]">

        <div class="relative overflow-hidden px-6 pb-[1.1rem] pt-[1.4rem] text-white {{ $p['band'] }}">
          {!! $icons[$p['icon']] !!}
          <div class="mb-[0.65rem] inline-flex w-fit items-center gap-[0.3rem] rounded border border-white/50 px-[0.6rem] py-[0.2rem] font-['DM_Mono',monospace] text-[0.68rem] font-normal uppercase tracking-[0.12em] text-white opacity-90">{{ $code }}</div>
          <p class="relative z-[1] m-0 pr-12 text-[0.85rem] font-bold leading-[1.3] text-white">{{ $title }}</p>
        </div>

        <div class="flex flex-1 flex-col gap-2 px-6 pb-4 pt-5">
          <p class="text-sm text-gray-700">{{ $desc }}</p>
        </div>

        <div class="flex flex-col gap-3 border-t border-[#f0f0f0] bg-[#fafafa] px-6 pb-5 pt-4">
          <div>
            <p class="text-blue-500">Who should attend</p>
            <p class="text-gray-700">{{ $who }}</p>
          </div>

          <div class="flex flex-wrap gap-[0.3rem]">
            @foreach($tags as $tag)
            <span class="inline-flex items-center gap-[0.2rem] rounded-full border px-[0.55rem] py-[0.22rem] text-[0.62rem] font-semibold uppercase tracking-[0.06em] {{ $p['tag'] }}">{{ $tag }}</span>
            @endforeach
          </div>

          <a href="{{ $url }}" target="_blank" rel="noopener"
             class="group relative flex w-full items-center justify-center gap-[0.45rem] overflow-hidden rounded-[7px] px-4 py-[0.6rem] text-xs font-semibold tracking-[0.05em] text-white no-underline transition duration-200 hover:brightness-110 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#00A0C6] focus-visible:ring-offset-2 {{ $p['btn'] }}">
            {!! $enrol_svg !!} Enrol on genyra Institute
          </a>
        </div>
      </article>
      @endforeach

    </div>
  </section>
  @endforeach

</main>

</div>

<script>
  // Smooth anchor scrolling (better placed once on <html class="scroll-smooth"> in your layout)
  document.documentElement.classList.add('scroll-smooth');

  // 3D announcement bag: gentle swing + slight Y-wobble from the hook
  // (skipped if the visitor prefers reduced motion)
  const swing = document.querySelector('[data-swing]');
  const noteBox = document.querySelector('[data-announcement]');
  if (swing && noteBox && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const sway = swing.animate(
      [
        { transform: 'rotate(-3deg) rotateY(-8deg)' },
        { transform: 'rotate(3deg) rotateY(8deg)' }
      ],
      { duration: 4200, direction: 'alternate', iterations: Infinity, easing: 'ease-in-out' }
    );
    const slow = () => sway.updatePlaybackRate(0.2);
    const normal = () => sway.updatePlaybackRate(1);
    noteBox.addEventListener('mouseenter', slow);
    noteBox.addEventListener('mouseleave', normal);
    noteBox.addEventListener('focusin', slow);
    noteBox.addEventListener('focusout', normal);
  }
  document.querySelector('[data-announcement-close]')?.addEventListener('click', () => noteBox?.remove());

  const buttons  = document.querySelectorAll('[data-filter]');
  const sections = document.querySelectorAll('[data-pillar]');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => {
        b.dataset.active = 'false';
        b.setAttribute('aria-pressed', 'false');
      });
      btn.dataset.active = 'true';
      btn.setAttribute('aria-pressed', 'true');

      const f = btn.dataset.filter;
      sections.forEach(s => s.classList.toggle('hidden', !(f === 'all' || s.dataset.pillar === f)));
    });
  });
</script>

@endsection