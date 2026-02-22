@extends('web.app')

@section('title', 'Strategic Direction')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style> body, * { font-family: 'Inter', sans-serif !important; } </style>

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Strategic Direction</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Strategic Direction</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-6">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-2">Our Roadmap</p>
    <h2 class="text-xl font-bold text-[#1e3a6e] mb-3">Building a Stronger Healthcare Ecosystem Across Africa</h2>
    <p class="text-[0.93rem] text-[#4b5563] leading-relaxed max-w-3xl">
      Genyra Group's strategic direction is anchored in four specialized business Units, underpinned by world-class certifications, regional expansion, and a commitment to long-term partnerships. Our focus is on delivering integrated, people-centred healthcare solutions that meet evolving needs across East Africa and beyond.
    </p>
  </div>

  {{-- Business Lines --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#1e3a6e] px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Our Four Business Units</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-[#f0f4f8]">
      @foreach([
        [
          'BioSciences',
          'Discovery. Diagnostics. Translation.',
          'Advanced laboratory testing, research sample analysis, biobanking, contract laboratory services, translational research support, reagent validation, and clinical trials.',
        ],
        [
          'MedTech Solutions',
          'Smart technologies for better health outcomes.',
          'Supply of diagnostic and biomedical equipment, point-of-care testing, digital health tools (LIMS, EMRs, AI diagnostics), consumables, reagents, PPE distribution, and preventive health solutions.',
        ],
        [
          'Health Systems Planning & Advisory',
          'Designing resilient, compliant, and people-centered health systems.',
          'Health systems strategic planning, Quality Management Systems (ISO 9001, ISO 15189, ISO 17025), laboratory accreditation, biosafety, biosecurity, risk management, and health policy advisory.',
        ],
        [
          'Metrology & Calibration Services',
          'Precision you can trust.',
          'Calibration of laboratory and medical equipment, measurement verification and validation, ISO/IEC 17025 advisory, environmental monitoring, and equipment performance audits.',
        ],
      ] as [$title, $tagline, $desc])
      <div class="p-6 lg:p-8">
        <p class="text-[0.68rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">{{ $tagline }}</p>
        <h3 class="font-bold text-[#1e3a6e] text-[0.95rem] mb-2">{{ $title }}</h3>
        <p class="text-[0.82rem] text-[#6b7280] leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>

  {{-- Strategic Priorities --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach([
      [
        'Regional Expansion',
        'Deepening presence across Kenya, Uganda, Tanzania, Rwanda, South Sudan, and Ethiopia — with service centres, regional offices, and local teams equipped to respond fast.',
      ],
      [
        'Technology & Innovation',
        'Continuous investment in digital health, IoT, cloud solutions, and AI diagnostics to stay ahead of evolving healthcare needs and deliver smarter outcomes.',
      ],
      [
        'Quality & Compliance',
        'Maintaining ISO 9001:2015, ISO/IEC 17025:2017, and ISO 13485:2016 certifications while supporting clients on their own accreditation journeys.',
      ],
      [
        'Workforce Development',
        'Training 500+ healthcare professionals annually — building local capacity and ensuring sustainable, long-term impact beyond equipment supply.',
      ],
      [
        'Strategic Partnerships',
        'Collaborating with leading global manufacturers, technology providers, financial institutions, and academic institutions for a stronger, broader ecosystem.',
      ],
      [
        'Long-term Client Relationships',
        'With an average client retention rate above 85% and many 10+ year partnerships, our strategy prioritizes trust, consistency, and genuine value.',
      ],
    ] as [$title, $desc])
    <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] p-6 hover:shadow-[0_4px_16px_rgba(30,58,110,0.1)] hover:-translate-y-0.5 transition-all duration-200">
      <div class="w-1.5 h-6 bg-[#00a0c6] rounded mb-4"></div>
      <h3 class="font-bold text-[#1e3a6e] text-[0.92rem] mb-2">{{ $title }}</h3>
      <p class="text-[0.81rem] text-[#6b7280] leading-relaxed">{{ $desc }}</p>
    </div>
    @endforeach
  </div>

  {{-- Key Projects strip --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#1e3a6e] px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Recent Highlights</h2>
    </div>
    <div class="divide-y divide-[#f0f4f8]">
      @foreach([
        ['2025', 'Complete laboratory setup for Level 5 County Hospital — 50+ equipment installations.'],
        ['2024', 'HIS/LIS integration for 300-bed hospital across 5 satellite clinics.'],
        ['2024', 'ISO/IEC 17025 accreditation support delivered for 3 hospital laboratories.'],
        ['2023', 'Laboratory automation project — hematology and chemistry analyzers with middleware.'],
        ['Ongoing', 'Annual maintenance contracts covering 50+ healthcare facilities nationwide.'],
        ['Ongoing', 'Capacity building programs — 500+ healthcare professionals trained annually.'],
      ] as [$year, $desc])
      <div class="flex items-start gap-5 px-6 py-4">
        <span class="text-[0.82rem] font-bold text-[#00a0c6] font-mono w-14 flex-shrink-0 pt-0.5">{{ $year }}</span>
        <p class="text-[0.87rem] text-[#4b5563] leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>

  {{-- CTA --}}
  <div class="bg-[#1e3a6e] rounded overflow-hidden px-8 py-8 text-center">
    <h2 class="text-white text-lg font-bold mb-2">Partner With Us</h2>
    <p class="text-white/60 text-sm mb-5 max-w-xl mx-auto">Whether you're a hospital, research institution, or government facility — let's build a better healthcare system together.</p>
    <a href="{{ url('/#contact') }}" class="inline-block px-6 py-2.5 bg-[#00a0c6] text-white text-sm font-semibold rounded no-underline hover:bg-[#0090b5] transition-colors tracking-wide">
      Get in Touch →
    </a>
  </div>

</div>
</div>

@endsection