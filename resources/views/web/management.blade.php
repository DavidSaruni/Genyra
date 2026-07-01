@extends('web.app')

@section('title', 'Management Team')
@section('meta_description', 'Explore the genyra Group management team leading MedTech, BioSciences, health systems advisory, metrology, and corporate operations across East Africa.')

@push('structured_data')
@include('web.partials.seo.breadcrumb-structured-data', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Management Team', 'url' => route('management')],
    ],
])
@endpush

@php
$technicalLeads = [
    [
        'title' => 'Webmaster',
        'division' => '',
        'color' => '#1e3a6e',
        'name' => 'Layton Matheka',
        'credentials' => 'Degree in Computer Science',
        'bio' => 'Layton Matheka serves as Webmaster at genyra Group, where he leads the development, maintenance, and continuous improvement of the organisation\'s digital platforms. Holding a degree in Computer Science, he brings a strong foundation in software engineering, web technologies, and information systems to support genyra\'s growing online presence across East Africa. His responsibilities span website architecture, content management, performance optimisation, cybersecurity, and user experience design, ensuring that every digital touchpoint reflects the professionalism and credibility of the group. Layton works closely with leadership and communications teams to keep the website accurate, accessible, and aligned with genyra\'s mission to transform healthcare delivery through innovation in MedTech, laboratory sciences, health systems advisory, and metrology. He is committed to building reliable, scalable digital infrastructure that strengthens stakeholder engagement, supports business development, and helps genyra reach healthcare partners, institutions, and communities across the region.',
        'photo' => 'images/management/layton.jpeg',
    ],
    [
        'title' => 'Technical Lead',
        'division' => 'MedTech Solutions',
        'color' => '#e07b2a',
        'name' => null,
        'credentials' => null,
        'bio' => 'Smart technologies for better health outcomes.',
        'photo' => null,
    ],
    [
        'title' => 'Technical Lead',
        'division' => 'Health Systems Planning & Advisory',
        'color' => '#5b7fa6',
        'name' => null,
        'credentials' => null,
        'bio' => 'Designing resilient, compliant health systems.',
        'photo' => null,
    ],
    [
        'title' => 'Technical Lead',
        'division' => 'Metrology & Calibration Services',
        'color' => '#7b5ea7',
        'name' => null,
        'credentials' => null,
        'bio' => 'Precision you can trust.',
        'photo' => null,
    ],
];

$functionalManagers = [
  ['role' => 'Research & Development Manager',  'bio' => 'Leads innovation initiatives, product validation pipelines, and research collaborations across the group.'],
  ['role' => 'Product Engineering Manager',     'bio' => 'Manages engineering design, product development, and technical delivery across our MedTech portfolio.'],
  ['role' => 'Strategic Consulting Manager',    'bio' => 'Oversees health systems advisory engagements, quality management programmes, and regulatory readiness projects.'],
  ['role' => 'Laboratory Services Manager',     'bio' => 'Heads calibration laboratory operations, equipment audits, measurement verification, and ISO/IEC 17025 compliance.'],
];

$technicalLeadsForModal = array_map(function ($lead) {
    $role = $lead['title'];
    if ($lead['division']) {
        $role .= ' · ' . $lead['division'];
    }
    return [
        'role' => $role,
        'name' => $lead['name'] ?? 'Name Here',
        'credentials' => $lead['credentials'],
        'bio' => $lead['bio'],
        'photo' => $lead['photo'] ? asset($lead['photo']) : null,
    ];
}, $technicalLeads);

$functionalManagersForModal = array_map(function ($manager) {
    return [
        'role' => $manager['role'],
        'name' => 'Name Here',
        'credentials' => 'Qualifications Here',
        'bio' => $manager['bio'],
        'photo' => null,
    ];
}, $functionalManagers);
@endphp

