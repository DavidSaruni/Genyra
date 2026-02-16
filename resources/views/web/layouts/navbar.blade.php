<!-- Top Bar -->
<div class="top-bar py-2 px-4 fixed w-full z-50 top-0">
    <div class="max-w-7xl mx-auto flex justify-between items-center text-sm">
        <div>Genyra Group</div>
        <div class="hidden md:block">East Africa Healthcare Solutions</div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="main-nav fixed w-full z-50 top-8 transition-all duration-300 bg-white" id="mainNav">
    <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8 py-2 md:py-0">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="w-64 h-64 rounded-full overflow-hidden">
                <a href="{{ route('home') }}">
                    <img 
                    src="{{ asset('images/logo.jpeg') }}" 
                    alt="Genyra Group Logo"
                    class="w-full h-full object-contain"
                >
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center w-full space-x-8">
                <div class="relative">
                    <div class="nav-link flex items-center gap-1 cursor-pointer pl-4" id="aboutToggle">
                        About us
                        <svg class="w-4 h-4 transition-transform duration-300" id="aboutArrow" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7z"/>
                        </svg>
                    </div>
                </div>
                <a href="#solutions" class="nav-link">Solutions</a>
                <a href="#why-choose-us" class="nav-link">Why Choose Us</a>
                <a href="#business-lines" class="nav-link">Business Lines</a>
                <a href="#projects" class="nav-link">Projects</a>
            </div>
            
            <!-- Right side -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#contact" class="nav-link">Contact</a>
                <button class="text-gray-700 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2">
                <svg class="w-10 h-10 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Full Width Dropdown - slides from top -->
    <div id="aboutDropdown" class="absolute left-0 right-0 w-full bg-white shadow-lg overflow-hidden transition-all duration-500 ease-in-out opacity-0 invisible" style="max-height: 0; top: 100%;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Close button -->
            <button id="dropdownClose" class="absolute top-6 right-8 p-2 text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <div class="grid grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b-2 border-gray-200">Who We Are</h3>
                    <ul class="space-y-3">
                        <li><a href="#about" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Our Story</a></li>
                        <li><a href="#about" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Mission & Vision</a></li>
                        <li><a href="#about" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Our Values</a></li>
                        <li><a href="#about" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Leadership Team</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b-2 border-gray-200">Our Work</h3>
                    <ul class="space-y-3">
                        <li><a href="#business-lines" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Healthcare Innovation</a></li>
                        <li><a href="#business-lines" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Clinical Excellence</a></li>
                        <li><a href="#business-lines" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Regional Impact</a></li>
                        <li><a href="#solutions" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Solutions Overview</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-900 mb-4 pb-2 border-b-2 border-gray-200">Get Involved</h3>
                    <ul class="space-y-3">
                        <li><a href="#contact" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Partners</a></li>
                        <li><a href="#projects" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Case Studies</a></li>
                        <li><a href="#contact" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Careers</a></li>
                        <li><a href="#contact" class="text-gray-600 text-sm transition-all hover:text-blue-600 hover:translate-x-1 inline-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
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
                <span>About us</span>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Other Menu Items -->
            <a href="#solutions" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">Solutions</a>
            <a href="#why-choose-us" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">Why Choose Us</a>
            <a href="#business-lines" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">Business Lines</a>
            <a href="#projects" class="block px-4 py-4 text-gray-900 font-medium hover:bg-gray-50 rounded-lg transition-colors">Projects</a>
            <a href="#contact" class="block px-4 py-4 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition-colors">Contact</a>
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
            <!-- Who We Are Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">Who We Are</h3>
                <div class="space-y-1">
                    <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Our Story</a>
                    <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Mission & Vision</a>
                    <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Our Values</a>
                    <a href="#about" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Leadership Team</a>
                </div>
            </div>

            <!-- Our Work Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">Our Work</h3>
                <div class="space-y-1">
                    <a href="#business-lines" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Healthcare Innovation</a>
                    <a href="#business-lines" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Clinical Excellence</a>
                    <a href="#business-lines" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Regional Impact</a>
                    <a href="#solutions" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Solutions Overview</a>
                </div>
            </div>

            <!-- Get Involved Section -->
            <div class="mb-8">
                <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4 px-4">Get Involved</h3>
                <div class="space-y-1">
                    <a href="#contact" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Partners</a>
                    <a href="#projects" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Case Studies</a>
                    <a href="#contact" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Careers</a>
                    <a href="#contact" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</nav>