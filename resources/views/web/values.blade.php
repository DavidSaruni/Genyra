@extends('web.app')

@section('title', 'Our Values')
@section('meta_description', 'Discover the core values that guide genyra Group in delivering ethical, high-quality healthcare solutions across East Africa.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Our Values', 'url' => route('values')],
    ],
])
@endpush

@section('body')

@php
  // Its own unique crumpled-paper texture (deeper tide-blue)
  $paperImage = asset('images/paper-bg.jpg');

  // [title, tag, description, icon paths]
  $values = [
    [
      'Excellence', 'Quality first',
      'We maintain the highest standards in product quality and service delivery from first engagement to long-term support.',
      '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
    ],
    [
      'Innovation', 'Forward thinking',
      'We embrace cutting-edge technology and creative solutions to continuously improve healthcare delivery across the region.',
      '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
    ],
    [
      'Integrity', 'Ethical practice',
      'We conduct business with honesty, transparency, and ethical practices building trust with every interaction.',
      '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
    ],
    [
      'Customer Focus', 'Long-term partners',
      'We prioritize customer satisfaction and long-term partnerships your success is our success.',
      '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
    ],
    [
      'Teamwork', 'Stronger together',
      'We collaborate internally and with stakeholders to achieve shared goals stronger together across borders.',
      '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    ],
    [
      'Continuous Improvement', 'Always growing',
      'We constantly seek to enhance our capabilities and offerings never settling, always growing.',
      '<path d="M22 7 13.5 15.5 8.5 10.5 2 17"/><path d="M16 7h6v6"/>',
    ],
  ];
@endphp

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Our Values</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Our Values</span>
    </div>
  </div>
</div>

<div class="relative isolate min-h-screen overflow-hidden bg-[#bcdcea] px-6 py-12">

  {{-- Paper texture --}}
  <img src="{{ $paperImage }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover" aria-hidden="true">

<div class="mx-auto max-w-7xl space-y-14">

  {{-- Intro --}}
  <section>
    <h2 class="text-3xl font-extrabold tracking-tight text-[#1e3a6e] sm:text-4xl">What guides us</h2>
    <span class="mt-2 block h-1.5 w-full rounded-full bg-gradient-to-r from-[#1e3a6e] via-[#00a0c6] to-[#00a0c6]/10"></span>
    <p class="mt-5 max-w-3xl text-lg font-medium leading-relaxed text-[#0a1a3a]">
      Our values are the foundation of everything we do at genyra Group guiding how we work with clients, partners, and each other every single day.
    </p>
  </section>

  {{-- Values: frosted tiles so the paper shows through --}}
  <section aria-label="Our values" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($values as [$title, $tag, $desc, $icon])
    <article class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#00a0c6]/25 via-white/60 to-[#1e3a6e]/20 p-6 ring-1 ring-[#00a0c6]/30 backdrop-blur-[2px] transition duration-300 ease-out hover:-translate-y-1 hover:from-[#00a0c6]/35 hover:via-white/70 hover:to-[#1e3a6e]/30 hover:ring-[#00a0c6]/50 hover:shadow-[0_22px_40px_-18px_rgba(0,160,198,0.5)] motion-reduce:transition-none motion-reduce:hover:translate-y-0">

      {{-- Logo-colour accent bar --}}
      <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-[#1e3a6e] to-[#00a0c6]"></span>

      <div class="flex items-center justify-between gap-3">
        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-[#00a0c6] to-[#1e3a6e] text-white shadow-[0_8px_16px_-4px_rgba(0,160,198,0.55)]">
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $icon !!}</svg>
        </span>
        <span class="rounded-full bg-[#00a0c6]/15 px-4 py-1.5 text-xs font-semibold text-[#0a6f8a] ring-1 ring-[#00a0c6]/25">{{ $tag }}</span>
      </div>

      <h3 class="mt-7 text-xl font-bold tracking-tight text-[#1e3a6e]">{{ $title }}</h3>
      <p class="mt-2 text-[15px] leading-relaxed text-slate-700">{{ $desc }}</p>
    </article>
    @endforeach
  </section>

  {{-- Closing quote --}}
  <section class="max-w-3xl">
    <svg class="h-9 w-9 text-[#00a0c6]/70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
    <p class="mt-4 text-xl font-semibold leading-relaxed text-[#0a1a3a] sm:text-2xl">
      "We value the confidence our clients place in us to support their medical and healthcare needs. Our commitment is to provide reliable solutions that meet the highest standards of quality and performance."
    </p>
    <p class="mt-5 text-sm font-bold text-[#1e3a6e]">genyra Group</p>
  </section>

</div>
</div>

@endsection