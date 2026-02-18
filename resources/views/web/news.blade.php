@extends('web.app')

@section('title', 'News & Updates')

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('nav a, header a, [class*="nav"] a, [id*="nav"] a');
    navLinks.forEach(function (link) {
      const href = link.getAttribute('href');
      if (href && href.startsWith('#') && href.length > 1) {
        link.setAttribute('href', '/' + href);
      }
    });
  });
</script>

<style>
  body, * {
    font-family: 'Inter', sans-serif !important;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-up { animation: fadeUp 0.4s ease both; }
  .animate-delay-1 { animation-delay: 0.04s; }
  .animate-delay-2 { animation-delay: 0.10s; }
  .animate-delay-3 { animation-delay: 0.16s; }
  .animate-delay-4 { animation-delay: 0.22s; }
  .animate-delay-5 { animation-delay: 0.28s; }
  .animate-delay-6 { animation-delay: 0.34s; }

  /* ── Mobile Filter Drawer ── */
  #mobile-filter-drawer {
    position: fixed;
    top: 0; right: 0;
    width: 100%;
    height: 100%;
    background: #f5f8fc;
    z-index: 9999;
    transform: translateX(100%);
    transition: transform 0.32s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
    display: flex;
    flex-direction: column;
  }
  #mobile-filter-drawer.open {
    transform: translateX(0);
  }

  /* Overlay */
  #drawer-overlay {
    position: fixed;
    inset: 0;
    background: rgba(15, 30, 60, 0.45);
    z-index: 9998;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.32s ease;
  }
  #drawer-overlay.open {
    opacity: 1;
    pointer-events: auto;
  }

  /* "All Filters" trigger — visible only on small screens */
  #all-filters-btn {
    display: none;
  }
  @media (max-width: 1023px) {
    #all-filters-btn {
      display: inline-flex;
    }
  }

  /* Drawer header */
  .drawer-header {
    position: sticky;
    top: 0;
    z-index: 10;
    background: #1e3a6e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.9rem 1.1rem;
    border-bottom: 3px solid #00a0c6;
    flex-shrink: 0;
  }
  .drawer-header h2 {
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin: 0;
  }
  .drawer-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: #b3e8f5;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.3rem 0.6rem;
    border-radius: 4px;
    transition: background 0.15s, color 0.15s;
  }
  .drawer-back-btn:hover {
    background: rgba(255,255,255,0.1);
    color: #fff;
  }
  .drawer-back-btn svg {
    flex-shrink: 0;
  }

  /* Drawer body */
  .drawer-body {
    padding: 1.2rem 1rem 2rem;
    display: flex;
    flex-direction: column;
    gap: 1.1rem;
  }

  /* Drawer section titles */
  .drawer-section-title {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #6b7280;
    margin-bottom: 0.5rem;
  }

  /* Search in drawer */
  .drawer-search-wrap {
    display: flex;
    border: 1.5px solid #c8dce8;
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
    transition: border-color 0.15s;
  }
  .drawer-search-wrap:focus-within {
    border-color: #00a0c6;
  }
  .drawer-search-wrap input {
    flex: 1;
    padding: 0.55rem 0.8rem;
    font-size: 0.82rem;
    border: none;
    outline: none;
    background: transparent;
    color: #1e3a6e;
  }
  .drawer-search-wrap input::placeholder { color: #bbb; }
  .drawer-search-wrap button {
    background: #1e3a6e;
    color: #fff;
    border: none;
    padding: 0 0.85rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: background 0.15s;
  }
  .drawer-search-wrap button:hover { background: #00a0c6; }

  /* Category list in drawer */
  .drawer-cat-list {
    background: #fff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
  }
  .drawer-cat-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.65rem 1rem;
    border-bottom: 1px solid #f0f4f8;
    font-size: 0.83rem;
    color: #374151;
    text-decoration: none;
    transition: background 0.12s, color 0.12s;
  }
  .drawer-cat-list a:last-child { border-bottom: none; }
  .drawer-cat-list a:hover { background: #eaf6fb; color: #1e3a6e; }
  .drawer-cat-list a span.badge {
    font-size: 0.68rem;
    font-weight: 600;
    background: #eaf6fb;
    color: #0077b6;
    border-radius: 9999px;
    padding: 0.15rem 0.55rem;
  }

  /* Filter tags in drawer (same as filter-btn style but larger touch targets) */
  .drawer-filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.45rem;
  }
  .drawer-filter-tag {
    padding: 0.45rem 0.85rem;
    border: 1px solid #c8dce8;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
    color: #1e3a6e;
    background: #fff;
    cursor: pointer;
    transition: all 0.15s;
    letter-spacing: 0.04em;
    user-select: none;
  }
  .drawer-filter-tag:hover,
  .drawer-filter-tag.active {
    background: #1e3a6e;
    color: #fff;
    border-color: #1e3a6e;
  }
</style>

{{-- ─── Page Header ─── --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">News &amp; Updates</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">News &amp; Updates</span>
    </div>
  </div>
</div>

{{-- ─── Mobile Filter Drawer ─── --}}
<div id="drawer-overlay"></div>

<div id="mobile-filter-drawer" role="dialog" aria-modal="true" aria-label="Filters">
  {{-- Sticky Header --}}
  <div class="drawer-header">
    <h2>Search &amp; Filter</h2>
    <button class="drawer-back-btn" id="drawer-close-btn" aria-label="Close filters">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
      </svg>
      Back
    </button>
  </div>

  {{-- Drawer Body --}}
  <div class="drawer-body">

    {{-- Search --}}
    <div>
      <div class="drawer-section-title">Search News</div>
      <div class="drawer-search-wrap">
        <input type="text" placeholder="Search news..." id="drawer-search-input" />
        <button aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242 1.398a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
          </svg>
        </button>
      </div>
    </div>

    {{-- Quick Filter Tags --}}
    <div>
      <div class="drawer-section-title">Filter by Topic</div>
      <div class="drawer-filter-tags">
        <button class="drawer-filter-tag active" data-category="all">All News</button>
        <button class="drawer-filter-tag" data-category="biosciences">BioSciences</button>
        <button class="drawer-filter-tag" data-category="medtech">MedTech</button>
        <button class="drawer-filter-tag" data-category="calibration">Calibration</button>
        <button class="drawer-filter-tag" data-category="partnerships">Partnerships</button>
        <button class="drawer-filter-tag" data-category="health-systems">Health Systems</button>
        <button class="drawer-filter-tag" data-category="quality">Quality &amp; Compliance</button>
      </div>
    </div>

    {{-- Categories --}}
    <div>
      <div class="drawer-section-title">Categories</div>
      <div class="drawer-cat-list">
        <a href="#">MedTech Solutions <span class="badge">24</span></a>
        <a href="#">BioSciences <span class="badge">18</span></a>
        <a href="#">Calibration &amp; Metrology <span class="badge">15</span></a>
        <a href="#">Health Systems Advisory <span class="badge">20</span></a>
        <a href="#">Quality &amp; Compliance <span class="badge">12</span></a>
        <a href="#">Partnerships <span class="badge">10</span></a>
        <a href="#">Digital Health <span class="badge">9</span></a>
        <a href="#">Regional Coverage <span class="badge">8</span></a>
        <a href="#">Awards &amp; Recognition <span class="badge">6</span></a>
        <a href="#">Company News <span class="badge">14</span></a>
      </div>
    </div>

  </div>
</div>

{{-- ─── Main Layout ─── --}}
<div class="max-w-7xl mx-auto px-4 py-10 bg-[#f5f8fc] min-h-[80vh]">
  <div class="flex flex-col lg:flex-row gap-8">

    {{-- ── LEFT: News List ── --}}
    <main class="flex-1 min-w-0">

      {{-- "All Filters" trigger (mobile only) + Filter tabs --}}
      <div class="mb-7">

        {{-- Mobile: All Filters button — shown above tabs on small screens --}}
        <button
          id="all-filters-btn"
          aria-label="Open all filters"
          class="mb-3 items-center gap-2 px-4 py-2 bg-[#1e3a6e] text-white text-xs font-semibold tracking-wider uppercase rounded transition-colors hover:bg-[#00a0c6] cursor-pointer border-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16" class="inline-block -mt-0.5 mr-1">
            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
          </svg>
          All Filters &amp; Categories →
        </button>

        {{-- Filter tabs (always visible) --}}
        <div class="flex flex-wrap gap-2">
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">All News</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">BioSciences</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">MedTech</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">Calibration</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">Partnerships</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">Health Systems</button>
          <button class="filter-btn px-3.5 py-1.5 border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#1e3a6e] hover:text-white hover:border-[#1e3a6e] tracking-wide">Quality &amp; Compliance</button>
        </div>
      </div>

      {{-- News Cards --}}
      <div class="flex flex-col gap-5">

        {{-- Card 1 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-1">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=440" alt="Laboratory Equipment" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">MedTech</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">17 February 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors group-hover:text-[#00a0c6]">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">New Laboratory Equipment Shipment Arrives at County Hospital</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Genyra Group successfully deployed state-of-the-art laboratory equipment to enhance diagnostic capabilities and improve patient care outcomes across the region.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

        {{-- Card 2 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-2">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=440" alt="Digital Health" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">Health Systems</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">10 February 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">Integrated HIS/LIS Successfully Deployed Across 300-Bed Hospital Network</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Genyra Group completed the rollout of a fully integrated Health Information System and Laboratory Information System for a major hospital network, improving operational efficiency and data management.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

        {{-- Card 3 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-3">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/4225880/pexels-photo-4225880.jpeg?auto=compress&cs=tinysrgb&w=440" alt="Calibration" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">Calibration</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">3 February 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">Genyra Metrology Lab Achieves ISO/IEC 17025:2017 Accreditation Renewal</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Our calibration laboratory has successfully renewed its ISO/IEC 17025:2017 accreditation, reinforcing our commitment to precision measurement and NIST/UKAS-traceable calibration services across East Africa.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

        {{-- Card 4 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-4">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/40568/medical-appointment-doctor-healthcare-40568.jpeg?auto=compress&cs=tinysrgb&w=440" alt="ISO Certification" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">Quality &amp; Compliance</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">27 January 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">Genyra Group Attains ISO 13485:2016 Certification for Medical Devices Quality Management</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Genyra Group has been awarded ISO 13485:2016 certification, underscoring its rigorous quality management systems for medical devices and reinforcing its trusted position as a healthcare solutions provider.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

        {{-- Card 5 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-5">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=440" alt="BioSciences" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">BioSciences</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">20 January 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">Genyra BioSciences Supports KEMRI in Translational Research Sample Analysis Initiative</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Genyra BioSciences partnered with KEMRI to deliver advanced laboratory testing and translational research support, contributing to improved public health surveillance capacity in Kenya.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

        {{-- Card 6 --}}
        <div class="grid grid-cols-1 sm:grid-cols-[220px_1fr] gap-0 bg-white rounded overflow-hidden shadow-[0_1px_4px_rgba(0,0,0,0.07)] transition-all duration-300 border-l-3 border-l-transparent hover:shadow-[0_8px_28px_rgba(30,58,110,0.13)] hover:-translate-y-0.5 hover:border-l-[#00a0c6] animate-fade-up animate-delay-6">
          <div class="overflow-hidden">
            <img src="https://images.pexels.com/photos/3786126/pexels-photo-3786126.jpeg?auto=compress&cs=tinysrgb&w=440" alt="Lab Setup" class="w-full h-40 object-cover block transition-transform duration-400 hover:scale-105" />
          </div>
          <div class="p-5 flex flex-col justify-between">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <span class="inline-block text-[0.65rem] font-semibold tracking-wider uppercase text-[#00a0c6] py-0.5 border-b-[1.5px] border-[#00a0c6]">Partnerships</span>
                <span class="text-[0.72rem] text-[#6b7280] font-normal">10 January 2026</span>
              </div>
              <h2 class="text-xl font-semibold leading-6 text-[#1e3a6e] mb-2 transition-colors">
                <a href="#" class="no-underline text-inherit hover:text-[#00a0c6] transition-colors">Complete Turn-Key Laboratory Setup Delivered for Level 5 County Referral Hospital</a>
              </h2>
              <p class="text-sm text-[#6b7280] leading-relaxed font-normal line-clamp-2">
                Genyra Group completed a comprehensive turn-key laboratory setup covering equipment supply, installation, staff training, and ongoing maintenance support for a Level 5 County Referral Hospital.
              </p>
            </div>
            <div class="mt-3">
              <a href="{{ route('news.readmore') }}" class="text-xs font-semibold text-[#00a0c6] tracking-wider uppercase inline-flex items-center gap-1 no-underline transition-all hover:gap-2 hover:text-[#0077b6]">
                Read more <span>→</span>
              </a>
            </div>
          </div>
        </div>

      </div>{{-- /news cards --}}

      {{-- Pagination --}}
      <div class="flex items-center gap-1 mt-8">
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6] [&.active]:bg-[#00a0c6] [&.active]:text-white [&.active]:border-[#00a0c6] active">1</button>
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">2</button>
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">3</button>
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">4</button>
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">5</button>
        <span class="px-2 text-sm text-[#9ca3af]">…</span>
        <button class="page-btn w-[34px] h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-[0.8rem] font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">10</button>
        <button class="page-btn px-3.5 h-[34px] flex items-center justify-center border border-[#c8dce8] rounded text-xs font-medium cursor-pointer transition-all text-[#1e3a6e] bg-white hover:bg-[#00a0c6] hover:text-white hover:border-[#00a0c6]">Next ›</button>
      </div>

    </main>

    {{-- ── RIGHT: Sidebar (desktop only) ── --}}
    <aside class="hidden lg:flex w-64 flex-shrink-0 flex-col gap-5">

      {{-- Search --}}
      <div class="border-[1.5px] border-[#c8dce8] rounded flex overflow-hidden transition-colors bg-white focus-within:border-[#00a0c6]">
        <input type="text" placeholder="Search news..." class="flex-1 px-3 py-2 text-[12px] border-none outline-none bg-transparent text-black placeholder:text-[#bbb]" />
        <button class="bg-[#1e3a6e] text-white border-none px-3.5 cursor-pointer transition-colors hover:bg-[#00a0c6] flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="flex-shrink-0">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242 1.398a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z"/>
          </svg>
        </button>
      </div>

      {{-- Categories --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] overflow-hidden">
        <div class="bg-[#1e3a6e] text-white text-[0.78rem] font-semibold tracking-wider uppercase px-4 py-2.5 border-b-3 border-[#00a0c6]">Categories</div>
        <div>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>MedTech Solutions</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">24</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>BioSciences</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">18</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Calibration &amp; Metrology</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">15</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Health Systems Advisory</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">20</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Quality &amp; Compliance</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">12</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Partnerships</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">10</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Digital Health</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">9</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Regional Coverage</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">8</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Awards &amp; Recognition</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">6</span>
          </a>
          <a href="#" class="flex justify-between items-center px-4 py-2 border-b border-[#f0f4f8] text-[0.82rem] font-normal text-[#374151] cursor-pointer transition-all no-underline hover:bg-[#eaf6fb] hover:text-[#1e3a6e] last:border-b-0">
            <span>Company News</span><span class="text-[0.7rem] font-medium bg-[#eaf6fb] text-[#0077b6] rounded-full px-2 py-0.5">14</span>
          </a>
        </div>
      </div>

      {{-- Quick Contact --}}
      <div class="bg-white rounded shadow-[0_1px_4px_rgba(0,0,0,0.07)] overflow-hidden">
        <div class="bg-[#1e3a6e] text-white text-[0.78rem] font-semibold tracking-wider uppercase px-4 py-2.5 border-b-3 border-[#00a0c6]">Quick Contact</div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M3.654 1.328a.678.678 0 0 1 .736-.093l2.522 1a.678.678 0 0 1 .39.608v2.517a.678.678 0 0 1-.252.546L5.347 7.659a11.042 11.042 0 0 0 5.292 5.292l1.874-1.874a.678.678 0 0 1 .546-.252h2.517a.678.678 0 0 1 .608.39l1 2.522a.678.678 0 0 1-.093.736l-2.457 2.457c-.26.26-.67.36-1.02.24C4.567 13.281-.281 8.433-.04 3.707c.12-.35.32-.66.615-.952L3.654 1.328z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Telephone</div>
            <a href="tel:+254705435438" class="text-[#1e3a6e] no-underline font-medium block hover:text-[#00a0c6] transition-colors">+254 705 435 438</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">General</div>
            <a href="mailto:info@genyragroup.com" class="text-[#1e3a6e] no-underline font-medium block hover:text-[#00a0c6] transition-colors">info@genyragroup.com</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Sales</div>
            <a href="mailto:sales@genyragroup.com" class="text-[#1e3a6e] no-underline font-medium block hover:text-[#00a0c6] transition-colors">sales@genyragroup.com</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Support</div>
            <a href="mailto:support@genyragroup.com" class="text-[#1e3a6e] no-underline font-medium block hover:text-[#00a0c6] transition-colors">support@genyragroup.com</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm13.293-.707A1 1 0 0 0 12.586 4L8.707 7.879a1 1 0 0 1-1.414 0L3.414 4A1 1 0 1 0 .707 5.707l3.999 3.999a3 3 0 0 0 4.242 0l3.999-3.999z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Calibration</div>
            <a href="mailto:calibration@genyragroup.com" class="text-[#1e3a6e] no-underline font-medium block hover:text-[#00a0c6] transition-colors">calibration@genyragroup.com</a>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M8 0a5 5 0 0 0-5 5c0 3.086 4.167 10.24 4.667 10.927a1 1 0 0 0 1.666 0C8.833 15.24 13 8.086 13 5a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 .001-3.999A2 2 0 0 1 8 7z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Head Office</div>
            <span>P.O. Box 43844, 00100<br>Nairobi, Kenya</span>
          </div>
        </div>

        <div class="flex items-start gap-2.5 px-4 py-2 border-b border-[#f0f4f8] text-[0.8rem] text-[#374151] leading-relaxed">
          <div class="flex-shrink-0 w-7 h-7 bg-[#eaf6fb] rounded-full flex items-center justify-center mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-[#1e3a6e]">
              <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm.5 3a.5.5 0 0 1 .5.5v3h3a.5.5 0 1 1 0 1h-3v3a.5.5 0 1 1-1 0v-3h-3a.5.5 0 1 1 0-1h3v-3a.5.5 0 0 1 .5-.5z"/>
            </svg>
          </div>
          <div>
            <div class="text-[0.68rem] font-semibold tracking-wider uppercase text-[#6b7280] mb-0.5">Business Hours</div>
            <span>Mon–Fri: 8:00 AM – 5:00 PM</span><br>
            <span class="text-[#6b7280] text-xs">Sat: 9:00 AM – 1:00 PM &nbsp;|&nbsp; Sun: Closed</span>
          </div>
        </div>

        <div class="p-3 px-4">
          <a href="{{ url('/#contact') }}" class="block text-center px-2 py-2 text-[0.72rem] font-semibold tracking-wider uppercase text-white bg-[#1e3a6e] rounded no-underline transition-colors hover:bg-[#00a0c6]">
            Send Us a Message →
          </a>
        </div>
      </div>

    </aside>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {

    // ── Drawer open/close ──
    const drawer    = document.getElementById('mobile-filter-drawer');
    const overlay   = document.getElementById('drawer-overlay');
    const openBtn   = document.getElementById('all-filters-btn');
    const closeBtn  = document.getElementById('drawer-close-btn');

    function openDrawer() {
      drawer.classList.add('open');
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
      // Focus search input for accessibility
      setTimeout(() => {
        const inp = document.getElementById('drawer-search-input');
        if (inp) inp.focus();
      }, 350);
    }

    function closeDrawer() {
      drawer.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }

    if (openBtn)  openBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (overlay)  overlay.addEventListener('click', closeDrawer);

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeDrawer();
    });

    // ── Drawer filter tags: sync active state with main filter tabs ──
    const drawerTags  = document.querySelectorAll('.drawer-filter-tag');
    const mainBtns    = document.querySelectorAll('.filter-btn');

    drawerTags.forEach(tag => {
      tag.addEventListener('click', () => {
        drawerTags.forEach(t => t.classList.remove('active'));
        tag.classList.add('active');

        // Mirror selection on main tabs if label matches
        const label = tag.textContent.trim().toLowerCase();
        mainBtns.forEach(btn => {
          const btnLabel = btn.textContent.trim().toLowerCase();
          btn.classList.toggle('active', btnLabel === label || (label === 'all news' && btnLabel === 'all news'));
        });

        // Close drawer after a short delay so user sees selection
        setTimeout(closeDrawer, 260);
      });
    });

    // ── Main filter tab active state ──
    const firstFilterBtn = document.querySelector('.filter-btn');
    if (firstFilterBtn) firstFilterBtn.classList.add('active');

    mainBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        mainBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Mirror to drawer tags
        const label = btn.textContent.trim().toLowerCase();
        drawerTags.forEach(tag => {
          tag.classList.toggle('active', tag.textContent.trim().toLowerCase() === label);
        });
      });
    });

    // ── Pagination active state ──
    document.querySelectorAll('.page-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        if (btn.textContent.trim() === 'Next ›') return;
        document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });

  });
</script>

@endsection