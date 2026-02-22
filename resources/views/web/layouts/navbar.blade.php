<!-- Top Bar -->
<div class="top-bar py-2 px-4 fixed w-full z-50 top-0">
    <div class="max-w-7xl mx-auto flex justify-between items-center text-sm">
        <div>Genyra Group</div>
        <div class="hidden md:flex items-center space-x-2 font-extrabold">
            <span class="text-blue-600 font-medium">Think</span>
            <span class="text-white">•</span>
            <span class="text-sky-500 font-medium">Innovate</span>
            <span class="text-white">•</span>
            <span class="text-blue-600 font-medium">Solve</span>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="main-nav fixed w-full z-50 top-8 transition-all duration-300 bg-white" id="mainNav">
    <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8 py-1 md:py-0">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="w-32 h-32 md:w-64 md:h-64 rounded-full overflow-hidden flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img 
                    src="{{ asset('images/logo.jpeg') }}" 
                    alt="Genyra Group Logo"
                    class="w-full h-full object-contain"
                >
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 text-sm">
                <div class="relative">
                <!-- Toggle -->
                <div class="nav-link flex items-center gap-1 cursor-pointer pl-4" id="aboutToggle">
                    ABOUT US
                    <svg class="w-4 h-4 transition-transform duration-300" id="aboutArrow" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7z"/>
                    </svg>
                </div>
                <!-- Dropdown -->
                <div id="aboutDropdown"
                    class="absolute left-0 top-full mt-8 w-[700px] bg-white shadow-2xl rounded-xl
                            opacity-0 invisible translate-y-2
                            transition-all duration-300 ease-in-out z-50">

                    <!-- Close Button -->
                    <button id="dropdownClose"
                            class="absolute top-4 right-4 p-2 text-gray-600 hover:text-gray-900 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <div class="p-8">
                        <div class="grid grid-cols-3 gap-8">
                            <div>
                                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b">
                                    About
                                </h3>
                                <ul class="space-y-3">
                                    <li><a href="{{ route('our-story') }}" class="text-gray-600 text-sm hover:text-blue-600">Our Story</a></li>
                                    <li><a href="{{ route('vission-mission') }}" class="text-gray-600 text-sm hover:text-blue-600">Vision & Mission</a></li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b">
                                    Governance
                                </h3>
                                <ul class="space-y-3">
                                    <li><a href="#about" class="text-gray-600 text-sm hover:text-blue-600">Board of Directors</a></li>
                                    <li><a href="#about" class="text-gray-600 text-sm hover:text-blue-600">Management Team</a></li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b">
                                    Company
                                </h3>
                                <ul class="space-y-3">
                                    <li><a href="{{ route('values') }}" class="text-gray-600 text-sm hover:text-blue-600">Our Values</a></li>
                                    <li><a href="{{ route('strategic-direction') }}" class="text-gray-600 text-sm hover:text-blue-600">Strategic Direction</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <a href="{{ request()->is('/') ? '#why-choose-us' : url('/#why-choose-us') }}" class="nav-link">WHY CHOOSE US</a>
                <a href="{{ request()->is('/') ? '#business-lines' : url('/#business-lines') }}" class="nav-link">WHAT WE DO</a>
                <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'text-blue-800 font-bold' : 'nav-link' }}">GENYRA ACADEMY</a>


            </div>
            
            <!-- Right side -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#contact" class="nav-link">CONTACT</a>
                
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2">
                <svg class="w-10 h-10 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>



    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden transition-opacity duration-300 opacity-0 invisible"></div>
    
    <!-- Mobile Menu - Slides from Right -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-full bg-white z-50 md:hidden transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
        <!-- Mobile Menu Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 sticky top-0 bg-white z-10">
            <button id="mobile-menu-back" class="flex items-center text-blue-600 hover:text-blue-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="text-sm font-medium">back</span>
            </button>
            <h2 class="text-lg font-bold text-gray-700">GENYRA Group</h2>
            <button id="mobile-menu-close" class="p-2 text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Content -->
        <div class="px-4 py-6">
            <!-- About Us Button -->
            <button id="mobile-about-toggle" class="w-full flex items-center justify-between px-4 py-4 text-left text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">
                <span>ABOUT US</span>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Other Menu Items -->
            <a href="{{ request()->is('/') ? '#why-choose-us' : url('/#why-choose-us') }}" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">WHY CHOOSE US</a>
            <a href="{{ request()->is('/') ? '#business-lines' : url('/#business-lines') }}" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">WHAT WE DO</a>
            <!-- courses -->
            <a href="{{ route('courses') }}" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">GENYRA ACADEMY</a>
            <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}" class="block px-4 py-4 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition-colors">CONTACT</a>
        </div>
    </div>

    <!-- Mobile About Submenu - Slides from Right -->
    <div id="mobile-about-submenu" class="fixed top-0 right-0 h-full w-full bg-white z-[60] md:hidden transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
        <!-- Submenu Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 sticky top-0 bg-white z-10">
            <button id="submenu-back" class="flex items-center text-blue-600 hover:text-blue-700">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="text-sm font-medium">back</span>
            </button>
            <h2 class="text-lg font-bold text-gray-700">GENYRA Group</h2>
            <button id="submenu-close" class="p-2 text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Submenu Content -->
        <div class="px-4 py-6">
            <!-- About Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">About</h3>
                <div class="space-y-1">
                    <a href="{{ route('our-story') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Our Story</a>
                    <a href="{{ route('vission-mission') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Vision & Mission</a>
                </div>
            </div>
            
            <!-- Governance Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">Governance</h3>
                <div class="space-y-1">
                    <a href="" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Board of Directors</a>
                    <a href="" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Management Team</a>
                </div>
            </div>
            
            <!-- Company Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">Company</h3>
                <div class="space-y-1">
                    <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Our Values</a>
                    <a href="{{ route('strategic-direction') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Strategic Direction</a>
                </div>
            </div>
        </div>
    </div>
</nav>