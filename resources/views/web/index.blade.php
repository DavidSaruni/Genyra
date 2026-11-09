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
<section id="about" class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-stretch">
            <div class="flex flex-col">
                <div class="category-label mb-4">ABOUT GENYRA GROUP</div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-700">
                    Leading Healthcare Solutions Provider in East Africa
                </h2>
                <p class="text-md text-gray-600 mb-6 leading-relaxed">
                    genyra Group is East Africa's leading provider of healthcare solutions, specializing in laboratory equipment & consumables, general medical supplies, healthcare strategic planning & systems development and calibration services. Established with a vision to transform healthcare delivery through innovation and excellence, we serve hospitals, research institutions, diagnostic laboratories, pharmaceutical companies, and healthcare facilities across the region.
                </p>
                <p class="text-md text-gray-600 mb-8 leading-relaxed">
                    With a proven track record of successful implementations and a commitment to quality, genyra Group has positioned itself as a trusted partner for healthcare organizations seeking to enhance patient care, improve operational efficiency, and achieve regulatory compliance.
                </p>
                <a href="#contact" class="btn-primary w-64 text-center">
                    Get in Touch
                </a>
            </div>
            
            <!-- Image with Overlay -->
<div class="relative h-full min-h-[500px] rounded-2xl overflow-hidden group shadow-2xl">

    {{-- Photo --}}
    <img src="{{ asset('images/about.jpeg') }}"
         alt="Laboratory"
         class="w-full h-[600px] object-cover transition-transform duration-700 group-hover:scale-105"
         onerror="this.src='https://images.pexels.com/photos/3786126/pexels-photo-3786126.jpeg?auto=compress&cs=tinysrgb&w=1200'">

    {{-- Layered gradient: subtle top-to-transparent, heavy navy at bottom --}}
    <div class="absolute inset-0 bg-gradient-to-t from-[#0f1f45] via-[#0f1f45]/60 to-transparent"></div>

    {{-- Divider line that slides up on hover --}}
    <div class="absolute bottom-[200px] left-8 right-8 h-px bg-white/20
                translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100
                transition-all duration-500"></div>

    {{-- Overlay content --}}
    <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">

        {{-- Vision --}}
        <div class="mb-5 translate-y-2 opacity-90 group-hover:translate-y-0 group-hover:opacity-100
                    transition-all duration-500 delay-75">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-cyan-500/20 border border-cyan-400/30
                            flex items-center justify-center backdrop-blur-sm mt-0.5">
                    <svg class="w-5 h-5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                                 -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-cyan-300 text-[10px] font-bold tracking-[0.15em] uppercase mb-1">Our Vision</p>
                    <p class="text-white font-semibold text-base leading-snug">
                        To be the most trusted and preferred partner for healthcare solutions in Africa
                    </p>
                </div>
            </div>
        </div>

        {{-- Thin separator --}}
        <div class="border-t border-white/10 mb-5"></div>

        {{-- Mission --}}
        <div class="translate-y-2 opacity-90 group-hover:translate-y-0 group-hover:opacity-100
                    transition-all duration-500 delay-150">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-cyan-500/20 border border-cyan-400/30
                            flex items-center justify-center backdrop-blur-sm mt-0.5">
                    <svg class="w-5 h-5 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-cyan-300 text-[10px] font-bold tracking-[0.15em] uppercase mb-1">Our Mission</p>
                    <p class="text-white/90 font-medium text-sm leading-relaxed">
                        Delivering innovative, reliable, and world-class healthcare solutions that improve
                        patient outcomes and enhance operational efficiency
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
        </div>
    </div>
</section>


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
