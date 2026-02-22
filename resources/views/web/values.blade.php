@extends('web.app')

@section('title', 'Our Values')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style> body, * { font-family: 'Inter', sans-serif !important; } </style>

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

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-6">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.93rem] text-[#4b5563] leading-relaxed max-w-2xl">
      Our values are the foundation of everything we do at Genyra Group — guiding how we work with clients, partners, and each other every single day.
    </p>
  </div>

  {{-- Values Grid --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach([
      [
        'Excellence',
        'We maintain the highest standards in product quality and service delivery — from first engagement to long-term support.',
        'M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'
      ],
      [
        'Innovation',
        'We embrace cutting-edge technology and creative solutions to continuously improve healthcare delivery across the region.',
        'M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'
      ],
      [
        'Integrity',
        'We conduct business with honesty, transparency, and ethical practices — building trust with every interaction.',
        'M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'
      ],
      [
        'Customer Focus',
        'We prioritize customer satisfaction and long-term partnerships — your success is our success.',
        'M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'
      ],
      [
        'Teamwork',
        'We collaborate internally and with stakeholders to achieve shared goals — stronger together across borders.',
        'M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z'
      ],
      [
        'Continuous Improvement',
        'We constantly seek to enhance our capabilities and offerings — never settling, always growing.',
        'M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z'
      ],
    ] as [$title, $desc, $icon])
    <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] p-6 hover:shadow-[0_4px_16px_rgba(30,58,110,0.1)] hover:-translate-y-0.5 transition-all duration-200">
      <div class="w-10 h-10 rounded-full bg-[#eaf6fb] flex items-center justify-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="#1e3a6e" viewBox="0 0 16 16">
          <path d="{{ $icon }}"/>
        </svg>
      </div>
      <h3 class="font-bold text-[#1e3a6e] text-[0.95rem] mb-2">{{ $title }}</h3>
      <p class="text-[0.82rem] text-[#6b7280] leading-relaxed">{{ $desc }}</p>
    </div>
    @endforeach
  </div>

  {{-- Closing quote --}}
  <div class="bg-[#1e3a6e] rounded overflow-hidden px-8 py-8 text-center">
    <p class="text-white/80 text-sm italic leading-relaxed max-w-xl mx-auto">
      "We value the confidence our clients place in us to support their medical and healthcare needs. Our commitment is to provide reliable solutions that meet the highest standards of quality and performance."
    </p>
    <p class="text-[#00a0c6] text-xs font-semibold tracking-wider uppercase mt-4">— Genyra Group</p>
  </div>

</div>
</div>

@endsection