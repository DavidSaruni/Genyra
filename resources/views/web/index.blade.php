@extends('web.app')



@section('title')



@section('body')


  <!-- Video Hero Section -->
  <section class="video-hero">
      <video class="video-background" autoplay muted playsinline id="heroVideo" preload="auto"></video>
    
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
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-8 leading-tight">
                <span class="text-[#22235a]">Building Solutions</span> 
                <span class="text-white">Transforming</span>
                <span class="text-cyan-400">Healthcare</span>
            </h1>
            <a href="#about" class="btn-primary">
                Learn more
            </a>
        </div>
    </div>
</div>
  </section>

  <section class="hidden" id="small-hero-content">
    <div class="hero-content w-full py-12 px-4  flex items-center min-h-64">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
              <div class="max-w-3xl fade-in-up">
                  <div class="category-label mb-4 text-gray-800">
                      ENABLING HEALTHCARE INNOVATION
                  </div>
                  <h1 class="text-3xl md:text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                        <span class="text-[#22235a] font-extrabold">Building Solutions</span> <br>
                        <span class="text-gray-700 italic text-xl">Transforming Healthcare</span>
                  </h1>
                  <a href="#about" class="btn-primary">
                      Learn more
                  </a>
              </div>
          </div>
      </div>
  </section>


  <!-- News & Updates and Noticeboard Section -->
<section id="news-notices" class="pt-24 mb-16 bg-gray-50 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- News & Updates Column (2 columns) -->
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <div class="category-label mb-2">STAY INFORMED</div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-700">News & Updates</h2>
                        </div>
                    </div>
                </div>

                <!-- Single Large News Item (Full 2 columns) -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 mb-8">
                    <div class="grid md:grid-cols-2 gap-0">
                        <!-- Image Section -->
                        <div class="relative h-80 md:h-auto overflow-hidden">
                            <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=800" 
                                 alt="News" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500"
                                 onerror="this.src='https://via.placeholder.com/800x400/1e40af/ffffff?text=News'">
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded text-xs font-bold uppercase">
                                    News & Updates
                                </span>
                            </div>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="p-8 flex flex-col justify-center">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="text-xs text-gray-500">February 17, 2026</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span class="text-xs text-gray-500">Genyra Group</span>
                            </div>
                            <h3 class="text-xl md:text-3xl font-bold text-gray-700 mb-4 leading-tight hover:text-blue-700 transition-colors">
                                New Laboratory Equipment Shipment Arrives at County Hospital
                            </h3>
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                                Genyra Group successfully deployed state-of-the-art laboratory equipment to enhance diagnostic capabilities and improve patient care outcomes across the region.
                            </p>
                            <a href="#" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 w-fit">
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

        <!-- Discover More Button -->
    <section class="pb-4 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            
            <div class="border-t border-gray-200 mb-16"></div>

            <div class="flex flex-col items-center justify-center">

                <!-- Load More Button -->
                <a 
                href="{{ route('news') }}"
                    id="loadMoreBtn"
                    class="group relative flex items-center gap-4 border border-blue-900 px-6 md:px-12 py-5 text-sm font-semibold uppercase tracking-widest text-gray-900 hover:text-white transition-all duration-300 overflow-hidden">
                    <span class="absolute inset-0 bg-blue-900 -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-in-out z-0"></span>
                    <span class="relative z-10">Load More News</span>
                    <svg class="relative z-10 w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="hidden mt-8 flex-col items-center gap-4">
                    <div class="w-8 h-8 border-2 border-gray-200 border-t-[#1BA0D8] rounded-full animate-spin"></div>
                    <p class="text-sm text-gray-400 uppercase tracking-widest">Loading news...</p>
                </div>

                <!-- All Loaded Message -->
                <div id="allLoadedMsg" class="hidden mt-8 flex-col items-center gap-3">
                    <div class="w-12 h-12 bg-[#1BA0D8] rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 uppercase tracking-widest">All News Loaded</p>
                </div>

                <!-- View All Link -->
                <a href="{{ route('news') }}" class="mt-8 flex items-center gap-2 text-sm text-gray-400 hover:text-[#1BA0D8] transition-colors duration-300 uppercase tracking-widest">
                    <span>View All News</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>
            </div>

            <!-- genyra Notice Board Column (1 column) -->
            <div>
                <div class="sticky top-8">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-500 text-white rounded-t-xl px-6 py-2 shadow-lg">
                        <h2 class="text-2xl font-bold mb-1">genyra Group Notice Board</h2>
                        <p class="text-blue-100 text-sm">Important announcements & updates</p>
                    </div>
                    
                    <div class="bg-white rounded-b-xl shadow-lg overflow-hidden">
                        <!-- Single Large Notice Poster -->
                        <div class="md:p-4">
                            <div class="group cursor-pointer">
                                <div class="relative overflow-hidden md:rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                    <div class="relative w-full aspect-[3/4]">
                                        <img src="{{ asset('images/genyraposter.png') }}"
                                            alt="Notice Poster"
                                            class="absolute inset-0 w-full h-full object-cover">
                                    </div>

                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="absolute bottom-0 left-0 right-0 p-4">
                                            <p class="text-white text-sm font-semibold">Click to view details</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- View All Notices Button -->
                        <div class="p-6 bg-gray-50 border-t border-gray-200">
                            <a href="/notices" class="block w-full text-center px-4 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-lg hover:shadow-xl">
                                View All Notices
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="solutions" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Optional Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-3xl md:text-4xl font-bold text-gray-700 mb-4 text-left md:text-center">Our Solutions</h2>
            <p class="text-md text-gray-600 text-left md:text-center">We design, deploy & maintain solutions that shape healthcare in East Africa and beyond</p>
        </div>

        <!-- Icon Grid - 3 on mobile, 5 on tablet, 10 on desktop -->
        <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-10 gap-4">
            
            <!-- Card 1: Laboratory Equipment -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Laboratory Equipment</p>
                    <p class="text-[10px] text-gray-500 mt-1">BioSciences</p>
                </div>
            </div>

            <!-- Card 2: Medical Devices -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Medical Devices</p>
                    <p class="text-[10px] text-gray-500 mt-1">MedTech</p>
                </div>
            </div>

            <!-- Card 3: Digital Health -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Digital Health</p>
                    <p class="text-[10px] text-gray-500 mt-1">HIS/LIS</p>
                </div>
            </div>

            <!-- Card 4: Calibration -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Calibration</p>
                    <p class="text-[10px] text-gray-500 mt-1">ISO 17025</p>
                </div>
            </div>

            <!-- Card 5: Quality -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Quality</p>
                    <p class="text-[10px] text-gray-500 mt-1">ISO Compliance</p>
                </div>
            </div>

            <!-- Card 6: Hospital -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Hospital Setup</p>
                    <p class="text-[10px] text-gray-500 mt-1">Complete</p>
                </div>
            </div>

            <!-- Card 7: Research -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Research</p>
                    <p class="text-[10px] text-gray-500 mt-1">Support</p>
                </div>
            </div>

            <!-- Card 8: Training -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Training</p>
                    <p class="text-[10px] text-gray-500 mt-1">500+ Annually</p>
                </div>
            </div>

            <!-- Card 9: Maintenance -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Maintenance</p>
                    <p class="text-[10px] text-gray-500 mt-1">24/7 Service</p>
                </div>
            </div>

            <!-- Card 10: Pharma -->
            <div class="group">
                <div class="bg-gray-100 hover:bg-blue-50 transition-all duration-300 p-6 flex flex-col items-center justify-center h-32 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-700 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="text-center mt-3">
                    <p class="font-semibold text-xs text-gray-700 leading-tight">Pharmaceutical</p>
                    <p class="text-[10px] text-gray-500 mt-1">QC Labs</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Highlights Section  -->
<section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-3 gap-2" id="highlightGrid">
            
            <div class="highlight-card group relative h-[300px] md:h-[350px] lg:h-[500px] overflow-hidden cursor-pointer transition-all duration-500">
                <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="BioSciences Laboratory" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20 transition-all duration-500 group-hover:from-black/70 group-hover:via-black/30"></div>
                
                <!-- Content at Bottom -->
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white transition-all duration-500">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-400">INNOVATION</span>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4 transition-all duration-500">
                        Advanced Laboratory Solutions for East Africa
                    </h3>
                    <div class="w-12 h-1 bg-blue-500 transition-all duration-500 group-hover:w-24"></div>
                </div>
            </div>

            <div class="highlight-card group relative h-[300px] md:h-[350px] lg:h-[500px] overflow-hidden cursor-pointer transition-all duration-500">
                <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Digital Health Technology" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <!-- Light Overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-white/10 via-white/30 to-white/90 transition-all duration-500 group-hover:from-white/5 group-hover:via-white/20 group-hover:to-white/85"></div>
                
                <!-- Content at TOP -->
                <div class="absolute inset-0 flex flex-col justify-start p-6 md:p-8 transition-all duration-500">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-600">HIGHLIGHTS</span>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4 text-gray-700 transition-all duration-500">
                        Integrated Health Information Systems
                    </h3>
                    <div class="w-12 h-1 bg-blue-600 transition-all duration-500 group-hover:w-24"></div>
                </div>
            </div>

            <div class="highlight-card group relative h-[300px] md:h-[350px] lg:h-[500px] overflow-hidden cursor-pointer transition-all duration-500">
                <img src="https://images.pexels.com/photos/3844581/pexels-photo-3844581.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Healthcare Excellence" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/50 to-transparent transition-all duration-500 group-hover:from-blue-900/80 group-hover:via-blue-900/40"></div>
                
                <!-- Content at Bottom -->
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white transition-all duration-500">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-300">ABOUT GENYRA</span>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4 transition-all duration-500">
                        Transforming Healthcare Across East Africa
                    </h3>
                    <div class="w-12 h-1 bg-blue-400 transition-all duration-500 group-hover:w-24"></div>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- About Section -->
<section id="about" class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-stretch">
            <div class="flex flex-col">
                <div class="category-label mb-4">ABOUT GENYRA GROUP</div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-gray-700">
                    Leading Healthcare Solutions Provider in East Africa
                </h2>
                <p class="text-md text-gray-600 mb-6 leading-relaxed">
                    Genyra Group is East Africa's leading provider of healthcare solutions, specializing in laboratory equipment & consumables, general medical supplies, healthcare strategic planning & systems development and calibration services. Established with a vision to transform healthcare delivery through innovation and excellence, we serve hospitals, research institutions, diagnostic laboratories, pharmaceutical companies, and healthcare facilities across the region.
                </p>
                <p class="text-md text-gray-600 mb-8 leading-relaxed">
                    With a proven track record of successful implementations and a commitment to quality, Genyra Group has positioned itself as a trusted partner for healthcare organizations seeking to enhance patient care, improve operational efficiency, and achieve regulatory compliance.
                </p>
                <a href="#contact" class="btn-primary w-64 text-center">
                    Get in Touch
                </a>
            </div>
            
            <!-- Image with Overlay -->
            <div class="relative h-full min-h-[500px] rounded-lg overflow-hidden group">
                <img src="{{ asset('images/about.jpeg') }}" 
                     alt="Laboratory" 
                     class="w-full h-[600px] object-cover transition-transform duration-700 group-hover:scale-105" 
                     onerror="this.src='https://images.pexels.com/photos/3786126/pexels-photo-3786126.jpeg?auto=compress&cs=tinysrgb&w=1200'">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/95 via-blue-900/50 to-transparent"></div>
                
                <!-- Overlay Content -->
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <!-- Vision -->
                    <div class="mb-6 transform transition-all duration-500 group-hover:translate-y-0">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3 backdrop-blur-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold uppercase tracking-wide">Our Vision</h3>
                        </div>
                        <p class="text-white/90 text-base leading-relaxed pl-13">
                            To be the most trusted and preferred partner for healthcare solutions in Africa
                        </p>
                    </div>
                    
                    <!-- Mission -->
                    <div class="transform transition-all duration-500 group-hover:translate-y-0">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3 backdrop-blur-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold uppercase tracking-wide">Our Mission</h3>
                        </div>
                        <p class="text-white/90 text-base leading-relaxed pl-13">
                            Delivering innovative, reliable, and world-class healthcare solutions that improve patient outcomes and enhance operational efficiency
                        </p>
                    </div>
                </div>
                
                <!-- Top Badge -->
                <div class="absolute top-6 right-6">
                    <div class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm">
                        ISO Certified
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- Business Lines Section -->
  <section id="business-lines" class="py-24 bg-gray-50 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
              <div class="category-label mb-4 text-left md:text-center">OUR EXPERTISE</div>
              <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-700 text-left md:text-center" >Strategic Business Units</h2>
              <p class="text-md text-gray-600 text-left md:text-center">
                  At genyra, we bring together a diverse portfolio of businesses to create forward-looking solutions that strengthen healthcare delivery, improve outcomes, and drive sustainable system performance.
              </p>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
              <!-- BioSciences -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=800" alt="BioSciences" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/3b82f6/ffffff?text=BioSciences'">
                  <div class="p-8">
                      <div class="category-label mb-3">Life Sciences Research & Applied Biology</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">BioSciences</h3>
                      <p class="text-gray-600 mb-6">
                          Genyra BioSciences is where discovery meets application. We bridge the gap between fundamental biological research and real-world health outcomes advancing knowledge in molecular biology, microbiology, genomics, and applied life sciences. Our work underpins the science behind better diagnostics, safer products, and more effective therapies.
                      </p>
                      <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Applied biological research & laboratory sciences</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Microbiology, genomics & molecular diagnostics support</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Biosafety & biosecurity advisory</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Research design, data analysis & scientific consulting</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Capacity building & scientific training programmes</span>
                    </li>
                      </ul>
                        <a  class="text-sm font-semibold border border-blue-800 bg-blue-900 text-white py-4 px-6 inline-flex items-center mt-6 rounded-sm">
                            Science that translates into health impact
                        </a>
                  </div>
              </div>

              <!-- MedTech Solutions -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="MedTech" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/10b981/ffffff?text=MedTech'">
                  <div class="p-8">
                      <div class="category-label mb-3">Medical Technology & Device Solutions</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">MedTech Solutions</h3>
                      <p class="text-gray-600 mb-6">
                          Genyra MedTech delivers end-to-end medical technology solutions from device selection and procurement to deployment, user training, and post-market support. We work with hospitals, clinics, and health programmes to ensure the right technology is in the right hands, functioning optimally, and aligned with clinical and operational needs.
                      </p>
                      <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Medical device supply, sourcing & procurement advisory</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Technology needs assessment & health technology evaluation</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Biomedical equipment management & lifecycle support</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Installation, commissioning & user training</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Maintenance programme design & technical support</span>
                    </li>
                      </ul>
                        <a  class="text-sm font-semibold border border-blue-800 bg-blue-900 text-white py-4 px-2 inline-flex items-center mt-6 rounded-sm">
                            Technology that serves people, not just processes
                        </a>
                  </div>
              </div>

              <!-- Health Systems Planning -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Planning" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/8b5cf6/ffffff?text=Health+Systems'">
                  <div class="p-8">
                      <div class="category-label mb-3">Strategic Planning · Quality Management Systems</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">Health Systems Planning & Advisory</h3>
                      <p class="text-gray-600 mb-6">
                          Genyra Health Systems Planning & Advisory empowers health institutions and organisations with the strategic intelligence and quality frameworks they need to perform at their best. We partner with governments, health authorities, NGOs, and private sector actors to design robust health systems, develop strategic plans, and embed quality cultures that endure.
                      </p>
                      <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Health sector strategic planning & institutional strengthening</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Quality Management Systems (QMS) design & implementation</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">ISO standards alignment & accreditation readiness</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Health policy advisory & programme design</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Monitoring, evaluation & performance improvement frameworks</span>
                    </li>
                      </ul>
                        <a  class="text-sm font-semibold border border-blue-800 bg-blue-900 text-white py-4 px-2 inline-flex items-center mt-6 rounded-sm">
                            Governance that makes health systems work
                        </a>
                  </div>
              </div>

              <!-- Metrology & Calibration -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Calibration" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/f97316/ffffff?text=Metrology'">
                  <div class="p-8">
                      <div class="category-label mb-3">Precision Measurement & Instrument Assurance</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">Metrology & Calibration Services</h3>
                      <p class="text-gray-600 mb-6">
                          Genyra Metrology & Calibration Services is built on a fundamental truth: accurate measurement is the foundation of safe and effective healthcare. We provide professional calibration, verification, and measurement assurance services for medical, laboratory, and industrial instruments ensuring that every reading is trustworthy, traceable, and compliant.
                      </p>
                      <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Calibration of medical, laboratory & industrial instruments</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Measurement traceability to national & international standards</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Preventive maintenance & performance verification</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Calibration programme management & scheduling</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Compliance with ISO 17025 & regulatory requirements</span>
                    </li>
                      </ul>
                        <a  class="text-sm font-semibold border border-blue-800 bg-blue-900 text-white py-4 px-2 inline-flex items-center mt-6 rounded-sm">
                            Precision you can trust every time
                        </a>
                  </div>
              </div>
          </div>
      </div>
  </section>

<!-- Projects Section -->
<section id="projects" class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <div class="category-label mb-4" style="font-size: 11px; letter-spacing: 2.5px;">OUR IMPACT</div>
            <h2 class="text-3xl md:text-5xl font-bold mb-6 text-gray-700">Recent Key Projects & Achievements</h2>
        </div>
        
        <!-- Projects Grid -->
        <div class="grid md:grid-cols-3 gap-2 mb-12" id="projectsGrid">
            
            <!-- Row 1: Large Card (2 columns) -->
            <div class="project-card md:col-span-2 relative h-[300px] md:h-[400px] lg:h-[450px] overflow-hidden cursor-pointer group">
                <img src="https://images.pexels.com/photos/3786126/pexels-photo-3786126.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Laboratory Setup" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent group-hover:from-black/70 group-hover:via-black/30 transition-all duration-500"></div>
                
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-400" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">INNOVATION</span>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Complete Laboratory Setup for Level 5 County Hospital
                    </h3>
                    <div class="w-12 h-1 bg-blue-500 group-hover:w-24 transition-all duration-500" style="box-shadow: 0 2px 4px rgba(0,0,0,0.5);"></div>
                </div>
            </div>
            
            <!-- Row 1: Small Card (1 column) -->
            <div class="project-card relative h-[300px] md:h-[400px] lg:h-[450px] overflow-hidden cursor-pointer group">
                <img src="https://images.pexels.com/photos/40568/medical-appointment-doctor-healthcare-40568.jpeg?auto=compress&cs=tinysrgb&w=800" 
                     alt="Healthcare Quality" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-blue-900/10 to-transparent group-hover:from-blue-900/80 group-hover:via-blue-900/40 transition-all duration-500"></div>
                
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-300" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">SUSTAINABILITY</span>
                    </div>
                    <h3 class="text-xl md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        ISO 13485:2016 Certification Achievement
                    </h3>
                    <div class="w-12 h-1 bg-blue-400 group-hover:w-24 transition-all duration-500" style="box-shadow: 0 2px 4px rgba(0,0,0,0.5);"></div>
                </div>
            </div>
            
            <!-- Row 2: Card 1 -->
            <div class="project-card relative h-[300px] md:h-[350px] lg:h-[400px] overflow-hidden cursor-pointer group">
                <img src="https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&cs=tinysrgb&w=800" 
                     alt="Hospital Technology" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent group-hover:from-black/70 group-hover:via-black/30 transition-all duration-500"></div>
                
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-400" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">TECHNOLOGY</span>
                    </div>
                    <h3 class="text-md md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Integrated HIS/LIS for 300-bed Hospital Network
                    </h3>
                    <div class="w-12 h-1 bg-blue-500 group-hover:w-24 transition-all duration-500" style="box-shadow: 0 2px 4px rgba(0,0,0,0.5);"></div>
                </div>
            </div>
            
            <!-- Row 2: Card 2 -->
            <div class="project-card relative h-[300px] md:h-[350px] lg:h-[400px] overflow-hidden cursor-pointer group">
                <img src="https://images.pexels.com/photos/4225880/pexels-photo-4225880.jpeg?auto=compress&cs=tinysrgb&w=800" 
                     alt="Medical Equipment Calibration" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent group-hover:from-black/70 group-hover:via-black/30 transition-all duration-500"></div>
                
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-400" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">EXCELLENCE</span>
                    </div>
                    <h3 class="text-md md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Calibration Lab Accreditation ISO/IEC 17025:2017
                    </h3>
                    <div class="w-12 h-1 bg-blue-500 group-hover:w-24 transition-all duration-500" style="box-shadow: 0 2px 4px rgba(0,0,0,0.5);"></div>
                </div>
            </div>
            
            <!-- Row 2: Card 3 -->
            <div class="project-card relative h-[300px] md:h-[350px] lg:h-[400px] overflow-hidden cursor-pointer group">
                <img src="https://images.pexels.com/photos/236380/pexels-photo-236380.jpeg?auto=compress&cs=tinysrgb&w=800" 
                     alt="ICU Medical Equipment" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent group-hover:from-black/70 group-hover:via-black/30 transition-all duration-500"></div>
                
                <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-8 text-white">
                    <div class="mb-3 md:mb-4">
                        <span class="text-[10px] md:text-xs font-semibold uppercase tracking-widest text-blue-400" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">IMPACT</span>
                    </div>
                    <h3 class="text-md md:text-xl lg:text-2xl font-bold leading-tight mb-3 md:mb-4" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        COVID-19 Response: ICU Equipment Package
                    </h3>
                    <div class="w-12 h-1 bg-blue-500 group-hover:w-24 transition-all duration-500" style="box-shadow: 0 2px 4px rgba(0,0,0,0.5);"></div>
                </div>
            </div>

        </div>
        
        <!-- Discover More Button -->
    <section class="pb-4 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            
            <div class="border-t border-gray-200 mb-16"></div>

            <div class="flex flex-col items-center justify-center">

                <!-- Load More Button -->
                <a 
                href="{{ route('projects') }}"
                    id="loadMoreBtn"
                    class="group relative flex items-center gap-4 border border-gray-900 px-6 md:px-12 py-5 text-sm font-semibold uppercase tracking-widest text-gray-900 hover:text-white transition-all duration-300 overflow-hidden">
                    <span class="absolute inset-0 bg-gray-900 -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-in-out z-0"></span>
                    <span class="relative z-10">Load More Projects</span>
                    <svg class="relative z-10 w-5 h-5 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
</a>

                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="hidden mt-8 flex-col items-center gap-4">
                    <div class="w-8 h-8 border-2 border-gray-200 border-t-[#1BA0D8] rounded-full animate-spin"></div>
                    <p class="text-sm text-gray-400 uppercase tracking-widest">Loading projects...</p>
                </div>

                <!-- All Loaded Message -->
                <div id="allLoadedMsg" class="hidden mt-8 flex-col items-center gap-3">
                    <div class="w-12 h-12 bg-[#1BA0D8] rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 uppercase tracking-widest">All Projects Loaded</p>
                </div>

                <!-- View All Link -->
                <a href="{{ route('projects') }}" class="mt-8 flex items-center gap-2 text-sm text-gray-400 hover:text-[#1BA0D8] transition-colors duration-300 uppercase tracking-widest">
                    <span>View All Projects</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>

            </div>
        </div>
    </section>
    </div>
</section>


<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        
        <!-- Section Header -->
        <div class="max-w-3xl mb-[15px]">
            <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-4">WHY CHOOSE US</div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-700 mb-6 leading-tight">
                Your Trusted Healthcare Partner
            </h2>
            <p class="text-md md:text-xl text-gray-600 leading-relaxed">
                Delivering excellence through innovation, quality, and commitment across East Africa
            </p>
        </div>

        <!-- Feature 1 - Comprehensive Portfolio -->
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div>
                <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-6">COMPREHENSIVE PORTFOLIO</div>
                <h3 class="text-3xl font-bold text-gray-700 mb-6 leading-tight">
                    One-stop shop for all healthcare needs
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    One-stop shop for all healthcare needs across four specialized business divisions
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">BioSciences & Laboratory Solutions</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">MedTech Solutions & Equipment</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Health Systems Planning & Advisory</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4 mt-2 flex-shrink-0"></div>
                        <span class="text-gray-700">Metrology & Calibration Services</span>
                    </li>
                </ul>
            </div>
            <div class="relative h-64 md:h-[500px] rounded overflow-hidden">
                <img src="{{ asset('images/2.jpeg') }}" 
                     alt="Comprehensive Healthcare Solutions" 
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Feature 2 - Technical Expertise -->
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div class="relative h-96 md:h-[600px] rounded overflow-hidden order-2 md:order-1">
                <img src="{{ asset('images/1.jpeg') }}" 
                     alt="Expert Team" 
                     class="w-full h-full object-cover">
            </div>
            <div class="order-1 md:order-2">
                <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-6">TECHNICAL EXPERTISE</div>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                    50+ qualified professionals
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    50+ qualified engineers, scientists, and IT professionals with extensive industry experience
                </p>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                        <div class="text-sm text-gray-600 uppercase tracking-wider">Skilled Professionals</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">8+</div>
                        <div class="text-sm text-gray-600 uppercase tracking-wider">Years Experience</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">6</div>
                        <div class="text-sm text-gray-600 uppercase tracking-wider">Countries Served</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                        <div class="text-sm text-gray-600 uppercase tracking-wider">Healthcare Facilities</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature 3 - Quality Assurance -->
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div>
                <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-6">QUALITY ASSURANCE</div>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                    ISO-certified processes ensuring excellence
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    ISO-certified processes ensuring consistent quality in products and services
                </p>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-700 mb-1">ISO 9001:2015</h4>
                            <p class="text-gray-600">Quality Management System certification</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-700 mb-1">ISO/IEC 17025:2017</h4>
                            <p class="text-gray-600">Calibration laboratory accreditation</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-700 mb-1">ISO 13485:2016</h4>
                            <p class="text-gray-600">Medical devices quality management</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative h-64 md:h-[500px] rounded overflow-hidden">
                <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Quality Assurance" 
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Feature 4 - Rapid Response & Support -->
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div class="relative h-64 md:h-[500px] rounded overflow-hidden order-2 md:order-1">
                <img src="https://images.pexels.com/photos/6129043/pexels-photo-6129043.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="24/7 Support" 
                     class="w-full h-full object-cover">
            </div>
            <div class="order-1 md:order-2">
                <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-6">RAPID RESPONSE</div>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                    24/7 technical support hotline
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    24/7 technical support hotline with guaranteed response times for critical equipment
                </p>
                <div class="mb-8">
                    <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-4">NATIONWIDE COVERAGE</div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Comprehensive user training, technical documentation, and ongoing application support
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        <span class="text-gray-700">Guaranteed response times</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        <span class="text-gray-700">Comprehensive user training</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        <span class="text-gray-700">Technical documentation</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        <span class="text-gray-700">Ongoing application support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature 5 - Accredited Calibration -->
        <div class="grid md:grid-cols-2 gap-16 items-center mb-32">
            <div>
                <div class="text-xs font-semibold uppercase tracking-widest text-blue-600 mb-6">ACCREDITED CALIBRATION</div>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                    ISO/IEC 17025 accredited laboratory
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    ISO/IEC 17025 accredited calibration laboratory with NIST/UKAS traceable standards
                </p>
                <div class="bg-white p-8 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-sm text-gray-500 mb-2">Calibration Standards</div>
                            <div class="font-bold text-gray-700">NIST/UKAS Traceable</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-2">Accreditation</div>
                            <div class="font-bold text-gray-700">ISO/IEC 17025:2017</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-2">Calibration Types</div>
                            <div class="font-bold text-gray-700">Temperature, Pressure, Volume, Mass</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-2">Service Coverage</div>
                            <div class="font-bold text-gray-700">East Africa Wide</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative h-64 md:h-[500px] rounded overflow-hidden">
                <img src="https://images.pexels.com/photos/4225880/pexels-photo-4225880.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Calibration Services" 
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- More Reasons -->
        <div class="mb-32">
            <h3 class="text-3xl font-bold text-gray-700 mb-12">More Reasons to Choose Genyra</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1: Value for Money -->
                <div class="bg-white overflow-hidden group cursor-pointer flex flex-col hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-64 md:h-48 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6129237/pexels-photo-6129237.jpeg?auto=compress&cs=tinysrgb&w=600" 
                             alt="Value for Money" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-xl font-bold text-gray-700 mb-3">Value for Money</h4>
                        <p class="text-sm text-gray-600 leading-relaxed flex-grow">
                            Competitive pricing with flexible payment terms, leasing options, and trade-in programs
                        </p>
                        <div class="flex justify-end mt-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Long-term Partnership -->
                <div class="bg-white overflow-hidden group cursor-pointer flex flex-col hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-64 md:h-48 overflow-hidden">
                        <img src="https://images.pexels.com/photos/5327585/pexels-photo-5327585.jpeg?auto=compress&cs=tinysrgb&w=600" 
                             alt="Long-term Partnership" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-xl font-bold text-gray-700 mb-3">Long-term Partnership</h4>
                        <p class="text-sm text-gray-600 leading-relaxed flex-grow">
                            Average client retention rate >85% with many 10+ year relationships
                        </p>
                        <div class="flex justify-end mt-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Innovation Focus -->
                <div class="bg-white overflow-hidden group cursor-pointer flex flex-col hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-64 md:h-48 overflow-hidden">
                        <img src="https://images.pexels.com/photos/7089401/pexels-photo-7089401.jpeg?auto=compress&cs=tinysrgb&w=600" 
                             alt="Innovation Focus" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-xl font-bold text-gray-700 mb-3">Innovation Focus</h4>
                        <p class="text-sm text-gray-600 leading-relaxed flex-grow">
                            Continuous investment in new technologies and solutions to meet evolving needs
                        </p>
                        <div class="flex justify-end mt-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Local Presence, Global Standards -->
                <div class="bg-white overflow-hidden group cursor-pointer flex flex-col hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-64 md:h-48 overflow-hidden">
                        <img src="https://images.pexels.com/photos/8460157/pexels-photo-8460157.jpeg?auto=compress&cs=tinysrgb&w=600" 
                             alt="Local Presence Global Standards" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-xl font-bold text-gray-700 mb-3">Local Presence, Global Standards</h4>
                        <p class="text-sm text-gray-600 leading-relaxed flex-grow">
                            International quality standards with understanding of local context and requirements
                        </p>
                        <div class="flex justify-end mt-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- Our Clients Section -->
<section id="our-clients" class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">

        <!-- Section Header -->
        <div class="max-w-3xl mb-20">
            <div class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-4">OUR CLIENTS</div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-700 mb-6 leading-tight">
                Trusted by Leading Healthcare Institutions
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Partnering with hospitals, research institutions, laboratories & healthcare facilities across East Africa and Beyond
            </p>
        </div>

        <!-- Zeiss Style Image Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2 mb-20" id="clientsGrid">

            <!-- Card 1: National & County Hospitals - Hospital building/ward -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/263402/pexels-photo-263402.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="National and County Referral Hospitals"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        National & County Referral Hospitals
                    </h3>
                    <p class="text-sm text-gray-200 leading-relaxed" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">
                        Leading referral hospitals and county healthcare facilities across Kenya and East Africa
                    </p>
                </div>
            </div>

            <!-- Card 2: Private Healthcare - Modern private hospital interior -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/668300/pexels-photo-668300.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Private Healthcare Facilities"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Private Healthcare Facilities
                    </h3>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Aga Khan University Hospital</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Nairobi Hospital</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">MP Shah Hospital</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Gertrude's Children's Hospital</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Research Institutions - Scientists in research lab -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Research Institutions"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Research Institutions
                    </h3>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">KEMRI</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">ILRI</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">ICRAF</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Universities & Research Centers</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Diagnostic Laboratories - Lab technician with diagnostic equipment -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/954585/pexels-photo-954585.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Diagnostic Laboratories"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Diagnostic Laboratories
                    </h3>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Lancet Kenya</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Pathologists Lancet</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Independent Laboratories</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Hospital Laboratories</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5: Pharmaceutical Companies - Pharma manufacturing/pills -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/360622/pexels-photo-360622.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Pharmaceutical Companies"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Pharmaceutical Companies
                    </h3>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Manufacturing Facilities</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Quality Control Laboratories</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">R&D Centers</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6: Blood & Academic - Blood donation/transfusion -->
            <div class="client-card relative h-[420px] overflow-hidden group cursor-pointer">
                <img src="https://images.pexels.com/photos/6823561/pexels-photo-6823561.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Blood Transfusion and Academic Institutions"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/10 group-hover:from-black/90 group-hover:via-black/60 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
                    <span class="text-xs font-semibold uppercase tracking-widest text-[#1BA0D8] mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">CLIENT CATEGORY</span>
                    <h3 class="text-2xl font-bold leading-tight mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.9);">
                        Blood & Academic Institutions
                    </h3>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Kenya National Blood Transfusion Service</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Regional Blood Banks</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">University Teaching Hospitals</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-[#1BA0D8] rounded-full mr-2 flex-shrink-0"></div>
                            <span class="text-sm text-gray-200" style="text-shadow: 0 1px 4px rgba(0,0,0,0.9);">Medical Schools & Training Institutions</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Stats Bar -->
        <div class="grid md:grid-cols-4 gap-0 border border-gray-200">
            <div class="p-10 text-center border-r border-gray-200">
                <div class="text-5xl font-bold text-[#2B3E7E] mb-2">50+</div>
                <div class="text-sm uppercase tracking-widest text-gray-500">Healthcare Facilities</div>
            </div>
            <div class="p-10 text-center border-r border-gray-200">
                <div class="text-5xl font-bold text-[#1BA0D8] mb-2">6</div>
                <div class="text-sm uppercase tracking-widest text-gray-500">Countries Served</div>
            </div>
            <div class="p-10 text-center border-r border-gray-200">
                <div class="text-5xl font-bold text-[#2B3E7E] mb-2">95%+</div>
                <div class="text-sm uppercase tracking-widest text-gray-500">Client Retention Rate</div>
            </div>
            <div class="p-10 text-center">
                <div class="text-5xl font-bold text-[#1BA0D8] mb-2">9+</div>
                <div class="text-sm uppercase tracking-widest text-gray-500">Year Relationships</div>
            </div>
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
                                <span class="font-semibold">Main:</span> <a href="tel:+254705435438" class="hover:text-blue-600 transition-colors">+254 705 435 438</a>
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
                            Call us at <a href="tel:+254705435438" class="text-blue-600 hover:underline font-semibold">+254 705 435 438</a> or email 
                            <a href="mailto:sales@genyragroup.com" class="text-blue-600 hover:underline font-semibold">sales@genyragroup.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection