@extends('web.app')

@section('title', 'Our Story')
@section('meta_description', 'Learn the story of genyra Group and our mission to build healthcare solutions that transform delivery across East Africa.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Our Story', 'url' => route('our-story')],
    ],
])
@endpush

@section('body')

@php
  // Crumpled-paper background (periwinkle-to-cyan paper, unique to this page).
  // Save it at public/images/paper-bg-story.jpg
  $paperImage = asset('images/paper-bg-story.jpg');

  $stats = [
    // [number, suffix, label, animate?]
    ['2017', '',   'Year established', false],
    ['50',   '+',  'Professionals',    true],
    ['6',    '',   'Countries',        true],
    ['85',   '%+', 'Client retention', true],
  ];

  $milestones = [
    ['2017', 'Founded in Nairobi with a vision to transform healthcare delivery across East Africa.'],
    ['2021', 'Digital radiology upgrades delivered across 5 facilities; first major calibration contracts signed.'],
    ['2022', 'Calibration and validation of 200+ equipment units across 10 facilities. ISO/IEC 17025 accreditation achieved.'],
    ['2023', 'ICU equipment supply for COVID-19 response; laboratory automation projects rolled out region-wide.'],
    ['2024', 'HIS/LIS implementation for 300-bed hospital; ISO accreditation support for 3 hospital laboratories.'],
    ['2025', 'Complete laboratory setup for Level 5 County Hospital 50+ equipment installations. Ongoing maintenance contracts with 50+ facilities.'],
  ];
@endphp

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Our Story</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Our Story</span>
    </div>
  </div>
</div>

<div class="relative isolate min-h-screen overflow-hidden bg-[#e6ebf8] px-6 py-12">

  {{-- Paper texture --}}
  <img src="{{ $paperImage }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover" aria-hidden="true">

  {{-- Countries we serve: Kenya, Uganda, Tanzania, Rwanda, South Sudan, Ethiopia.
       Decorative map beside the timeline (desktop only). Save at public/images/story-map.png --}}
  <img src="{{ asset('images/story-map.png') }}" alt="" aria-hidden="true"
       class="pointer-events-none absolute bottom-12 right-6 -z-10 hidden w-[420px] opacity-90 lg:block xl:right-14 xl:w-[500px]">

