@extends('web.app')

@section('title', 'Board Of Directors')
@section('meta_description', 'Meet the genyra Group board of directors providing governance, strategic oversight, and leadership across our healthcare and medtech operations in East Africa.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Board of Directors', 'url' => route('directors')],
    ],
])
@endpush

@php
$executiveDirectors = [
    [
        'role' => 'Chairman',
        'name' => 'David Masinde',
        'credentials' => '',
        'bio' => 'Experienced NGO leader with expertise in managing donor-funded programs (USAID, EU, ECHO, BMZ, ADA, among others) and leading teams of 600+ staff. Skilled in resource mobilization, stakeholder engagement, and organizational leadership, with a strong track record of building partnerships and driving impact in the development sector.',
        'photo' => 'images/directors/david.jpg',
    ],
];

$boardMembers = [
    [
        'role' => 'Board Member',
        'name' => 'Mr. Benjamin Kioko Mbithi',
        'credentials' => 'MPH, Public Health (Makerere University) · BSc, Medical Laboratory Science (University of Eastern Africa, Baraton)',
        'bio' => 'Mr. Benjamin Kioko Mbithi is a seasoned public health and humanitarian development professional with over a decade of progressive experience in programme management, grant acquisition, research, and institutional capacity strengthening across South Sudan. He holds a Bachelor of Science in Medical Laboratory Science and a Master of Public Health, and currently serves as Health and Grants Manager at Touch Africa Development Organization (TADO), where he leads proposal development, grant compliance, donor engagement, and programme oversight. Mr. Mbithi has successfully mobilized and managed multi-million-dollar grants from leading development partners, including GAVI, UNOCHA, IOM, Caritas Luxembourg, UNICEF, and the European Union, while providing strategic consultancy in health systems strengthening, disability inclusion, monitoring and evaluation, policy development, and organizational strategy. His extensive regional networks, expertise in humanitarian programming, grant management, and institutional development make him a valuable addition to the Genyra Group Board of Directors, where he will provide strategic oversight, strengthen partnerships, guide business development, and support the organization\'s expansion across East Africa and beyond.',
        'photo' => 'images/directors/benjamin.jpeg',
    ],
    [
        'role' => 'Board Member',
        'name' => 'Dr. Filex Otieno',
        'credentials' => '',
        'bio' => 'A public health physician and health systems specialist with experience working with the Ministry of Health, WHO, and international NGOs. Guides genyra\'s Health Systems Advisory division with strong policy expertise.',
        'photo' => 'images/directors/dr-filex-odhiambo.jpg.jpeg',
    ],
    [
        'role' => 'Board Member',
        'name' => 'Ms. Zabib Musa Loro',
        'credentials' => 'BSc, Human Resource Management · Diplomas in Development Studies, Gender Studies, Islamic Studies & Leadership',
        'bio' => 'Executive Director of Women for Justice and Equality (WOJE), with over a decade of leadership in gender programming, human rights advocacy, and HIV/AIDS response across South Sudan and Eastern Africa. A 2025 US International Women of Courage Award recipient, she brings deep expertise in community health programming and regional advocacy networks, strengthening genyra\'s commitment to equitable, people-centered healthcare delivery.',
        'photo' => 'images/directors/zabibloro.jpeg',
    ],
    [
        'role' => 'Board Member',
        'name' => 'Dr. Damary Okwako',
        'credentials' => 'PhD in Strategic Management (MMUST) · MBA, Strategic Planning (University of Nairobi) · BEd (Kenyatta University)',
        'bio' => 'A strategic management scholar and lecturer at Masinde Muliro University of Science and Technology (MMUST), with published research on how strategic planning practices influence organizational performance. Brings academic rigor and strategic planning expertise to support genyra\'s long-term institutional direction and governance practices.',
        'photo' => 'images/directors/damary.jpeg',
    ],
    // [
    //     'role' => 'Board Member',
    //     'name' => 'Ms. Rhodah N. Mukopi',
    //     'credentials' => '',
    //     'bio' => 'Leads genyra Group\'s overall strategy and operations with a focus on innovation, quality, and regional growth. With a background spanning biomedical engineering and executive management, instrumental in positioning genyra as East Africa\'s most trusted healthcare solutions partner.',
    //     'photo' => 'images/directors/Rhoda.jpeg',
    // ],
];
$executiveDirectorsForModal = array_map(function ($director) {
    return [
        'role' => $director['role'],
        'name' => $director['name'],
        'credentials' => $director['credentials'],
        'bio' => $director['bio'],
        'photo' => $director['photo'] ? asset($director['photo']) : null,
    ];
}, $executiveDirectors);
$boardMembersForModal = array_map(function ($director) {
    return [
        'role' => $director['role'],
        'name' => $director['name'],
        'credentials' => $director['credentials'],
        'bio' => $director['bio'],
        'photo' => $director['photo'] ? asset($director['photo']) : null,
    ];
}, $boardMembers);
@endphp

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body, * { font-family: 'Montserrat', sans-serif !important; }
  .director-flip { perspective: 1400px; }
  .director-flip__inner {
    position: relative;
    aspect-ratio: 3 / 3.7;
    transform-style: preserve-3d;
    transition: transform 0.7s cubic-bezier(.4, .2, .2, 1);
  }
  .director-flip:hover .director-flip__inner,
  .director-flip:focus-within .director-flip__inner,
  .director-flip.is-flipped .director-flip__inner { transform: rotateY(180deg); }
  .director-flip__face {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background: #1c1c1c;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
  }
  .director-flip__back { transform: rotateY(180deg); }
  .director-flip__face img,
  .director-flip__placeholder {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 18%;
  }
  .director-flip__placeholder { background: #d5dde6; }
  .director-flip__caption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 4.5rem 1.15rem 1.15rem;
    background: linear-gradient(to top, rgba(0,0,0,0.82) 0%, rgba(0,0,0,0.42) 48%, rgba(0,0,0,0) 100%);
    color: #fff;
  }
  .director-flip__caption h3,
  .director-flip__shade h3 {
    margin: 0 0 0.3rem;
    color: #fff;
    font-size: 0.98rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    line-height: 1.25;
    text-transform: uppercase;
  }
  .director-flip__caption p,
  .director-flip__role {
    margin: 0;
    color: #fff;
    font-size: 0.78rem;
    font-weight: 400;
    line-height: 1.35;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .director-flip__shade {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding: 1.6rem 1.25rem 1.25rem;
    background: rgba(18, 18, 18, 0.72);
    color: #fff;
  }
  .director-flip__bio {
    margin: 0.95rem 0 1.1rem;
    color: #fff;
    font-size: 0.86rem;
    line-height: 1.45;
    display: -webkit-box;
    -webkit-line-clamp: 6;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .director-flip__more {
    align-self: flex-start;
    margin-top: auto;
    padding: 0;
    border: 0;
    background: transparent;
    color: #fff;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    cursor: pointer;
  }
  .director-flip__more:hover { color: #b3e8f5; }
  @media (prefers-reduced-motion: reduce) {
    .director-flip__inner { transition: none; }
  }
  #director-modal { transition: opacity 0.2s ease; }
  #director-modal.director-modal-open { opacity: 1; pointer-events: auto; }
  #director-modal.director-modal-open #director-modal-panel { transform: scale(1); opacity: 1; }
  body.director-modal-active { overflow: hidden; }
</style>

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Board of Directors</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Board of Directors</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-10">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-2">Corporate Governance</p>
    <h2 class="text-xl font-bold text-[#1e3a6e] mb-3">Leadership &amp; Oversight</h2>
    <p class="text-sm text-[#4b5563] leading-relaxed max-w-3xl">
      genyra Group is governed by a board of experienced professionals committed to ethical leadership, strategic oversight, and delivering lasting value to healthcare systems across East Africa. The board provides guidance, accountability, and strategic direction to the executive management team.
    </p>
  </div>

  {{-- Executive Board --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Executive Board</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-6">
      @foreach($executiveDirectors as $director)
        @include('web.partials.director-flip-card', ['director' => $director, 'group' => 'executive', 'index' => $loop->index])
      @endforeach
    </div>
  </div>

  {{-- Board Members --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Board Members</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-6">
      @foreach($boardMembers as $director)
        @include('web.partials.director-flip-card', ['director' => $director, 'group' => 'board', 'index' => $loop->index])
      @endforeach
    </div>
  </div>

</div>
</div>

{{-- Profile Modal --}}
<div id="director-modal"
     class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6 opacity-0 pointer-events-none"
     role="dialog"
     aria-modal="true"
     aria-labelledby="director-modal-name"
     aria-hidden="true">
  <div id="director-modal-backdrop" class="absolute inset-0 bg-[#1e3a6e]/70 backdrop-blur-sm"></div>
  <div id="director-modal-panel"
       class="relative bg-white rounded-xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition-all duration-200 flex flex-col">
    <div class="h-1.5 bg-[#00a0c6] flex-shrink-0"></div>
    <button type="button"
            id="director-modal-close"
            class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-white/90 text-[#1e3a6e] shadow-md flex items-center justify-center hover:bg-[#00a0c6] hover:text-white transition-colors"
            aria-label="Close profile">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg>
    </button>
    <div class="overflow-y-auto flex-1">
      <div class="flex flex-col md:flex-row md:min-h-[420px]">
        <div id="director-modal-photo-wrap" class="md:w-2/5 lg:w-[42%] bg-[#eaf6fb] flex-shrink-0 flex items-center justify-center p-4">
          <img id="director-modal-photo" src="" alt="" class="w-full max-h-72 md:max-h-none md:h-full md:min-h-[400px] object-contain object-center hidden">
          <div id="director-modal-placeholder" class="w-full h-56 md:min-h-[400px] flex flex-col items-center justify-center gap-3 hidden">
            <div class="w-24 h-24 rounded-full bg-[#c8dce8] flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#1e3a6e" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </div>
            <p class="text-[0.75rem] text-[#94a3b8] tracking-wide">Photo</p>
          </div>
        </div>
        <div class="md:w-3/5 lg:w-[58%] p-6 sm:p-8 border-t md:border-t-0 md:border-l-4 border-[#00a0c6] overflow-y-auto max-h-[70vh] md:max-h-none">
          <p id="director-modal-role" class="text-[0.65rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-2"></p>
          <h2 id="director-modal-name" class="text-2xl font-bold text-[#1e3a6e] leading-tight mb-3 pr-8"></h2>
          <p id="director-modal-credentials" class="text-[0.85rem] text-[#6b7280] italic mb-5 hidden"></p>
          <div class="border-t border-[#f0f4f8] pt-5">
            <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-[#1e3a6e] mb-3">Profile</p>
            <p id="director-modal-bio" class="text-[0.9rem] text-[#4b5563] leading-relaxed"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const profileGroups = {
    executive: @json($executiveDirectorsForModal),
    board: @json($boardMembersForModal),
  };
  const modal = document.getElementById('director-modal');
  const backdrop = document.getElementById('director-modal-backdrop');
  const closeBtn = document.getElementById('director-modal-close');
  const photoEl = document.getElementById('director-modal-photo');
  const placeholderEl = document.getElementById('director-modal-placeholder');
  const roleEl = document.getElementById('director-modal-role');
  const nameEl = document.getElementById('director-modal-name');
  const credentialsEl = document.getElementById('director-modal-credentials');
  const bioEl = document.getElementById('director-modal-bio');

  function openDirectorModal(director) {
    if (!director) return;

    roleEl.textContent = director.role || '';
    nameEl.textContent = director.name || '';
    bioEl.textContent = director.bio || '';

    if (director.credentials) {
      credentialsEl.textContent = director.credentials;
      credentialsEl.classList.remove('hidden');
    } else {
      credentialsEl.textContent = '';
      credentialsEl.classList.add('hidden');
    }

    if (director.photo) {
      photoEl.src = director.photo;
      photoEl.alt = director.name || 'Director photo';
      photoEl.classList.remove('hidden');
      placeholderEl.classList.add('hidden');
    } else {
      photoEl.removeAttribute('src');
      photoEl.classList.add('hidden');
      placeholderEl.classList.remove('hidden');
    }

    modal.classList.add('director-modal-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('director-modal-active');
    closeBtn.focus();
  }

  function closeDirectorModal() {
    modal.classList.remove('director-modal-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('director-modal-active');
  }

  document.querySelectorAll('.view-director-profile').forEach(function (btn) {
    btn.addEventListener('click', function (event) {
      event.stopPropagation();
      const group = btn.getAttribute('data-director-group');
      const index = parseInt(btn.getAttribute('data-director-index'), 10);
      const profiles = profileGroups[group];
      if (profiles && profiles[index] !== undefined) {
        openDirectorModal(profiles[index]);
      }
    });
  });

  document.querySelectorAll('.director-flip').forEach(function (card) {
    card.addEventListener('click', function (event) {
      if (event.target.closest('.view-director-profile')) return;
      if (window.matchMedia('(hover: none)').matches) {
        card.classList.toggle('is-flipped');
      }
    });
  });

  closeBtn.addEventListener('click', closeDirectorModal);
  backdrop.addEventListener('click', closeDirectorModal);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('director-modal-open')) {
      closeDirectorModal();
    }
  });
});
</script>

@endsection
