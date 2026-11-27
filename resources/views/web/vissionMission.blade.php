@extends('web.app')

@section('title', 'Vision & Mission')
@section('meta_description', 'Read the vision and mission of genyra Group and our commitment to transforming healthcare through innovation and quality.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Vision & Mission', 'url' => route('vission-mission')],
    ],
])
@endpush

@section('body')

@php
  // Crumpled-paper background.
  // Leave null to use the built-in CSS paper texture, or point to your own image,
  // e.g. $paperImage = asset('images/paper-bg.jpg');
  $paperImage = asset('images/paper-bg.jpg');

  $paperTexture = "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='700' height='700'><filter id='p' x='0' y='0' width='100%' height='100%'><feTurbulence type='fractalNoise' baseFrequency='0.008 0.014' numOctaves='5' seed='11' result='n'/><feDiffuseLighting in='n' lighting-color='%23ffffff' surfaceScale='4'><feDistantLight azimuth='50' elevation='62'/></feDiffuseLighting></filter><rect width='100%' height='100%' filter='url(%23p)'/></svg>\")";

  $statements = [
    [
      'id'     => 'mission',
      'title'  => 'Our Mission:',
      'lead'   => 'To deliver innovative, reliable, and world-class healthcare solutions that improve patient outcomes, advance scientific research, and enhance operational efficiency.',
      'detail' => 'Every day our teams work across four specialized business units: BioSciences, MedTech Solutions, Health Systems Advisory, and Metrology & Calibration, to ensure healthcare facilities across East Africa are equipped, accredited, and operating at their best.',
      'tile'   => 'bg-[#1B2160]',
      'text'   => 'text-[#1B2160]',
      'bar'    => 'bg-gradient-to-r from-[#1B2160] via-[#0A9BC8] to-[#0A9BC8]/10',
      'icon'   => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
      'flip'   => false,
    ],
    [
      'id'     => 'vision',
      'title'  => 'Our Vision:',
      'lead'   => 'To be the most trusted and preferred partner for healthcare solutions in Africa.',
      'detail' => 'We aspire to set the standard for healthcare excellence across the continent, connecting world-class technology with the realities of African healthcare systems, and building lasting impact for the communities we serve.',
      'tile'   => 'bg-[#0a1a3a]',
      'text'   => 'text-[#0a1a3a]',
      'bar'    => 'bg-gradient-to-r from-[#0a1a3a] via-slate-500 to-slate-400/10',
      'icon'   => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/><circle cx="12" cy="12" r="1"/>',
      'flip'   => true,
    ],
  ];
@endphp

{{-- Header --}}
<div class="mt-28 bg-[#0a3b6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Vision &amp; Mission</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Vision &amp; Mission</span>
    </div>
  </div>
</div>

{{-- Crumpled-paper canvas --}}
<div class="relative isolate overflow-hidden bg-[#f3f3f0] px-6 py-12">

  {{-- Paper texture --}}
  @if($paperImage)
    <img src="{{ $paperImage }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover" aria-hidden="true">
  @else
    <div class="absolute inset-0 -z-10 opacity-70 mix-blend-multiply" aria-hidden="true"
         style="background-image: {!! $paperTexture !!}; background-size: 700px 700px;"></div>
    {{-- soft vignette so the edges feel like a sheet of paper --}}
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_center,transparent_55%,rgba(27,33,96,0.08)_100%)]" aria-hidden="true"></div>
  @endif

  <div class="mx-auto max-w-7xl space-y-12">

    @foreach($statements as $s)
    <section id="{{ $s['id'] }}" class="flex flex-row items-start gap-5 sm:gap-8 {{ $s['flip'] ? 'md:flex-row-reverse' : '' }}">

      {{-- Tall icon tile --}}
      <div class="relative h-36 w-16 shrink-0 overflow-hidden rounded-2xl shadow-[0_18px_30px_-12px_rgba(10,26,58,0.45)] sm:h-52 sm:w-24 {{ $s['tile'] }}" aria-hidden="true">
        <svg class="mx-auto mt-4 h-8 w-8 text-white sm:mt-6 sm:h-11 sm:w-11" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">{!! $s['icon'] !!}</svg>
        {{-- faint oversized watermark of the same icon --}}
        <svg class="absolute -bottom-6 -right-6 h-28 w-28 text-white/10 sm:-bottom-8 sm:-right-8 sm:h-40 sm:w-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">{!! $s['icon'] !!}</svg>
      </div>

      {{-- Copy --}}
      <div class="min-w-0 flex-1">
        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl {{ $s['text'] }}">{{ $s['title'] }}</h2>
        <span class="mt-2 block h-1.5 w-full rounded-full {{ $s['bar'] }}"></span>

        <p class="mt-5 max-w-3xl text-lg font-semibold leading-relaxed text-slate-800 sm:text-xl">{{ $s['lead'] }}</p>
        <p class="mt-3 max-w-2xl text-[15px] leading-relaxed text-slate-600">{{ $s['detail'] }}</p>
      </div>
    </section>
    @endforeach

    {{-- Website pill --}}
    <div>
      <a href="{{ url('/') }}"
         class="inline-flex items-center rounded-full bg-[#1B2160] px-6 py-2 text-sm font-medium text-white no-underline shadow-[0_10px_20px_-8px_rgba(27,33,96,0.6)] transition-colors hover:bg-[#0A9BC8] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0A9BC8] focus-visible:ring-offset-2">
        genyragroup.com
      </a>
    </div>

  </div>
</div>

{{-- Certifications strip (parked)
<div class="bg-[#1e3a6e] rounded overflow-hidden">
  <div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-white/10">
    @foreach(['ISO 9001:2015', 'ISO/IEC 17025:2017', 'ISO 13485:2016'] as $cert)
    <div class="px-6 py-5 text-center">
      <p class="text-[#00a0c6] font-bold text-sm">{{ $cert }}</p>
      <p class="text-white/50 text-[0.72rem] mt-0.5">Certified</p>
    </div>
    @endforeach
  </div>
</div>
--}}

@endsection