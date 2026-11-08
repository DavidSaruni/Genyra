@extends('web.app')

@section('title', 'What We Do - genyra Group')
@section('meta_description', 'genyra Group business units: BioSciences, MedTech Solutions, Health Systems Planning and Advisory, and Metrology and Calibration Services.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'What We Do', 'url' => route('what-we-do')],
    ],
])
@endpush

@section('body')

<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">What We Do</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">What We Do</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
  <div class="max-w-7xl mx-auto space-y-6">

    <article id="biosciences" class="scroll-mt-32 bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-8 grid md:grid-cols-12 gap-8 items-center">
      <div class="md:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1BA0D8] mb-2">Life Sciences Research &amp; Applied Biology</p>
        <h2 class="text-2xl font-bold text-[#22235a] mb-4"><a href="{{ route('department.medical-supplies') }}" class="text-[#22235a] no-underline hover:text-[#1BA0D8]">Medical Supplies</a></h2>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-5">
          Genyra BioSciences is where discovery meets application. We bridge the gap between fundamental biological research and real-world health outcomes advancing knowledge in molecular biology, microbiology, genomics, and applied life sciences. Our work underpins the science behind better diagnostics, safer products, and more effective therapies.
        </p>
        <ul class="space-y-2.5">
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Applied biological research &amp; laboratory sciences</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Microbiology, genomics &amp; molecular diagnostics support</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Biosafety &amp; biosecurity advisory</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Research design, data analysis &amp; scientific consulting</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Capacity building &amp; scientific training programmes</li>
        </ul>
      </div>
      <img class="md:col-span-5 w-full h-64 md:h-80 object-cover rounded"
           src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1200"
           alt="Scientist working in a laboratory">
    </article>

    <article id="medtech" class="scroll-mt-32 bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-8 grid md:grid-cols-12 gap-8 items-center">
      <div class="md:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1BA0D8] mb-2">Medical Technology &amp; Device Solutions</p>
        <h2 class="text-2xl font-bold text-[#22235a] mb-4"><a href="{{ route('department.medical-technologies') }}" class="text-[#22235a] no-underline hover:text-[#1BA0D8]">Medical Technologies</a></h2>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-5">
          Genyra MedTech delivers end-to-end medical technology solutions from device selection and procurement to deployment, user training, and post-market support. We work with hospitals, clinics, and health programmes to ensure the right technology is in the right hands, functioning optimally, and aligned with clinical and operational needs.
        </p>
        <ul class="space-y-2.5">
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Medical device supply, sourcing &amp; procurement advisory</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Technology needs assessment &amp; health technology evaluation</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Biomedical equipment management &amp; lifecycle support</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Installation, commissioning &amp; user training</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Maintenance programme design &amp; technical support</li>
        </ul>
      </div>
      <img class="md:col-span-5 w-full h-64 md:h-80 object-cover rounded"
           src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1200"
           alt="Medical technology in clinical use">
    </article>

    <article id="health-systems" class="scroll-mt-32 bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-8 grid md:grid-cols-12 gap-8 items-center">
      <div class="md:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1BA0D8] mb-2">Strategic Planning · Quality Management Systems</p>
        <h2 class="text-2xl font-bold text-[#22235a] mb-4"><a href="{{ route('department.strategic-planning') }}" class="text-[#22235a] no-underline hover:text-[#1BA0D8]">Strategic Planning &amp; QMS</a></h2>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-5">
          Genyra Health Systems Planning &amp; Advisory empowers health institutions and organisations with the strategic intelligence and quality frameworks they need to perform at their best. We partner with governments, health authorities, NGOs, and private sector actors to design robust health systems, develop strategic plans, and embed quality cultures that endure.
        </p>
        <ul class="space-y-2.5">
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Health sector strategic planning &amp; institutional strengthening</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Quality Management Systems (QMS) design &amp; implementation</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> ISO standards alignment &amp; accreditation readiness</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Health policy advisory &amp; programme design</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Monitoring, evaluation &amp; performance improvement frameworks</li>
        </ul>
      </div>
      <img class="md:col-span-5 w-full h-64 md:h-80 object-cover rounded"
           src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1200"
           alt="Health systems planning discussion">
    </article>

    <article id="metrology" class="scroll-mt-32 bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-8 grid md:grid-cols-12 gap-8 items-center">
      <div class="md:col-span-7">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1BA0D8] mb-2">Precision Measurement &amp; Instrument Assurance</p>
        <h2 class="text-2xl font-bold text-[#22235a] mb-4"><a href="{{ route('department.metrology') }}" class="text-[#22235a] no-underline hover:text-[#1BA0D8]">Metrology, Calibration &amp; Preventive Maintenance</a></h2>
        <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-5">
          Genyra Metrology &amp; Calibration Services is built on a fundamental truth: accurate measurement is the foundation of safe and effective healthcare. We provide professional calibration, verification, and measurement assurance services for medical, laboratory, and industrial instruments ensuring that every reading is trustworthy, traceable, and compliant.
        </p>
        <ul class="space-y-2.5">
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Calibration of medical, laboratory &amp; industrial instruments</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Measurement traceability to national &amp; international standards</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Preventive maintenance &amp; performance verification</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Calibration programme management &amp; scheduling</li>
          <li class="text-sm text-gray-700 flex gap-2"><span class="text-[#1BA0D8] mt-0.5">▸</span> Compliance with ISO 17025 &amp; regulatory requirements</li>
        </ul>
      </div>
      <img class="md:col-span-5 w-full h-64 md:h-80 object-cover rounded"
           src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1200"
           alt="Precision laboratory instruments">
    </article>

  </div>
</div>

@endsection
