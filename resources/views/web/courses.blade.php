@extends('web.app')

@section('title', 'Professional Training Programmes - Genyra Academy')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400&display=swap" rel="stylesheet">

<style>
  * {
    font-family: 'DM Sans', sans-serif !important;
  }
  .font-cormorant {
    font-family: 'Cormorant Garamond', serif !important;
  }
  .font-mono {
    font-family: 'DM Mono', monospace !important;
  }

  html {
    scroll-behavior: smooth;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .animate-course-card {
    animation: fadeIn 0.45s ease both;
  }

  .category-label {
    font-family: 'DM Mono', monospace;
    font-size: 8.5px;
    letter-spacing: 0.3em;
    color: #6b5f52;
    text-transform: uppercase;
    opacity: 0.7;
  }
</style>

{{-- Hero Section with Academy Image --}}
<header class="relative z-10 mt-28 overflow-hidden py-8 md:py-16">
  {{-- Background Image --}}
  <div class="absolute inset-0 z-0">
    <img src="https://images.pexels.com/photos/8617742/pexels-photo-8617742.jpeg?auto=compress&cs=tinysrgb&w=1920" 
         alt="Genyra Academy Medical Training" 
         class="w-full h-full object-cover">
    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-r from-[#1E3A6E]/95 to-[#1E3A6E]/85"></div>
  </div>

  {{-- Content --}}
  <div class="relative z-10 px-6 lg:px-20 py-12 lg:py-13">
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-10 items-end">
      
      <div>
        <div class="font-cormorant text-[2rem] lg:text-[2.25rem] tracking-[0.14em] text-[#f0ece4] uppercase leading-none">
          GEN<span class="text-[#00A0C6]">Y</span>RA <span class="italic">Academy</span>
        </div>
        <div class="font-mono text-[9px] tracking-[0.35em] text-white/85 mt-2 uppercase">
          Empowering Minds · Inspiring Excellence · Shaping Futures
        </div>
      </div>
      
      <div class="text-left lg:text-right">
        <h1 class="font-cormorant text-[2.25rem] lg:text-[2.625rem] text-[#f0ece4] leading-tight">
          Short Courses<br>& <em class="italic text-[#00A0C6]">Professional Training</em>
        </h1>
        <p class="font-mono text-[9px] tracking-[0.3em] text-white/85 mt-2.5 uppercase">
          Continuing Education Catalogue · 2025
        </p>
      </div>
      
    </div>
  </div>
</header>

{{-- Intro Strip --}}
<section class="relative z-[5] bg-white px-6 lg:px-20 py-12 border-b-2 border-black/20 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-15 items-center">
  <div>
    <p class="text-md text-gray-600 mb-6 leading-relaxed">
      Genyra Group's training programmes are designed for <strong class="text-[#1a1510] font-medium">working professionals</strong> seeking to deepen expertise, earn recognised competencies, or stay current in rapidly evolving fields. Our short courses are <strong class="text-[#1a1510] font-medium">practical, evidence-based, and tightly aligned</strong> with industry standards and regulatory frameworks delivered by seasoned practitioners across our four business pillars.
    </p>
  </div>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="text-center px-3 py-5 border border-black/20 rounded">
      <span class="font-cormorant text-[2.375rem] text-[#1a1510] leading-none block">20</span>
      <span class="font-mono text-[9px] tracking-[0.2em] text-[#6b5f52] uppercase block mt-1.5">Courses</span>
    </div>
    <div class="text-center px-3 py-5 border border-black/20 rounded">
      <span class="font-cormorant text-[2.375rem] text-[#1a1510] leading-none block">4</span>
      <span class="font-mono text-[9px] tracking-[0.2em] text-[#6b5f52] uppercase block mt-1.5">Pillars</span>
    </div>
    <div class="text-center px-3 py-5 border border-black/20 rounded">
      <span class="font-cormorant text-[2.375rem] text-[#1a1510] leading-none block">CPD</span>
      <span class="font-mono text-[9px] tracking-[0.2em] text-[#6b5f52] uppercase block mt-1.5">Credited</span>
    </div>
    <div class="text-center px-3 py-5 border border-black/20 rounded">
      <span class="font-cormorant text-[2.375rem] text-[#1a1510] leading-none block">∞</span>
      <span class="font-mono text-[9px] tracking-[0.2em] text-[#6b5f52] uppercase block mt-1.5">Impact</span>
    </div>
  </div>
</section>

{{-- Filter Bar --}}
<div class="relative z-[5] bg-[#f0ede8] px-6 lg:px-20 py-6 border-b border-black/20 flex items-center gap-3 flex-wrap">
  <span class="font-mono text-[9px] tracking-[0.3em] text-[#6b5f52] uppercase mr-2 whitespace-nowrap">Filter by pillar</span>
  <button class="filter-btn px-4 py-2 rounded border border-black/20 bg-transparent font-sans text-[12.5px] text-[#6b5f52] cursor-pointer transition-all hover:bg-white hover:text-[#1a1510] whitespace-nowrap tracking-wider" data-filter="all">All Courses</button>
  <button class="filter-btn px-4 py-2 rounded border border-black/20 bg-transparent font-sans text-[12.5px] text-[#6b5f52] cursor-pointer transition-all hover:bg-white hover:text-[#1a1510] whitespace-nowrap tracking-wider" data-filter="biosciences">BioSciences</button>
  <button class="filter-btn px-4 py-2 rounded border border-black/20 bg-transparent font-sans text-[12.5px] text-[#6b5f52] cursor-pointer transition-all hover:bg-white hover:text-[#1a1510] whitespace-nowrap tracking-wider" data-filter="medtech">MedTech</button>
  <button class="filter-btn px-4 py-2 rounded border border-black/20 bg-transparent font-sans text-[12.5px] text-[#6b5f52] cursor-pointer transition-all hover:bg-white hover:text-[#1a1510] whitespace-nowrap tracking-wider" data-filter="health-systems">Health Systems Planning</button>
  <button class="filter-btn px-4 py-2 rounded border border-black/20 bg-transparent font-sans text-[12.5px] text-[#6b5f52] cursor-pointer transition-all hover:bg-white hover:text-[#1a1510] whitespace-nowrap tracking-wider" data-filter="metrology">Metrology &amp; Calibration</button>
</div>

{{-- Catalogue --}}
<main class="relative z-[5] bg-[#f7f5f1] px-6 lg:px-20 py-15 pb-25">

  {{-- PILLAR 1: BIOSCIENCES --}}
  <div class="pillar-section mb-16" id="section-biosciences">
    <div class="flex items-center gap-5 mb-8 mt-16 py-6 first:mt-0 pb-5 border-b-2 border-[#00A0C6]">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">BioSciences</h2>
        <span class="font-mono text-[9.5px] tracking-[0.3em] text-[#00A0C6] uppercase block mt-1">Life Sciences · Applied Biology · Research Methods</span>
      </div>
      <span class="font-mono text-[11px] text-[#6b5f52] tracking-wider ml-auto">5 courses</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
      
      {{-- Course GBS-101 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#00A0C6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#00A0C6] mb-3 uppercase">GBS-101</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Fundamentals of Medical Microbiology for Health Professionals</div>
          <div class="text-gray-600 mb-6">A rigorous introduction to clinical and diagnostic microbiology covering bacteria, fungi, viruses, and parasites in the context of human health. Participants learn infection pathways, specimen handling, laboratory safety, and the interpretation of microbiological reports in clinical decision-making.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Nurses, clinical officers, medical laboratory technicians, public health officers, and healthcare workers seeking foundational microbiology literacy.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Beginner</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Lab + Theory</span>
          </div>
        </div>
      </div>

      {{-- Course GBS-102 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#00A0C6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#00A0C6] mb-3 uppercase">GBS-102</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Biosafety & Biosecurity in Laboratory and Field Settings</div>
          <div class="text-gray-600 mb-6">Equips participants with practical knowledge of biological risk levels, containment strategies, personal protective measures, and emergency protocols. The course draws on WHO biosafety guidelines and real-world case scenarios, preparing learners to work safely in BSL 1–3 environments.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Laboratory scientists, research assistants, environmental health officers, hospital infection control staff, and biosafety officers.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">2 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">All Levels</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Practical</span>
          </div>
        </div>
      </div>

      {{-- Course GBS-103 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#00A0C6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#00A0C6] mb-3 uppercase">GBS-103</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Introduction to Genomics & Molecular Diagnostics</div>
          <div class="text-gray-600 mb-6">Demystifies genomic science for non-specialists and intermediate practitioners. Topics include DNA/RNA structure, PCR and qPCR techniques, next-generation sequencing concepts, and the application of molecular diagnostics in infectious disease, oncology, and rare disease screening.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Laboratory scientists, clinicians, public health specialists, and researchers with at least a basic science background interested in molecular tools.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">4 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Intermediate</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Theory + Demo</span>
          </div>
        </div>
      </div>

      {{-- Course GBS-104 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#00A0C6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#00A0C6] mb-3 uppercase">GBS-104</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Scientific Research Design & Data Integrity</div>
          <div class="text-gray-600 mb-6">A hands-on course covering the end-to-end research process from formulating a research question and choosing study designs, to collecting data ethically and ensuring analytical rigour. Special emphasis is placed on Good Research Practice (GRP), research ethics, and documentation standards in health and life sciences.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Health researchers, postgraduate students, clinical trials staff, programme evaluators, and anyone initiating or managing scientific studies.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">5 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Intermediate</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Workshops</span>
          </div>
        </div>
      </div>

      {{-- Course GBS-105 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#00A0C6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#00A0C6] mb-3 uppercase">GBS-105</div>
          <div class="text-xl font-bold mb-4 text-gray-700">One Health: Linking Human, Animal & Environmental Health</div>
          <div class="text-gray-600 mb-6">A transdisciplinary course exploring the interconnected nature of human, animal, and ecosystem health. Drawing on real-world zoonotic outbreaks, antimicrobial resistance trends, and environmental surveillance, participants develop an integrated lens for understanding and responding to complex health threats.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Public health officers, veterinarians, environmental scientists, epidemiologists, and policymakers in health, agriculture, and environment sectors.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">All Levels</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#00A0C6] text-[#00A0C6] tracking-wider uppercase opacity-75">Multi-Sector</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  {{-- PILLAR 2: MEDTECH --}}
  <div class="pillar-section mb-16" id="section-medtech">
    <div class="flex items-center gap-5 mb-8 mt-16 pb-5 border-b-2 border-[#1E3A6E]">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">MedTech</h2>
        <span class="font-mono text-[9.5px] tracking-[0.3em] text-[#1E3A6E] uppercase block mt-1">Medical Technology · Device Management · Clinical Engineering</span>
      </div>
      <span class="font-mono text-[11px] text-[#6b5f52] tracking-wider ml-auto">5 courses</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
      
      {{-- Course GMT-101 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#1E3A6E]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#1E3A6E] mb-3 uppercase">GMT-101</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Healthcare Technology Management Essentials</div>
          <div class="text-gray-600 mb-6">An essential primer for anyone responsible for managing medical equipment in health facilities. Covers the full equipment lifecycle from needs assessment and procurement through to acceptance testing, preventive maintenance planning, and decommissioning with practical tools and checklists.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Biomedical engineers, hospital administrators, health facility managers, procurement officers, and clinical engineers at all career levels.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">4 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Foundational</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Practical Tools</span>
          </div>
        </div>
      </div>

      {{-- Course GMT-102 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#1E3A6E]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#1E3A6E] mb-3 uppercase">GMT-102</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Medical Device Regulation & Market Authorisation</div>
          <div class="text-gray-600 mb-6">Navigates the complex landscape of medical device regulatory frameworks covering national regulatory pathways, CE marking, WHO prequalification, post-market surveillance obligations, and adverse event reporting. Participants gain the knowledge to achieve and maintain market authorisation for medical devices.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Regulatory affairs professionals, device manufacturers, procurement specialists, quality assurance staff, and health technology assessors.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Intermediate</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Regulatory</span>
          </div>
        </div>
      </div>

      {{-- Course GMT-103 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#1E3A6E]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#1E3A6E] mb-3 uppercase">GMT-103</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Health Technology Assessment (HTA): Evidence-Based Procurement</div>
          <div class="text-gray-600 mb-6">Introduces participants to HTA methodologies used to inform purchasing decisions for medical technologies. The course covers cost-effectiveness analysis, clinical evidence evaluation, burden of disease considerations, and stakeholder analysis empowering procurement teams to invest wisely in medical technology.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Hospital procurement teams, health economists, clinical engineers, health ministry officials, and insurance/reimbursement professionals.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Intermediate</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Decision-Making</span>
          </div>
        </div>
      </div>

      {{-- Course GMT-104 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#1E3A6E]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#1E3A6E] mb-3 uppercase">GMT-104</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Digital Health & Emerging Medical Technologies</div>
          <div class="text-gray-600 mb-6">A forward-looking survey of transformative technologies reshaping healthcare delivery from AI-assisted diagnostics and electronic health records to telehealth platforms, wearables, and point-of-care technologies. Participants explore both the promise and governance challenges of digital health in resource-variable settings.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Clinicians, health informaticians, hospital managers, policymakers, and technology enthusiasts in health and life sciences.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">2 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">All Levels</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Strategic</span>
          </div>
        </div>
      </div>

      {{-- Course GMT-105 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#1E3A6E]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#1E3A6E] mb-3 uppercase">GMT-105</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Electro-Medical Equipment Safety & User Competency</div>
          <div class="text-gray-600 mb-6">Focused on the safe and effective use of electrical medical equipment in clinical environments. Covers electrical safety standards, user responsibilities, operator-level maintenance, alarm management, and incident reporting. Includes hands-on familiarisation with common clinical equipment types.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Nurses, clinical officers, ICU/theatre technicians, ward managers, and any clinical staff who regularly operate electromedical equipment.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">2 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Practical</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#1E3A6E] text-[#1E3A6E] tracking-wider uppercase opacity-75">Patient Safety</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  {{-- PILLAR 3: HEALTH SYSTEMS --}}
  <div class="pillar-section mb-16" id="section-health-systems">
    <div class="flex items-center gap-5 mb-8 mt-16 pb-5 border-b-2 border-[#0077B6]">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">Health Systems Planning &amp; Advisory</h2>
        <span class="font-mono text-[9.5px] tracking-[0.3em] text-[#0077B6] uppercase block mt-1">Strategic Planning · Quality Management · Governance</span>
      </div>
      <span class="font-mono text-[11px] text-[#6b5f52] tracking-wider ml-auto">5 courses</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
      
      {{-- Course GHS-101 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#0077B6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#0077B6] mb-3 uppercase">GHS-101</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Strategic Planning for Health Institutions</div>
          <div class="text-gray-600 mb-6">Equips health leaders with the tools to develop, implement, and monitor strategic plans for hospitals, health programmes, and government health units. The course covers situational analysis, stakeholder mapping, theory of change, balanced scorecards, and results-based frameworks with real-plan case studies throughout.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Senior health managers, medical superintendents, department heads, public health directors, NGO programme leads, and county/district health officers.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">5 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">Leadership</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">Facilitated</span>
          </div>
        </div>
      </div>

      {{-- Course GHS-102 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#0077B6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#0077B6] mb-3 uppercase">GHS-102</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Quality Management Systems (QMS) Design & Implementation</div>
          <div class="text-gray-600 mb-6">A comprehensive course on building, deploying, and sustaining a QMS in health and laboratory settings. Grounded in ISO 9001 and ISO 15189 principles, the course walks participants through process documentation, risk-based thinking, internal auditing, corrective action management, and management review processes.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Quality managers, laboratory managers, hospital quality teams, health facility administrators, and compliance officers.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">5 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">ISO-Aligned</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">Intermediate</span>
          </div>
        </div>
      </div>

      {{-- Course GHS-103 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#0077B6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#0077B6] mb-3 uppercase">GHS-103</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Internal Audit Skills for Health & Laboratory Settings</div>
          <div class="text-gray-600 mb-6">Develops practical internal audit competencies in participants from audit planning and checklist development to conducting interviews, writing non-conformity reports, and following up on corrective actions. Taught within a health and laboratory quality systems context, fully aligned with ISO audit requirements.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Quality officers, laboratory supervisors, compliance managers, and staff designated as internal auditors in health or laboratory facilities.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">Practical</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">ISO 19011</span>
          </div>
        </div>
      </div>

      {{-- Course GHS-104 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#0077B6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#0077B6] mb-3 uppercase">GHS-104</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Patient Safety & Clinical Risk Management</div>
          <div class="text-gray-600 mb-6">Focuses on building a culture of safety in health facilities. Covers root cause analysis of adverse events, near-miss reporting systems, failure mode and effects analysis (FMEA), and the design of safety checklists and clinical protocols. Draws on WHO Patient Safety Curriculum frameworks.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Clinical officers, nurses, hospital quality teams, risk managers, patient safety champions, and clinical governance staff.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">WHO-Aligned</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">All Clinicals</span>
          </div>
        </div>
      </div>

      {{-- Course GHS-105 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#0077B6]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#0077B6] mb-3 uppercase">GHS-105</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Health Systems Strengthening: Frameworks & Practice</div>
          <div class="text-gray-600 mb-6">An applied course on diagnosing and improving the six WHO health system building blocks: service delivery, health workforce, information, medical products, financing, and leadership/governance. Participants develop evidence-based recommendations for real or simulated health system challenges.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Public health practitioners, health ministry officials, development partners, NGO health programme staff, and health system researchers.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">4 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">WHO Framework</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#0077B6] text-[#0077B6] tracking-wider uppercase opacity-75">Applied</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  {{-- PILLAR 4: METROLOGY --}}
  <div class="pillar-section mb-16" id="section-metrology">
    <div class="flex items-center gap-5 mb-8 mt-16 pb-5 border-b-2 border-[#008BA3]">
      <div class="flex-1">
        <h2 class="text-2xl font-bold text-gray-700">Metrology &amp; Calibration Services</h2>
        <span class="font-mono text-[9.5px] tracking-[0.3em] text-[#008BA3] uppercase block mt-1">Precision Measurement · Instrument Assurance · Standards Compliance</span>
      </div>
      <span class="font-mono text-[11px] text-[#6b5f52] tracking-wider ml-auto">5 courses</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
      
      {{-- Course GMC-101 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#008BA3]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#008BA3] mb-3 uppercase">GMC-101</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Fundamentals of Metrology & Measurement Science</div>
          <div class="text-gray-600 mb-6">Introduces the science of measurement covering measurement units (SI system), measurement uncertainty, traceability, accuracy vs. precision, and the principles underpinning reliable metrology. Participants gain a conceptual and practical foundation applicable to clinical, laboratory, and industrial measurement contexts.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Laboratory technicians, clinical engineers, quality officers, biomedical staff, and technicians encountering measurement and calibration tasks in their roles.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">2 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Foundational</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Theory + Practice</span>
          </div>
        </div>
      </div>

      {{-- Course GMC-102 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#008BA3]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#008BA3] mb-3 uppercase">GMC-102</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Medical Instrument Calibration: Principles & Practice</div>
          <div class="text-gray-600 mb-6">A practical course on calibrating the most common medical instruments including thermometers, sphygmomanometers, weighing scales, infusion pumps, and patient monitors. Covers calibration procedures, reference standards, tolerance limits, and documentation requirements in line with ISO 17025 and regulatory norms.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Biomedical engineers, clinical engineers, technical staff in medical device departments, and quality assurance personnel in healthcare facilities.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">4 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Hands-On</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">ISO 17025</span>
          </div>
        </div>
      </div>

      {{-- Course GMC-103 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#008BA3]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#008BA3] mb-3 uppercase">GMC-103</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Laboratory Instrument Verification & Performance Qualification</div>
          <div class="text-gray-600 mb-6">Covers Installation Qualification (IQ), Operational Qualification (OQ), and Performance Qualification (PQ) protocols for laboratory instruments including balances, pipettes, centrifuges, incubators, and spectrophotometers. Participants develop and execute validation plans and prepare compliant documentation packages.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Laboratory scientists, quality managers in pharmaceutical or clinical labs, regulatory compliance staff, and validation engineers.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Intermediate</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">IQ/OQ/PQ</span>
          </div>
        </div>
      </div>

      {{-- Course GMC-104 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#008BA3]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#008BA3] mb-3 uppercase">GMC-104</div>
          <div class="text-xl font-bold mb-4 text-gray-700">Measurement Uncertainty Estimation & Reporting</div>
          <div class="text-gray-600 mb-6">Provides a thorough grounding in the GUM (Guide to the Expression of Uncertainty in Measurement) framework. Participants learn to identify uncertainty sources, construct uncertainty budgets, and correctly report expanded uncertainty in calibration certificates and test reports a critical skill for ISO 17025 compliance.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Calibration laboratory staff, metrologists, quality assurance professionals, and technical managers preparing for ISO 17025 accreditation.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">3 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">GUM Framework</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Advanced</span>
          </div>
        </div>
      </div>

      {{-- Course GMC-105 --}}
      <div class="animate-course-card bg-white border border-black/20 rounded-md overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.1)] flex flex-col">
        <div class="h-1 bg-[#008BA3]"></div>
        <div class="p-7 pb-5 flex-1 flex flex-col">
          <div class="font-mono text-[9.5px] tracking-[0.25em] text-[#008BA3] mb-3 uppercase">GMC-105</div>
          <div class="text-xl font-bold mb-4 text-gray-700">ISO 17025 Compliance: Establishing & Sustaining a Calibration Lab</div>
          <div class="text-gray-600 mb-6">A comprehensive course preparing calibration and testing laboratories for ISO/IEC 17025 accreditation. Covers the standard's management and technical requirements, document control, method validation, proficiency testing, and readiness for external assessment. Includes gap analysis tools and a sample QMS document suite.</div>
        </div>
        <div class="px-7 py-3.5 bg-[#f0ede8] border-t border-black/10">
          <div class="category-label mb-3">Who should attend</div>
          <div class="text-[12px] leading-[1.55] text-[#1a1510]">Laboratory managers, technical managers, quality managers, and staff of calibration, testing, or measurement laboratories pursuing or maintaining ISO 17025 accreditation.</div>
          <div class="flex flex-wrap gap-1.5 mt-3.5">
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">5 Days</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">ISO 17025</span>
            <span class="text-[9px] px-2 py-2 rounded-sm border border-[#008BA3] text-[#008BA3] tracking-wider uppercase opacity-75">Accreditation</span>
          </div>
        </div>
      </div>

    </div>
  </div>

</main>

{{-- CTA Section --}}
<section class="relative z-[5] bg-[#1E3A6E] px-6 lg:px-20 py-16 grid grid-cols-1 lg:grid-cols-[1fr_auto] items-center gap-15">
  <div>
    <h2 class="font-cormorant text-6xl font-bold text-[#f0ece4] leading-tight mb-4">
      Ready to Build<br><em class="italic text-[#00A0C6]">Expert Capacity</em>?
    </h2>
    <p class="text-[14.5px] leading-[1.8] text-white max-w-[520px]">
      All Genyra short courses can be delivered in-person, on-site at your organisation, or in a blended format. We also offer customised training programmes tailored to your specific institutional needs, regulatory context, and workforce profile. Contact us to discuss scheduling, group enrolment, and CPD certification options.
    </p>
  </div>
  <div class="flex flex-col gap-4 min-w-[220px]">
    <div class="px-7 py-4 border border-[#f0ece4]/15 rounded">
      <strong class="block text-sm text-[#f0ece4] font-medium mb-1 tracking-wider">In-Person & On-Site</strong>
      <span class="font-mono text-[12px] text-white/50 tracking-wider">Nairobi · Available nationwide</span>
    </div>
    <div class="px-7 py-4 border border-[#f0ece4]/15 rounded">
      <strong class="block text-sm text-[#f0ece4] font-medium mb-1 tracking-wider">Group & Institutional Bookings</strong>
      <span class="font-mono text-[12px] text-white/50 tracking-wider">Custom programmes available</span>
    </div>
    <div class="px-7 py-4 border border-[#f0ece4]/15 rounded">
      <strong class="block text-sm text-[#f0ece4] font-medium mb-1 tracking-wider">CPD-Credited</strong>
      <span class="font-mono text-[12px] text-white/50 tracking-wider">Certificates of completion issued</span>
    </div>
    <div class="px-7 py-4 border border-[#00A0C6]/40 rounded bg-[#00A0C6]/8">
      <strong class="block text-sm text-[#00A0C6] font-medium mb-1 tracking-wider">training@genyragroup.com</strong>
      <span class="font-mono text-[12px] text-white tracking-wider">Enquire about any course</span>
    </div>
  </div>
</section>

<script>
  // Filter functionality
  const buttons = document.querySelectorAll('.filter-btn');
  const sections = document.querySelectorAll('.pillar-section');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active', '!bg-[#1E3A6E]', '!text-white', '!border-transparent'));
      btn.classList.add('active', '!bg-[#1E3A6E]', '!text-white', '!border-transparent');

      const filter = btn.dataset.filter;

      sections.forEach(section => {
        if (filter === 'all') {
          section.classList.remove('hidden');
        } else {
          const id = section.id;
          if (id.includes(filter)) {
            section.classList.remove('hidden');
          } else {
            section.classList.add('hidden');
          }
        }
      });
    });
  });

  // Set first button as active on load
  buttons[0].classList.add('active', '!bg-[#1E3A6E]', '!text-white', '!border-transparent');
</script>

@endsection