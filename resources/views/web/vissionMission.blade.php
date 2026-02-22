@extends('web.app')

@section('title', 'Vision & Mission')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style> body, * { font-family: 'Inter', sans-serif !important; } </style>

{{-- Header --}}
<div class="mt-28 bg-[#3f5b90] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Vision &amp; Mission</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Vision &amp; Mission</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-6">

  {{-- Vision --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#1e3a6e] px-6 py-4 border-b-4 border-[#00a0c6]">
      <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] m-0">Where We're Going</p>
      <h2 class="text-white font-bold text-lg m-0 mt-0.5">Our Vision</h2>
    </div>
    <div class="px-8 py-8 flex items-start gap-5">
      <div class="w-10 h-10 rounded-full bg-[#eaf6fb] flex items-center justify-center flex-shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00a0c6" viewBox="0 0 16 16">
          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>
      </div>
      <div>
        <p class="text-[1.05rem] font-semibold text-[#1e3a6e] leading-relaxed">
          To be the most trusted and preferred partner for healthcare solutions in Africa.
        </p>
        <p class="text-[0.88rem] text-[#6b7280] leading-relaxed mt-3">
          We aspire to set the standard for healthcare excellence across the continent — connecting world-class technology with the realities of African healthcare systems, and building lasting impact for the communities we serve.
        </p>
      </div>
    </div>
  </div>

  {{-- Mission --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#1e3a6e] px-6 py-4 border-b-4 border-[#00a0c6]">
      <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] m-0">What We Do Every Day</p>
      <h2 class="text-white font-bold text-lg m-0 mt-0.5">Our Mission</h2>
    </div>
    <div class="px-8 py-8 flex items-start gap-5">
      <div class="w-10 h-10 rounded-full bg-[#eaf6fb] flex items-center justify-center flex-shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00a0c6" viewBox="0 0 16 16">
          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </svg>
      </div>
      <div>
        <p class="text-[1.05rem] font-semibold text-[#1e3a6e] leading-relaxed">
          To deliver innovative, reliable, and world-class healthcare solutions that improve patient outcomes, advance scientific research, and enhance operational efficiency.
        </p>
        <p class="text-[0.88rem] text-[#6b7280] leading-relaxed mt-3">
          Every day our teams work across four specialized business Units — BioSciences, MedTech Solutions, Health Systems Advisory, and Metrology &amp; Calibration — to ensure healthcare facilities across East Africa are equipped, accredited, and operating at their best.
        </p>
      </div>
    </div>
  </div>


  <!-- <div class="bg-[#1e3a6e] rounded overflow-hidden">
    <div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-white/10">
      @foreach(['ISO 9001:2015', 'ISO/IEC 17025:2017', 'ISO 13485:2016'] as $cert)
      <div class="px-6 py-5 text-center">
        <p class="text-[#00a0c6] font-bold text-sm">{{ $cert }}</p>
        <p class="text-white/50 text-[0.72rem] mt-0.5">Certified</p>
      </div>
      @endforeach
    </div>
  </div> -->

</div>
</div>

@endsection