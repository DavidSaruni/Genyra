@extends('web.app')

@section('title', 'Our Story')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style> body, * { font-family: 'Inter', sans-serif !important; } </style>

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

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-8">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] p-8 lg:p-12">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-3">Established 2017 · Nairobi, Kenya</p>
    <h2 class="text-2xl font-bold text-[#1e3a6e] leading-snug mb-5">East Africa's Trusted Healthcare Solutions Partner</h2>
    <p class="text-[0.93rem] text-[#4b5563] leading-relaxed">
      Genyra Group is East Africa's leading provider of comprehensive healthcare solutions, specializing in laboratory equipment, medical devices, health information systems, and metrology services. Established with a vision to transform healthcare delivery through innovation and excellence, we serve hospitals, research institutions, diagnostic laboratories, pharmaceutical companies, and healthcare facilities across the region.
    </p>
    <p class="text-[0.93rem] text-[#4b5563] leading-relaxed mt-4">
      With a proven track record of successful implementations and a commitment to quality, Genyra Group has positioned itself as a trusted partner for healthcare organizations seeking to enhance patient care, improve operational efficiency, and achieve regulatory compliance.
    </p>
  </div>

  {{-- Stats --}}
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach([
      ['2017', 'Year Established'],
      ['50+',  'Professionals'],
      ['6',    'Countries'],
      ['85%+', 'Client Retention'],
    ] as [$num, $label])
    <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-5 py-6 text-center">
      <p class="text-3xl font-bold text-[#1e3a6e] leading-none">{{ $num }}</p>
      <p class="text-[0.7rem] text-[#6b7280] mt-1.5 uppercase tracking-wider font-medium">{{ $label }}</p>
    </div>
    @endforeach
  </div>

  {{-- Timeline --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#1e3a6e] px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Key Milestones</h2>
    </div>
    <div class="divide-y divide-[#f0f4f8]">
      @foreach([
        ['2017', 'Founded in Nairobi with a vision to transform healthcare delivery across East Africa.'],
        ['2021', 'Digital radiology upgrades delivered across 5 facilities; first major calibration contracts signed.'],
        ['2022', 'Calibration and validation of 200+ equipment units across 10 facilities. ISO/IEC 17025 accreditation achieved.'],
        ['2023', 'ICU equipment supply for COVID-19 response; laboratory automation projects rolled out region-wide.'],
        ['2024', 'HIS/LIS implementation for 300-bed hospital; ISO accreditation support for 3 hospital laboratories.'],
        ['2025', 'Complete laboratory setup for Level 5 County Hospital 50+ equipment installations. Ongoing maintenance contracts with 50+ facilities.'],
      ] as [$year, $desc])
      <div class="flex items-start gap-5 px-6 py-5">
        <span class="text-[0.85rem] font-bold text-[#00a0c6] font-mono w-10 flex-shrink-0 pt-0.5">{{ $year }}</span>
        <p class="text-[0.88rem] text-[#4b5563] leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>

</div>
</div>

@endsection