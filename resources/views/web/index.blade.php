@extends('web.app')

@section('title', 'genyra Group - Building Solutions | Transforming Healthcare')
@section('meta_description', 'genyra Group builds MedTech, BioSciences, calibration, and health systems solutions that transform healthcare delivery across East Africa.')

@section('body')


  <!-- Video Hero Section -->
  <section class="video-hero">
      <video class="video-background" autoplay muted playsinline id="heroVideo" preload="metadata" disablePictureInPicture></video>
    
      <div class="animated-bg" id="animatedBg"></div>
      
      <!-- Loading Spinner -->
      <div class="video-loading" id="videoLoading" style="display: none;">
          <div class="spinner"></div>
      </div>
      
      <!-- Overlay -->
      <div class="video-overlay"></div>
      
      <!-- Pause Button -->
      <div class="pause-btn" id="pauseBtn" style="display: none;">
          <svg id="pauseIcon" class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
          </svg>
          <svg id="playIcon" class="w-6 h-6 text-gray-800 hidden" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
          </svg>
      </div>
      
      <!-- Hero Content -->
<div class="hero-content absolute inset-0 flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full lg:mt-32">
        <div class="max-w-3xl fade-in-up">
            <div class="category-label mb-4">
                ENABLING HEALTHCARE INNOVATION
            </div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight">
                <span class="text-[#22235a]">Building Solutions</span> 
                <span class="text-white">Transforming</span>
                <span class="text-cyan-400">Healthcare</span>
            </h1>
            <blockquote class="mb-8 max-w-2xl">
                <p class="text-white/90 text-md md:text-md leading-relaxed mb-2">
                    &ldquo;Where there is no vision, the people perish: but he that keepeth the law, happy is he.&rdquo;
                </p>
                <cite class="text-cyan-300 text-sm not-italic font-medium tracking-wide">Proverbs 29:18</cite>
            </blockquote>
            <a href="#about" class="btn-primary">
                Learn more
            </a>
        </div>
    </div>
</div>
  </section>

  {{-- Holds scroll space while the video hero stays fixed behind --}}
  <div class="hero-scroll-spacer" aria-hidden="true"></div>

  {{-- Content panel slides up over the fixed hero --}}
  <div class="home-scroll-panel">

  <section class="hidden" id="small-hero-content">
    <div class="hero-content w-full py-12 px-4  flex items-center min-h-64 bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
              <div class="max-w-3xl fade-in-up">
                  <div class="category-label mb-4 text-gray-800">
                      ENABLING HEALTHCARE INNOVATION
                  </div>
                  <h1 class="text-3xl md:text-3xl md:text-4xl font-bold text-gray-700 mb-4 leading-tight">
                        <span class="text-[#22235a] font-extrabold">Building Solutions</span> <br>
                        <span class="text-gray-700 italic text-xl">Transforming Healthcare</span>
                  </h1>
                  <blockquote class="mb-6 max-w-2xl">
                      <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-1">
                          &ldquo;Where there is no vision, the people perish: but he that keepeth the law, happy is he.&rdquo;
                      </p>
                      <cite class="text-[#22235a] text-sm not-italic font-medium">Proverbs 29:18</cite>
                  </blockquote>
                  <a href="#about" class="btn-primary">
                      Learn more
                  </a>
              </div>
          </div>
      </div>
  </section>


  <!-- Strategic Business Units -->
  <section id="business-lines" class="what-we-do">
      <div class="wwd-banner" style="background-image: url('{{ asset('images/what_we_do.jpeg') }}');">
          <div class="wwd-banner__copy">
              <p class="wwd-banner__eyebrow">Our expertise</p>
              <h2 class="wwd-banner__title">What We Do</h2>
              <p class="wwd-banner__lead">Solutions that strengthen healthcare delivery, improve outcomes, and keep systems performing.</p>
              <a href="#contact" class="btn-primary">Get in touch</a>
          </div>
      </div>

      <div class="what-we-do__bleed">
          <div class="what-we-do__grid">
              <a href="{{ route('department.medical-supplies') }}" class="wwd-card">
                  <div class="wwd-card__body">
                      <div class="wwd-card__copy">
                          <span class="wwd-card__tag">Department 1</span>
                          <h3 class="wwd-card__title">Medical <br> Supplies</h3>
                      </div>
                      <span class="wwd-card__cta">Learn more <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <img class="wwd-card__image"
                       src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                       alt="Scientist working in a laboratory">
              </a>

              <a href="{{ route('department.medical-technologies') }}" class="wwd-card">
                  <div class="wwd-card__body">
                      <div class="wwd-card__copy">
                          <span class="wwd-card__tag">Department 2</span>
                          <h3 class="wwd-card__title">Medical <br> Technologies</h3>
                      </div>
                      <span class="wwd-card__cta">Learn more <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <img class="wwd-card__image"
                       src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                       alt="Medical technology in clinical use">
              </a>

              <a href="{{ route('department.strategic-planning') }}" class="wwd-card">
                  <div class="wwd-card__body">
                      <div class="wwd-card__copy">
                          <span class="wwd-card__tag">Department 3</span>
                          <h3 class="wwd-card__title">Strategic Planning & QMS</h3>
                      </div>
                      <span class="wwd-card__cta">Learn more <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <img class="wwd-card__image"
                       src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                       alt="Health systems planning discussion">
              </a>

              <a href="{{ route('department.metrology') }}" class="wwd-card">
                  <div class="wwd-card__body">
                      <div class="wwd-card__copy">
                          <span class="wwd-card__tag">Department 4</span>
                          <h3 class="wwd-card__title">Metrology, Calibration & Preventive Maintenance</h3>
                      </div>
                      <span class="wwd-card__cta">Learn more <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <img class="wwd-card__image"
                       src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                       alt="Precision laboratory instruments">
              </a>
          </div>
      </div>
  </section>