<div class="mx-auto max-w-7xl space-y-16">

  {{-- Intro --}}
  <section class="flex gap-5 sm:gap-8">

    {{-- Tall accent tile: globe icon with a faint medical-cross watermark --}}
    <div class="relative w-14 shrink-0 self-stretch overflow-hidden rounded-2xl bg-gradient-to-b from-[#1e3a6e] to-[#0b6f94] shadow-[0_18px_30px_-12px_rgba(10,26,58,0.45)] sm:w-24" aria-hidden="true">
      <svg class="mx-auto mt-5 h-8 w-8 text-white sm:mt-7 sm:h-11 sm:w-11" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
      <svg class="absolute -bottom-10 -left-10 h-44 w-44 text-white/10 sm:-bottom-12 sm:-left-12 sm:h-56 sm:w-56" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linejoin="round"><path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6z"/></svg>
      <span class="absolute bottom-5 left-1/2 h-1.5 w-8 -translate-x-1/2 rounded-full bg-[#00a0c6]"></span>
    </div>

    <div class="grid flex-1 gap-10 lg:grid-cols-5 lg:gap-16">
      <div class="lg:col-span-2">
        <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1.5 text-[13px] font-medium text-[#0b6f94] ring-1 ring-white/80">
          <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          Established 2017 · Nairobi, Kenya
        </span>
        <h2 class="mt-5 text-3xl font-extrabold leading-tight tracking-tight text-[#1e3a6e] lg:text-4xl">East Africa's Trusted Healthcare Solutions Partner</h2>
        <span class="mt-6 block h-1.5 w-24 rounded-full bg-gradient-to-r from-[#1e3a6e] to-[#00a0c6]"></span>
      </div>

      <div class="space-y-5 lg:col-span-3">
        <p class="text-lg font-medium leading-relaxed text-slate-800">
          genyra Group is East Africa's leading provider of comprehensive healthcare solutions, specializing in laboratory equipment, medical devices, health information systems, and metrology services. Established with a vision to transform healthcare delivery through innovation and excellence, we serve hospitals, research institutions, diagnostic laboratories, pharmaceutical companies, and healthcare facilities across the region.
        </p>
        <p class="text-[15px] leading-relaxed text-slate-700">
          With a proven track record of successful implementations and a commitment to quality, genyra Group has positioned itself as a trusted partner for healthcare organizations seeking to enhance patient care, improve operational efficiency, and achieve regulatory compliance.
        </p>
      </div>
    </div>
  </section>

  {{-- Stats --}}
  <section aria-label="genyra Group at a glance" class="grid grid-cols-2 gap-x-6 gap-y-10 lg:grid-cols-4 lg:gap-x-0 lg:divide-x lg:divide-[#1e3a6e]/20">
    @foreach($stats as [$num, $suffix, $label, $animate])
    <div class="lg:px-8 lg:first:pl-0">
      <p class="text-5xl font-extrabold leading-none tracking-tight text-[#1e3a6e] tabular-nums sm:text-6xl">
        <span @if($animate) data-count="{{ $num }}" @endif>{{ $num }}</span><span class="text-[#0a8fb8]">{{ $suffix }}</span>
      </p>
      <p class="mt-3 text-sm font-semibold text-slate-700">{{ $label }}</p>
    </div>
    @endforeach
  </section>

  {{-- Timeline --}}
  <section>
    <h2 class="text-3xl font-extrabold tracking-tight text-[#1e3a6e] sm:text-4xl">Key milestones</h2>
    <span class="mt-2 block h-1.5 w-full rounded-full bg-gradient-to-r from-[#1e3a6e] via-[#0A9BC8] to-[#0A9BC8]/10"></span>

    <ol class="ml-2 mt-10 border-l-2 border-[#1e3a6e]/20">
      @foreach($milestones as [$year, $desc])
      <li class="relative pb-10 pl-8 last:pb-0 sm:pl-10">
        {{-- dot --}}
        <span class="absolute -left-[9px] top-1.5 h-4 w-4 rounded-full border-4 {{ $loop->last ? 'border-[#00a0c6] bg-[#00a0c6] ring-4 ring-[#00a0c6]/25' : 'border-[#00a0c6] bg-white' }}" aria-hidden="true"></span>

        <div class="flex flex-col gap-1 sm:flex-row sm:gap-8">
          <p class="shrink-0 text-2xl font-bold leading-none tracking-tight text-[#1e3a6e] tabular-nums sm:w-20">{{ $year }}</p>
          <p class="max-w-3xl text-[15px] font-medium leading-relaxed text-slate-700 sm:pt-0.5">{{ $desc }}</p>
        </div>
      </li>
      @endforeach
    </ol>
  </section>

</div>
</div>

<script>
  // Count the stat numbers up once, when they scroll into view
  // (skipped for visitors who prefer reduced motion)
  (function () {
    const els = document.querySelectorAll('[data-count]');
    if (!els.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;

    const run = (el) => {
      const target = parseInt(el.dataset.count, 10);
      const start = performance.now(), dur = 1100;
      const tick = (now) => {
        const t = Math.min((now - start) / dur, 1);
        el.textContent = Math.round(target * (1 - Math.pow(1 - t, 3)));
        if (t < 1) requestAnimationFrame(tick);
      };
      el.textContent = '0';
      requestAnimationFrame(tick);
    };

    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => { if (e.isIntersecting) { run(e.target); io.unobserve(e.target); } });
    }, { threshold: 0.6 });
    els.forEach((el) => io.observe(el));
  })();
</script>

@endsection