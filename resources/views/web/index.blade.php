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
                  <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-8 leading-tight">
                      <span>Transforming</span> 
                      <span>Healthcare Across</span>
                      <span>East Africa</span>
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
                  <h1 class="text-3xl md:text-4xl font-bold text-gray-700 mb-6 leading-tight">
                      Transforming Healthcare Across East Africa
                  </h1>
                  <a href="#about" class="btn-primary">
                      Learn more
                  </a>
              </div>
          </div>
      </div>
  </section>

<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Optional Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-700 mb-4 text-left md:text-center">Our Solutions</h2>
            <p class="text-md text-gray-600 text-left md:text-center">Comprehensive healthcare solutions across East Africa</p>
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
<section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
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
<section id="about" class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 gap-16 items-stretch">
            <div class="flex flex-col justify-center">
                <div class="category-label mb-4">ABOUT GENYRA GROUP</div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-gray-700">
                    Leading Healthcare Solutions Provider in East Africa
                </h2>
                <p class="text-md text-gray-600 mb-6 leading-relaxed">
                    Genyra Group is East Africa's leading provider of comprehensive healthcare solutions, specializing in laboratory equipment, medical devices, health information systems, and metrology services. Established with a vision to transform healthcare delivery through innovation and excellence, we serve hospitals, research institutions, diagnostic laboratories, pharmaceutical companies, and healthcare facilities across the region.
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
                <img src="https://images.pexels.com/photos/3938023/pexels-photo-3938023.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                     alt="Laboratory" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
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
              <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-700 text-left md:text-center" >Business Lines</h2>
              <p class="text-xl text-gray-600 max-w-3xl mx-auto text-left md:text-center">
                  Comprehensive healthcare solutions tailored to meet diverse needs
              </p>
          </div>
          
          <div class="grid md:grid-cols-2 gap-8">
              <!-- BioSciences -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=800" alt="BioSciences" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/3b82f6/ffffff?text=BioSciences'">
                  <div class="p-8">
                      <div class="category-label mb-3">DISCOVERY • DIAGNOSTICS • TRANSLATION</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">BioSciences</h3>
                      <p class="text-gray-600 mb-6">
                          Advanced laboratory testing, research sample analysis, translational research support, and clinical trials.
                      </p>
                      <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                          Learn more
                          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                      </a>
                  </div>
              </div>

              <!-- MedTech Solutions -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/356040/pexels-photo-356040.jpeg?auto=compress&cs=tinysrgb&w=800" alt="MedTech" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/10b981/ffffff?text=MedTech'">
                  <div class="p-8">
                      <div class="category-label mb-3">SMART TECHNOLOGIES FOR BETTER HEALTH</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">MedTech Solutions</h3>
                      <p class="text-gray-600 mb-6">
                          Diagnostic equipment, point-of-care testing, digital health tools, and comprehensive medical supplies.
                      </p>
                      <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                          Learn more
                          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                      </a>
                  </div>
              </div>

              <!-- Health Systems Planning -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Planning" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/8b5cf6/ffffff?text=Health+Systems'">
                  <div class="p-8">
                      <div class="category-label mb-3">RESILIENT COMPLIANT SYSTEMS</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">Health Systems Planning & Advisory</h3>
                      <p class="text-gray-600 mb-6">
                          Strategic planning, quality management systems, laboratory accreditation, and health policy advisory.
                      </p>
                      <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                          Learn more
                          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                      </a>
                  </div>
              </div>

              <!-- Metrology & Calibration -->
              <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover">
                  <img src="https://images.pexels.com/photos/4226881/pexels-photo-4226881.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Calibration" class="w-full h-64 object-cover" onerror="this.src='https://via.placeholder.com/800x400/f97316/ffffff?text=Metrology'">
                  <div class="p-8">
                      <div class="category-label mb-3">PRECISION YOU CAN TRUST</div>
                      <h3 class="text-2xl font-bold mb-4 text-gray-700">Metrology & Calibration Services</h3>
                      <p class="text-gray-600 mb-6">
                          ISO/IEC 17025 accredited calibration, measurement verification, and equipment performance audits.
                      </p>
                      <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center">
                          Learn more
                          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                          </svg>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>

<!-- Projects Section -->
<section id="projects" class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
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
        <div class="text-center mt-12">
            <a href="{{ route('projects') }}" class="inline-block bg-blue-600 text-white px-10 py-4 rounded font-semibold text-base hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                Discover more
            </a>
        </div>
    </div>
</section>

@endsection