<!-- About Section -->
{{-- 
    About Section
    Logo colours used (swap if you want to fine-tune):
      Navy  #1b2a6b
      Cyan  #19a7e0
--}}
<section id="about" class="bg-white">

    {{-- ============ 1. Vision / Mission / Our Story cards ============ --}}
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-6 md:grid-cols-3">

            {{-- Vision --}}
            <a href="{{ route('vission-mission') }}"  
               class="group relative flex items-start gap-4 px-4 pt-4 pb-7 focus:outline-none">

                {{-- Hover line --}}
                <span class="pointer-events-none absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 bg-[#19a7e0]
                             transition-transform duration-300 ease-out
                             group-hover:scale-x-100 group-focus-visible:scale-x-100"></span>

                <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full
                             bg-[#19a7e0]/10 text-[#1b2a6b] transition-colors group-hover:bg-[#19a7e0] group-hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </span>
                <span>
                    <span class="block text-base font-semibold text-[#1b2a6b]">Our Vision</span>
                    <span class="mt-1 block text-sm leading-relaxed text-slate-600">
                        To be the most trusted and preferred partner for healthcare solutions in Africa.
                    </span>
                </span>
            </a>

            {{-- Mission --}}
            <a href="{{ route('vission-mission') }}" 
               class="group relative flex items-start gap-4 px-4 pt-4 pb-7 focus:outline-none">

                {{-- Hover line --}}
                <span class="pointer-events-none absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 bg-[#19a7e0]
                             transition-transform duration-300 ease-out
                             group-hover:scale-x-100 group-focus-visible:scale-x-100"></span>

                <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full
                             bg-[#19a7e0]/10 text-[#1b2a6b] transition-colors group-hover:bg-[#19a7e0] group-hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </span>
                <span>
                    <span class="block text-base font-semibold text-[#1b2a6b]">Our Mission</span>
                    <span class="mt-1 block text-sm leading-relaxed text-slate-600">
                        Delivering innovative, reliable and world-class healthcare solutions that improve patient outcomes.
                    </span>
                </span>
            </a>

            {{-- Our Story --}}
            <a href="{{ route('our-story') }}"  
               class="group relative flex items-start gap-4 px-4 pt-4 pb-7 focus:outline-none">

                {{-- Hover line --}}
                <span class="pointer-events-none absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 bg-[#19a7e0]
                             transition-transform duration-300 ease-out
                             group-hover:scale-x-100 group-focus-visible:scale-x-100"></span>

                <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full
                             bg-[#19a7e0]/10 text-[#1b2a6b] transition-colors group-hover:bg-[#19a7e0] group-hover:text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </span>
                <span>
                    <span class="block text-base font-semibold text-[#1b2a6b]">Our Story</span>
                    <span class="mt-1 block text-sm leading-relaxed text-slate-600">
                        How Genyra Group grew into a trusted healthcare partner across East Africa.
                    </span>
                </span>
            </a>

        </div>
    </div>

    {{-- ============ 2. Dark image band + overlapping About card ============ --}}
    <div class="relative">

        {{-- Dark band (your small black section image) --}}
        <div class="relative h-56 sm:h-64 lg:h-72 w-full bg-[#0f1733] bg-cover bg-center"
             style="background-image: url('{{ asset('images/striped.png') }}');">
            {{-- Navy tint so the band always reads dark, even if the image is light --}}
            <div class="absolute inset-0 bg-[#1b2a6b]/50"></div>
        </div>

        {{-- Card that sits on top of the band --}}
        <div class="relative z-10 mx-auto -mt-28 max-w-7xl px-4 pb-16 sm:-mt-32 sm:px-6 lg:-mt-36 lg:px-8">
            <div class="grid overflow-hidden bg-white shadow-2xl shadow-[#1b2a6b]/20 md:grid-cols-2">

                {{-- Image --}}
                <div class="relative min-h-[280px] md:min-h-[520px]">
                    <img src="{{ asset('images/about.jpeg') }}"
                         alt="Genyra Group laboratory"
                         class="absolute inset-0 h-full w-full object-cover"
                         onerror="this.src='https://images.pexels.com/photos/3786126/pexels-photo-3786126.jpeg?auto=compress&cs=tinysrgb&w=1200'">
                    {{-- Cyan accent edge, picks up the logo --}}
                    <div class="absolute inset-y-0 left-0 w-1.5 bg-[#19a7e0]"></div>
                </div>

                {{-- Text --}}
                <div class="flex flex-col justify-center p-8 sm:p-10 lg:p-14">
                    <h2 class="text-3xl font-bold uppercase tracking-tight text-[#1b2a6b] md:text-4xl">
                        About Genyra Group
                    </h2>
                    <div class="mt-4 h-1 w-14 bg-[#19a7e0]"></div>

                    <h3 class="mt-6 text-lg font-semibold text-slate-800">
                        Leading Healthcare Solutions Provider in East Africa
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                        Genyra Group is East Africa's leading provider of healthcare solutions, specializing in
                        laboratory equipment &amp; consumables, general medical supplies, healthcare strategic
                        planning &amp; systems development, and calibration services. We serve hospitals, research
                        institutions, diagnostic laboratories, pharmaceutical companies and healthcare facilities
                        across the region.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                        With a proven track record of successful implementations and a commitment to quality,
                        Genyra Group is a trusted partner for organizations seeking to enhance patient care,
                        improve operational efficiency and achieve regulatory compliance.
                    </p>

                    <div class="mt-8">
                        <a href="#contact"
                           class="inline-flex items-center justify-center bg-[#1b2a6b] px-8 py-3 text-sm font-semibold text-white
                                  transition-colors hover:bg-[#19a7e0] focus:outline-none focus-visible:ring-2
                                  focus-visible:ring-[#19a7e0] focus-visible:ring-offset-2">
                            Get in Touch
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

@php
$instituteCourses = [
    [
        'title' => 'Biosafety & Biosecurity: Laboratory and Field Practice',
        'text' => 'Biological risk levels, containment, protective equipment and emergency protocols for BSL 1–3 work.',
        'image' => 'https://images.pexels.com/photos/4033148/pexels-photo-4033148.jpeg?auto=compress&cs=tinysrgb&w=1200',
        'alt' => 'Scientist in protective gear working safely in a laboratory',
        'url' => 'https://academy.genyragroup.com/course/view.php?id=2',
    ],
    [
        'title' => 'Applied Molecular Diagnostics',
        'text' => 'DNA and RNA extraction, PCR and qPCR, sequencing and assay validation for clinical settings.',
        'image' => 'https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=1200',
        'alt' => 'Scientist working with molecular laboratory equipment',
        'url' => 'https://academy.genyragroup.com/course/view.php?id=4',
    ],
    [
        'title' => 'Antimicrobial Resistance Surveillance & Stewardship',
        'text' => 'Design AMR surveillance programmes and apply stewardship principles in clinical practice.',
        'image' => 'https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=1200',
        'alt' => 'Laboratory instruments used in microbiology work',
        'url' => 'https://academy.genyragroup.com/course/view.php?id=10',
    ],
    [
        'title' => 'Vaccine Development, Handling & Cold Chain Management',
        'text' => 'From vaccine development to storage, cold chain monitoring and last-mile delivery.',
        'image' => 'https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=1200',
        'alt' => 'Healthcare worker preparing a vaccine dose',
        'url' => 'https://academy.genyragroup.com/course/view.php?id=11',
    ],
];
@endphp

<section id="institute-courses" class="bg-[#f4f4f4] py-10 font-sans " aria-labelledby="institute-courses-title">
    <div class="mx-auto max-w-[1400px] px-4 md:px-[88px]">
        <p class="text-sm font-semibold text-[#0098c8]">Genyra Institute</p>
        <h2 id="institute-courses-title" class="mt-1 text-2xl font-semibold text-[#181858] md:text-3xl">
            Practical courses ready for your teams.
        </h2>
    </div>

    <div class="mt-8" data-institute-carousel>
        {{-- Viewport: full width so the next card peeks in from the right edge --}}
        <div class="overflow-hidden" data-viewport>
            <div
                data-track
                class="relative flex gap-8 pl-4 transition-transform duration-500 ease-out will-change-transform md:pl-[88px]"
            >
                @foreach ($instituteCourses as $course)
                    <article
                        data-card
                        class="relative h-[400px] w-[calc(100%-3rem)] shrink-0 overflow-hidden rounded bg-[#101040] md:w-[58%]"
                    >
                        <img
                            src="{{ $course['image'] }}"
                            alt="{{ $course['alt'] }}"
                            loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover"
                        >

                        {{-- Fade to black at the bottom --}}
                        <div
                            class="absolute inset-x-0 bottom-0 h-[65%] bg-gradient-to-t from-[#101040] via-[#101040]/85 to-transparent"
                            aria-hidden="true"
                        ></div>

                        <div class="absolute inset-x-0 bottom-0 p-6 text-white md:px-8 md:pb-8">
                            <h3 class="text-2xl font-semibold leading-tight">{{ $course['title'] }}</h3>
                            <p class="mt-2 max-w-[560px] text-base leading-snug md:text-lg">{{ $course['text'] }}</p>

                            <a
                                href="{{ $course['url'] }}"
                                target="_blank" rel="noopener"
                                class="mt-5 inline-flex items-center gap-2 rounded-full bg-[#0098c8] px-4 py-2.5 text-xs font-bold text-white transition-colors hover:bg-[#007fa8] focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#101040]"
                            >
                                Enrol now
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        {{-- Dots --}}
        <div class="mt-12 flex items-center justify-center gap-2.5" role="tablist" aria-label="Course slides" data-dots>
            @foreach ($instituteCourses as $i => $course)
                <button
                    type="button"
                    role="tab"
                    aria-label="Show course {{ $i + 1 }}"
                    data-dot
                    class="h-2 w-2 rounded-full bg-[#a8a8b8] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0098c8] focus-visible:ring-offset-2"
                ></button>
            @endforeach
        </div>
    </div>
</section>

<script>
(() => {
    const root = document.querySelector('[data-institute-carousel]');
    if (!root) return;

    const viewport = root.querySelector('[data-viewport]');
    const track = root.querySelector('[data-track]');
    const cards = Array.from(root.querySelectorAll('[data-card]'));
    const dots = Array.from(root.querySelectorAll('[data-dot]'));
    if (!viewport || !track || !cards.length) return;

    const AUTOPLAY_MS = 5000;
    // Set to true if you want autoplay disabled for users with "reduce motion" turned on
    const RESPECT_REDUCED_MOTION = false;
    const reducedMotion = RESPECT_REDUCED_MOTION &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let page = 0;
    let timer = null;
    let hovering = false;

    const render = () => {
        let offset = 0;
        if (page > 0) {
            const card = cards[page];
            offset = card.offsetLeft - (viewport.clientWidth - card.offsetWidth) / 2;
        }
        track.style.transform = `translateX(${-offset}px)`;

        dots.forEach((dot, i) => {
            const active = i === page;
            dot.classList.toggle('bg-[#0098c8]', active);
            dot.classList.toggle('bg-[#a8a8b8]', !active);
            dot.setAttribute('aria-selected', active ? 'true' : 'false');
        });
    };

    const go = (i) => {
        page = Math.max(0, Math.min(i, cards.length - 1));
        render();
    };

    const next = () => go(page >= cards.length - 1 ? 0 : page + 1);

    const stop = () => {
        clearInterval(timer);
        timer = null;
    };

    const start = () => {
        stop();
        if (reducedMotion || cards.length < 2 || hovering || document.hidden) return;
        timer = setInterval(next, AUTOPLAY_MS);
    };

    dots.forEach((dot, i) => dot.addEventListener('click', () => { go(i); start(); }));

    // Pause only while a mouse is over the cards (not the dots area below)
    viewport.addEventListener('mouseenter', () => { hovering = true; stop(); });
    viewport.addEventListener('mouseleave', () => { hovering = false; start(); });

    // Pause for keyboard focus only (clicking a dot shouldn't freeze autoplay)
    root.addEventListener('focusin', (e) => {
        if (e.target.matches(':focus-visible')) stop();
    });
    root.addEventListener('focusout', start);

    document.addEventListener('visibilitychange', start);

    // Touch swipe
    let startX = null;
    viewport.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        stop();
    }, { passive: true });
    viewport.addEventListener('touchend', (e) => {
        if (startX !== null) {
            const dx = e.changedTouches[0].clientX - startX;
            if (Math.abs(dx) > 50) go(page + (dx < 0 ? 1 : -1));
            startX = null;
        }
        start();
    });

    window.addEventListener('resize', render);
    render();
    start();
})();
</script>

  <!-- News & Updates and Notice Board -->
<section id="news-notices" class="relative pt-6 md:pt-8 pb-14 md:pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden"
         style="background: linear-gradient(165deg, #f0f7fc 0%, #eef1f8 45%, #f7f9fc 100%);">
    <div class="pointer-events-none absolute inset-0 opacity-[0.035]"
         style="background-image: radial-gradient(#22235a 1px, transparent 1px); background-size: 22px 22px;"></div>

    <div class="relative max-w-7xl mx-auto">
        <div class="mb-6 md:mb-8">
            <div class="category-label mb-2" style="color: #1BA0D8;">Stay informed</div>
            <h2 class="text-3xl md:text-4xl font-bold text-[#22235a]">News &amp; Updates</h2>
        </div>

        {{-- Top module: featured + notice (magazine lead) --}}
        <div class="grid lg:grid-cols-3 gap-6 lg:gap-8 items-stretch">
            <div class="lg:col-span-2">
                @if($latestNews)
                    @php
                        $featuredCategory = $latestNews->categories->first()?->name ?? 'News';
                        $featuredDate = optional($latestNews->published_at)->format('M j, Y')
                            ?? optional($latestNews->created_at)->format('M j, Y');
                        $featuredExcerpt = $latestNews->excerpt
                            ?: \Illuminate\Support\Str::limit(strip_tags($latestNews->content), 140);
                    @endphp

                    <article class="featured-news-card group h-full">
                        <a href="{{ route('news.readmore', $latestNews->slug) }}" class="featured-news-card__media">
                            @if($latestNews->main_image)
                                <img src="{{ asset('storage/' . $latestNews->main_image) }}"
                                     alt="{{ $latestNews->title }}"
                                     class="featured-news-card__image">
                            @else
                                <div class="featured-news-card__fallback">
                                    <span>genyra</span>
                                </div>
                            @endif
                        </a>

                        <div class="featured-news-card__body">
                            <div class="featured-news-card__meta">
                                <span class="featured-news-card__chip">{{ $featuredCategory }}</span>
                                <time datetime="{{ optional($latestNews->published_at ?? $latestNews->created_at)->toDateString() }}">{{ $featuredDate }}</time>
                            </div>
                            <h3 class="featured-news-card__title">
                                <a href="{{ route('news.readmore', $latestNews->slug) }}">{{ $latestNews->title }}</a>
                            </h3>
                            <p class="featured-news-card__excerpt">{{ $featuredExcerpt }}</p>
                            <a href="{{ route('news.readmore', $latestNews->slug) }}" class="featured-news-card__cta">
                                Read story
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @else
                    <div class="featured-news-card featured-news-card--empty">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="" class="featured-news-card__empty-logo" aria-hidden="true">
                        <p class="featured-news-card__empty-title">No news published yet</p>
                        <p class="featured-news-card__empty-text">Check back soon for updates from genyra Group.</p>
                    </div>
                @endif
            </div>

            {{-- Notice Board --}}
            <aside class="lg:sticky lg:top-8 h-full">
                <div class="notice-board-card h-full">
                    <div class="notice-board-card__header">
                        <span class="notice-board-card__pin" aria-hidden="true"></span>
                        <div>
                            <p class="notice-board-card__eyebrow">Notice board</p>
                            <h2 class="notice-board-card__heading">Announcements</h2>
                        </div>
                    </div>

                    @if($poster)
                        <button type="button"
                                class="notice-board-card__media"
                                data-notice-lightbox
                                data-notice-src="{{ $poster->image_url }}"
                                data-notice-title="{{ $poster->title }}"
                                aria-label="View notice full size">
                            <img src="{{ $poster->image_url }}"
                                 alt="{{ $poster->title ?: 'Notice board poster' }}"
                                 class="notice-board-card__image">
                        </button>

                        <div class="notice-board-card__body">
                            @if($poster->title)
                                <h3 class="notice-board-card__title">{{ $poster->title }}</h3>
                            @endif
                            @if($poster->description)
                                <p class="notice-board-card__desc">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($poster->description), 110) }}
                                </p>
                            @endif
                            <button type="button"
                                    class="notice-board-card__cta"
                                    data-notice-lightbox
                                    data-notice-src="{{ $poster->image_url }}"
                                    data-notice-title="{{ $poster->title }}">
                                View full size
                            </button>
                        </div>
                    @else
                        <div class="notice-board-card__empty">
                            <img src="{{ asset('images/logo.jpeg') }}"
                                 alt=""
                                 class="notice-board-card__empty-logo"
                                 aria-hidden="true">
                            <p class="notice-board-card__empty-title">No notices posted</p>
                            <p class="notice-board-card__empty-text">Check back for important announcements from genyra Group.</p>
                        </div>
                    @endif
                </div>
            </aside>
        </div>

        {{-- Theme cards strip: exactly 4 from backend --}}
        @if($latestFour->isNotEmpty())
            @php
                $newsCardColors = ['#22235a', '#1BA0D8', '#6a1b9a', '#e65100'];
            @endphp
            <div class="mt-14 md:mt-16 pt-10 border-t border-[#22235a]/10">
                <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5">
                    @foreach($latestFour as $index => $news)
                        @php
                            $newsCategory = $news->categories->first()?->name ?? 'News';
                            $newsExcerpt = $news->excerpt
                                ?: \Illuminate\Support\Str::limit(strip_tags($news->content), 100);
                            $cardColor = $newsCardColors[$index % count($newsCardColors)];
                            $categorySlug = $news->categories->first()?->slug;
                        @endphp
                        <li class="h-full">
                            <article class="news-theme-card" style="--card-color: {{ $cardColor }};">
                                <a href="{{ route('news.readmore', $news->slug) }}" class="news-theme-card__media block" aria-label="{{ $news->title }}">
                                    @if($news->main_image)
                                        <img src="{{ asset('storage/' . $news->main_image) }}"
                                             alt="{{ $news->title }}">
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center"
                                             style="background: linear-gradient(145deg, {{ $cardColor }}, #22235a);">
                                            <span class="relative z-10 text-white/85 text-xs uppercase tracking-widest">genyra</span>
                                        </div>
                                    @endif
                                    <span class="news-theme-card__tint" aria-hidden="true"></span>
                                </a>

                                <div class="news-theme-card__body">
                                    <h4 class="news-theme-card__title">
                                        <a href="{{ route('news.readmore', $news->slug) }}">{{ $news->title }}</a>
                                    </h4>
                                    <p class="news-theme-card__excerpt">{{ $newsExcerpt }}</p>
                                    <span class="news-theme-card__category">{{ $newsCategory }}</span>
                                    <div class="news-theme-card__actions">
                                        <a href="{{ route('news.readmore', $news->slug) }}"
                                           class="news-theme-card__btn news-theme-card__btn--primary">
                                            Read article
                                        </a>
                                        <a href="{{ $categorySlug ? route('news', ['category' => $categorySlug]) : route('news') }}"
                                           class="news-theme-card__btn news-theme-card__btn--secondary">
                                            More in {{ $newsCategory }}
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-12 flex justify-center sm:justify-start">
            <a href="{{ route('news') }}"
               class="inline-flex items-center gap-3 border border-[#22235a] px-8 py-4 text-sm font-semibold uppercase tracking-widest text-[#22235a] hover:bg-[#22235a] hover:text-white transition-colors duration-300">
                View all news
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>


<!-- Contact Section -->
<section id="contact" class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto">
          <!-- Section Header -->
        <div class="max-w-3xl mb-[15px]">
            <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-4"> Get In Touch</div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-700 mb-6 leading-tight">
                Contact Us
            </h2>
            <p class="text-md md:text-xl text-gray-600 leading-relaxed">
                We are ready to assist you with your healthcare solutions needs
            </p>
        </div>


        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Head Office -->
                <div class="bg-white p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2 text-gray-700">Head Office</h3>
                            <p class="text-gray-600 leading-relaxed">
                                P.O. Box 43844, 00100<br/>
                                Nairobi, Kenya
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-white p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-2 text-gray-700">Telephone</h3>
                            <p class="text-gray-600">
                                <span class="font-semibold">Main:</span> <a href="tel:+254735553500" class="hover:text-blue-600 transition-colors">+254 735 553 500</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-white p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="w-full">
                            <h3 class="font-bold text-lg mb-3 text-gray-700">Email Addresses</h3>
                            <div class="space-y-2 text-gray-600">
                                <p><span class="font-semibold">General:</span> <a href="mailto:info@genyragroup.com" class="hover:text-blue-600 transition-colors">info@genyragroup.com</a></p>
                                <p><span class="font-semibold">Sales:</span> <a href="mailto:sales@genyragroup.com" class="hover:text-blue-600 transition-colors">sales@genyragroup.com</a></p>
                                <p><span class="font-semibold">Support:</span> <a href="mailto:support@genyragroup.com" class="hover:text-blue-600 transition-colors">support@genyragroup.com</a></p>
                                <p><span class="font-semibold">Calibration:</span> <a href="mailto:calibration@genyragroup.com" class="hover:text-blue-600 transition-colors">calibration@genyragroup.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-white p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg mb-3 text-gray-700">Business Hours</h3>
                            <div class="text-gray-600 space-y-1">
                                <p><span class="font-semibold">Monday - Friday:</span> 8:00 AM - 5:00 PM</p>
                                <p><span class="font-semibold">Saturday:</span> 9:00 AM - 1:00 PM</p>
                                <p><span class="font-semibold">Sunday & Public Holidays:</span> Closed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                            </svg>
                        </div>
                        <div class="w-full">
                            <h3 class="font-bold text-lg mb-3 text-gray-700">Social Media</h3>
                            <div class="flex space-x-4">
                                <a href="https://linkedin.com/company/genyra-group" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors group">
                                    <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/genyragroup" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-blue-400 rounded-lg flex items-center justify-center transition-colors group">
                                    <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                                    </svg>
                                </a>
                                <a href="https://facebook.com/genyraGroupBank" target="_blank" class="w-10 h-10 bg-gray-100 hover:bg-blue-700 rounded-lg flex items-center justify-center transition-colors group">
                                    <svg class="w-5 h-5 text-gray-600 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white p-8 lg:p-10 rounded-xl shadow-md">
                    <h3 class="text-3xl font-bold mb-2 text-gray-700">Send us a Message</h3>
                    <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you as soon as possible</p>
                    
                    <form class="space-y-6" method="post" action="{{ route('contact.submit') }}">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name *</label>
                            <input type="text" name="name"  
                            value="{{ old('name') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="John Doe">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="email"  
                            value="{{ old('email') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="john@example.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone"
                            value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="+254 700 000 000">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                            <select name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Select Subject</option>
                                <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="Request Quotation" {{ old('subject') == 'Request Quotation' ? 'selected' : '' }}>Request Quotation</option>
                                <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                                <option value="Calibration Services" {{ old('subject') == 'Calibration Services' ? 'selected' : '' }}>Calibration Services</option>
                                <option value="Partnership Opportunity" {{ old('subject') == 'Partnership Opportunity' ? 'selected' : '' }}>Partnership Opportunity</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Message *</label>
                            <textarea rows="5" name="message" 
                            value="{{ old('message') }}"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                                      placeholder="Tell us how we can help you..."></textarea>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white font-semibold py-4 px-6 rounded-lg hover:bg-blue-700 transform hover:scale-[1.02] transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                            <span>Send Message</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                    
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <p class="text-center text-sm text-gray-600">
                            <strong>Need immediate assistance?</strong><br/>
                            Call us at <a href="tel:+254735553500" class="text-blue-600 hover:underline font-semibold">+254 705 435 438</a> or email 
                            <a href="mailto:sales@genyragroup.com" class="text-blue-600 hover:underline font-semibold">sales@genyragroup.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('web.partials.partners')

  </div>{{-- /.home-scroll-panel --}}

@endsection