@section('body')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body, * { font-family: 'Inter', sans-serif !important; }
  .team-card { transition: all 0.25s ease; }
  .team-card:hover { box-shadow: 0 8px 28px rgba(30,58,110,0.13); transform: translateY(-2px); }
  #director-modal { transition: opacity 0.2s ease; }
  #director-modal.director-modal-open { opacity: 1; pointer-events: auto; }
  #director-modal.director-modal-open #director-modal-panel { transform: scale(1); opacity: 1; }
  body.director-modal-active { overflow: hidden; }
</style>

{{-- Header --}}
<div class="mt-28 bg-[#1e3a6e] border-b-4 border-[#00a0c6] px-6 py-7">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-[1.6rem] font-bold text-white tracking-tight m-0">Management Team</h1>
    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-white/50">
      <a href="{{ url('/') }}" class="text-white/60 hover:text-[#b3e8f5] transition-colors no-underline">Home</a>
      <span class="text-white/30">›</span>
      <span class="text-[#b3e8f5]">Management Team</span>
    </div>
  </div>
</div>

<div class="bg-[#f5f8fc] min-h-screen py-12 px-4">
<div class="max-w-7xl mx-auto space-y-10">

  {{-- Intro --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] px-8 py-7">
    <p class="text-[0.7rem] font-semibold tracking-[0.15em] uppercase text-[#00a0c6] mb-2">The People Behind Our Work</p>
    <h2 class="text-xl font-bold text-[#1e3a6e] mb-3">Experienced. Dedicated. Expert.</h2>
    <p class="text-sm text-[#4b5563] leading-relaxed max-w-3xl">
      genyra Group's management team brings together specialists across biomedical engineering, laboratory sciences, health systems, metrology, finance, and research united by a shared commitment to transforming healthcare delivery across East Africa.
    </p>
  </div>

  {{-- ── Technical Leads ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Technical Leadership</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-6">
      @foreach($technicalLeads as $lead)
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col">
        <div class="h-1.5" style="background:{{ $lead['color'] }}"></div>
        <div class="{{ $lead['photo'] ? 'h-auto sm:h-44' : 'h-44' }} flex flex-col items-center justify-center gap-2 flex-shrink-0 overflow-hidden" style="background:{{ $lead['color'] }}14">
          @if($lead['photo'])
            <img src="{{ asset($lead['photo']) }}" alt="{{ $lead['name'] }}" class="w-full h-auto sm:h-full object-cover object-top block">
          @else
          <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background:{{ $lead['color'] }}35">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="{{ $lead['color'] }}" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </div>
          <p class="text-[0.65rem] tracking-wide" style="color:{{ $lead['color'] }}99">Photo</p>
          @endif
        </div>
        <div class="px-5 py-5 flex flex-col flex-1">
          <p class="text-[0.6rem] font-semibold tracking-widest uppercase mb-0.5" style="color:{{ $lead['color'] }}">{{ $lead['title'] }}</p>
          @if($lead['division'])
          <p class="text-[0.66rem] font-medium text-[#6b7280] uppercase tracking-wide mb-1">{{ $lead['division'] }}</p>
          @endif
          <h3 class="font-bold text-[#1e3a6e] text-[0.9rem]">{{ $lead['name'] ?? 'Name Here' }}</h3>
          <p class="text-[0.72rem] text-[#6b7280] italic mt-0.5 mb-4">{{ $lead['credentials'] ?? 'Qualifications Here' }}</p>
          <button type="button"
            class="view-team-profile mt-auto inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-[#1e3a6e] text-white text-[0.8rem] font-semibold rounded hover:bg-[#00a0c6] transition-colors"
            data-profile-group="technical"
            data-profile-index="{{ $loop->index }}">
            View Profile
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
          </button>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ── Functional Managers ── --}}
  <div>
    <div class="bg-[#1e3a6e] rounded-t px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Functional Management</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-6">
      @foreach($functionalManagers as $manager)
      <div class="team-card bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden flex flex-col">
        <div class="h-1.5 bg-[#1e3a6e]"></div>
        <div class="h-auto min-h-44 sm:h-44 sm:min-h-0 bg-[#f1f5f9] flex flex-col items-center justify-center gap-2 flex-shrink-0 overflow-hidden">
          <div class="w-16 h-16 rounded-full bg-[#dde6f0] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#1e3a6e" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
          </div>
          <p class="text-[0.65rem] text-[#94a3b8] tracking-wide">Photo</p>
        </div>
        <div class="px-5 py-5 flex flex-col flex-1">
          <p class="text-[0.6rem] font-semibold tracking-widest uppercase text-[#00a0c6] mb-1">{{ $manager['role'] }}</p>
          <h3 class="font-bold text-[#1e3a6e] text-[0.9rem]">Name Here</h3>
          <p class="text-[0.72rem] text-[#6b7280] italic mt-0.5 mb-4">Qualifications Here</p>
          <button type="button"
            class="view-team-profile mt-auto inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-[#1e3a6e] text-white text-[0.8rem] font-semibold rounded hover:bg-[#00a0c6] transition-colors"
            data-profile-group="functional"
            data-profile-index="{{ $loop->index }}">
            View Profile
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
          </button>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ── Corporate Shared Services (department strip no individuals) ── --}}
  <div class="bg-white rounded shadow-[0_1px_6px_rgba(0,0,0,0.08)] overflow-hidden">
    <div class="bg-[#455a64] px-6 py-4 border-b-4 border-[#00a0c6]">
      <h2 class="text-white font-bold text-[0.95rem] tracking-wider uppercase m-0">Corporate Shared Services</h2>
      <p class="text-white/50 text-xs mt-0.5">Supporting all business divisions across the group</p>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 divide-y sm:divide-y-0 divide-x divide-[#f0f4f8]">
      @foreach([
        ['Finance & Accounting',       'fa-coins'],
        ['Human Resources',            'fa-users'],
        ['Information Technology',     'fa-server'],
        ['Legal & Compliance',         'fa-scale-balanced'],
        ['Marketing & Communications', 'fa-bullhorn'],
      ] as [$dept, $icon])
      <div class="px-4 py-5 text-center flex flex-col items-center gap-2">
        <div class="w-9 h-9 rounded-full bg-[#eaf6fb] flex items-center justify-center">
          <i class="fas {{ $icon }} text-[#1e3a6e] text-[0.75rem]"></i>
        </div>
        <p class="text-[#1e3a6e] font-semibold text-[0.75rem] leading-tight">{{ $dept }}</p>
      </div>
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
    technical: @json($technicalLeadsForModal),
    functional: @json($functionalManagersForModal),
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

  function openProfileModal(profile) {
    if (!profile) return;

    roleEl.textContent = profile.role || '';
    nameEl.textContent = profile.name || '';
    bioEl.textContent = profile.bio || '';

    if (profile.credentials) {
      credentialsEl.textContent = profile.credentials;
      credentialsEl.classList.remove('hidden');
    } else {
      credentialsEl.textContent = '';
      credentialsEl.classList.add('hidden');
    }

    if (profile.photo) {
      photoEl.src = profile.photo;
      photoEl.alt = profile.name || 'Team member photo';
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

  function closeProfileModal() {
    modal.classList.remove('director-modal-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('director-modal-active');
  }

  document.querySelectorAll('.view-team-profile').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const group = btn.getAttribute('data-profile-group');
      const index = parseInt(btn.getAttribute('data-profile-index'), 10);
      const profiles = profileGroups[group];
      if (profiles && profiles[index] !== undefined) {
        openProfileModal(profiles[index]);
      }
    });
  });

  closeBtn.addEventListener('click', closeProfileModal);
  backdrop.addEventListener('click', closeProfileModal);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('director-modal-open')) {
      closeProfileModal();
    }
  });
});
</script>

@endsection
