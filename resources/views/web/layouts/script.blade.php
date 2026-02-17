<script>
    // Desktop About dropdown toggle
    const aboutToggle = document.getElementById('aboutToggle');
    const aboutDropdown = document.getElementById('aboutDropdown');
    const aboutArrow = document.getElementById('aboutArrow');
    const dropdownClose = document.getElementById('dropdownClose');
    let isDropdownOpen = false;

    function closeDropdown() {
        aboutDropdown.style.maxHeight = '0';
        aboutDropdown.classList.add('opacity-0', 'invisible');
        aboutDropdown.classList.remove('opacity-100', 'visible');
        aboutArrow.style.transform = 'rotate(0deg)';
        isDropdownOpen = false;
    }

    aboutToggle.addEventListener('click', (e) => {
        e.preventDefault();
        isDropdownOpen = !isDropdownOpen;
        
        if (isDropdownOpen) {
            // Open dropdown - slide down from top
            aboutDropdown.style.maxHeight = '500px'; 
            aboutDropdown.classList.remove('opacity-0', 'invisible');
            aboutDropdown.classList.add('opacity-100', 'visible');
            aboutArrow.style.transform = 'rotate(180deg)';
        } else {
            closeDropdown();
        }
    });

    // Close button click handler
    dropdownClose.addEventListener('click', (e) => {
        e.preventDefault();
        closeDropdown();
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!aboutToggle.contains(e.target) && !aboutDropdown.contains(e.target)) {
            if (isDropdownOpen) {
                closeDropdown();
            }
        }
    });

    // Close dropdown when clicking on a link inside
    const dropdownLinks = aboutDropdown.querySelectorAll('a');
    dropdownLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeDropdown();
        });
    });

    // Mobile menu elements
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const mobileMenuBack = document.getElementById('mobile-menu-back');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    
    // Mobile submenu elements
    const mobileAboutToggle = document.getElementById('mobile-about-toggle');
    const mobileAboutSubmenu = document.getElementById('mobile-about-submenu');
    const submenuBack = document.getElementById('submenu-back');
    const submenuClose = document.getElementById('submenu-close');
    
    // Prevent body scroll when menu is open
    function preventBodyScroll(prevent) {
        if (prevent) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
    
    // Open main mobile menu
    function openMobileMenu() {
        mobileMenu.classList.remove('translate-x-full');
        mobileMenuOverlay.classList.remove('opacity-0', 'invisible');
        mobileMenuOverlay.classList.add('opacity-100', 'visible');
        preventBodyScroll(true);
    }
    
    // Close main mobile menu
    function closeMobileMenu() {
        mobileMenu.classList.add('translate-x-full');
        mobileMenuOverlay.classList.add('opacity-0', 'invisible');
        mobileMenuOverlay.classList.remove('opacity-100', 'visible');
        preventBodyScroll(false);
        
        // Also close submenu if it's open
        closeSubmenu();
    }
    
    // Open about submenu
    function openSubmenu() {
        mobileAboutSubmenu.classList.remove('translate-x-full');
    }
    
    // Close about submenu
    function closeSubmenu() {
        mobileAboutSubmenu.classList.add('translate-x-full');
    }
    
    // Event: Open mobile menu
    mobileMenuBtn.addEventListener('click', () => {
        openMobileMenu();
    });
    
    // Event: Close mobile menu (back button)
    mobileMenuBack.addEventListener('click', () => {
        closeMobileMenu();
    });
    
    // Event: Close mobile menu (close button)
    mobileMenuClose.addEventListener('click', () => {
        closeMobileMenu();
    });
    
    // Event: Close mobile menu (overlay click)
    mobileMenuOverlay.addEventListener('click', () => {
        closeMobileMenu();
    });
    
    // Event: Open about submenu
    mobileAboutToggle.addEventListener('click', () => {
        openSubmenu();
    });
    
    // Event: Go back from submenu
    submenuBack.addEventListener('click', () => {
        closeSubmenu();
    });
    
    // Event: Close submenu and main menu
    submenuClose.addEventListener('click', () => {
        closeMobileMenu();
    });
    
    // Close mobile menu when clicking on main menu links
    const mobileMainLinks = mobileMenu.querySelectorAll('a[href^="#"]');
    mobileMainLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeMobileMenu();
        });
    });
    
    // Close everything when clicking on submenu links
    const submenuLinks = mobileAboutSubmenu.querySelectorAll('a[href^="#"]');
    submenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeMobileMenu();
        });
    });

    // Video controls with auto-play next
    const video = document.getElementById('heroVideo');
    const pauseBtn = document.getElementById('pauseBtn');
    const pauseIcon = document.getElementById('pauseIcon');
    const playIcon = document.getElementById('playIcon');
    const animatedBg = document.getElementById('animatedBg');
    const videoLoading = document.getElementById('videoLoading');

    if (video) {
        // Video playlist
        const videoPlaylist = [
            '{{ asset("videos/video1.mp4") }}',
            '{{ asset("videos/video2.mp4") }}',
            '{{ asset("videos/video3.mp4") }}',
            '{{ asset("videos/video4.mp4") }}',
            '{{ asset("videos/video5.mp4") }}'
        ];
        
        let currentVideoIndex = 0;

        // Load video function
        function loadVideo(index) {
            currentVideoIndex = index;
            video.src = videoPlaylist[index];
            video.load();
            video.play().catch(err => {
                console.log('Video autoplay prevented:', err);
            });
        }

        // Play next video function with smooth transition
        function playNextVideo() {
            // Fade out current video
            video.classList.add('fade-out');
            
            setTimeout(() => {
                currentVideoIndex = (currentVideoIndex + 1) % videoPlaylist.length;
                video.src = videoPlaylist[currentVideoIndex];
                video.load();
                video.play().catch(err => {
                    console.log('Video autoplay prevented:', err);
                });
                
                // Fade back in
                video.classList.remove('fade-out');
            }, 800); // Match the CSS transition duration
        }

        // Show animated background by default
        if (animatedBg) animatedBg.style.display = 'block';
        
        // Load first video on page load
        loadVideo(0);
        
        // Add a timeout to show loading spinner if video takes too long
        let loadingTimeout = setTimeout(() => {
            if (!video.readyState || video.readyState < 3) {
                if (videoLoading) videoLoading.style.display = 'block';
            }
        }, 1000);

        // When video is ready to play
        video.addEventListener('loadeddata', () => {
            clearTimeout(loadingTimeout);
            if (videoLoading) videoLoading.style.display = 'none';
            
            // Try to play the video
            video.play().then(() => {
                if (animatedBg) animatedBg.style.display = 'none';
                if (pauseBtn) pauseBtn.style.display = 'flex';
            }).catch(err => {
                console.log('Video autoplay prevented:', err);
                if (pauseBtn) pauseBtn.style.display = 'flex';
                if (pauseIcon) pauseIcon.classList.add('hidden');
                if (playIcon) playIcon.classList.remove('hidden');
            });
        });

        // When video ends, play next video
        video.addEventListener('ended', () => {
            playNextVideo();
        });

        video.addEventListener('error', (e) => {
            console.log('Video loading error:', e);
            clearTimeout(loadingTimeout);
            if (videoLoading) videoLoading.style.display = 'none';
            if (animatedBg) animatedBg.style.display = 'block';
            if (pauseBtn) pauseBtn.style.display = 'none';
            playNextVideo();
        });

        // Pause/Play button functionality
        if (pauseBtn) {
            pauseBtn.addEventListener('click', () => {
                if (video.paused) {
                    video.play().then(() => {
                        if (animatedBg) animatedBg.style.display = 'none';
                        if (pauseIcon) pauseIcon.classList.remove('hidden');
                        if (playIcon) playIcon.classList.add('hidden');
                    }).catch(err => {
                        console.log('Play failed:', err);
                    });
                } else {
                    video.pause();
                    if (pauseIcon) pauseIcon.classList.add('hidden');
                    if (playIcon) playIcon.classList.remove('hidden');
                }
            });
        }
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offset = 100; 
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Navbar scroll effect
    const nav = document.getElementById('mainNav');
    const topBar = document.querySelector('.top-bar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            // Hide top bar and move nav to top
            if (topBar) topBar.style.transform = 'translateY(-100%)';
            nav.style.top = '0';
            nav.classList.add('shadow-lg');
        } else {
            if (topBar) topBar.style.transform = 'translateY(0)';
            nav.style.top = '32px';
            nav.classList.remove('shadow-lg');
        }
        
        lastScroll = currentScroll;
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.card-hover').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });

    const heroContentOverlay = document.querySelector('.hero-content.absolute');
    const smallHeroContent = document.getElementById('small-hero-content');

    function updateHeroContentVisibility() {
        if (window.innerWidth <= 768) {
            if (heroContentOverlay) heroContentOverlay.style.display = 'none';
            if (smallHeroContent) smallHeroContent.classList.remove('hidden');
        } else {
            // Desktop: show overlay, hide below-video content
            if (heroContentOverlay) heroContentOverlay.style.display = 'flex';
            if (smallHeroContent) smallHeroContent.classList.add('hidden');
        }
    }

    updateHeroContentVisibility();

    window.addEventListener('resize', updateHeroContentVisibility);
</script>


<script>
// Subtle focus effect - NO SCALE
document.addEventListener('DOMContentLoaded', function() {
    const highlightCards = document.querySelectorAll('.highlight-card');
    const grid = document.getElementById('highlightGrid');
    
    highlightCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            highlightCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.filter = 'blur(1.5px) brightness(0.75)';
                    otherCard.style.boxShadow = 'none';
                }
            });
            card.style.filter = 'blur(0px) brightness(1.05)';
            card.style.zIndex = '10';
            card.style.boxShadow = 'none';
        });
    });
    
    grid.addEventListener('mouseleave', function() {
        highlightCards.forEach(card => {
            card.style.filter = 'blur(0px) brightness(1)';
            card.style.zIndex = '1';
            card.style.boxShadow = 'none';
        });
    });
});
</script>

<script>
// Project cards focus effect - same as highlight cards
document.addEventListener('DOMContentLoaded', function() {
    const projectCards = document.querySelectorAll('.project-card');
    const projectGrid = document.getElementById('projectsGrid');
    
    projectCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            projectCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.filter = 'blur(1.5px) brightness(0.75)';
                    otherCard.style.boxShadow = 'none';
                }
            });
            card.style.filter = 'blur(0px) brightness(1.05)';
            card.style.zIndex = '10';
            card.style.boxShadow = 'none';
        });
    });
    
    projectGrid.addEventListener('mouseleave', function() {
        projectCards.forEach(card => {
            card.style.filter = 'blur(0px) brightness(1)';
            card.style.zIndex = '1';
            card.style.boxShadow = 'none';
        });
    });
});
</script>

<script>
// Client cards focus effect - same as highlight cards
document.addEventListener('DOMContentLoaded', function() {
    const clientCards = document.querySelectorAll('.client-card');
    const clientsGrid = document.getElementById('clientsGrid');
    
    clientCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            clientCards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.style.filter = 'blur(1.5px) brightness(0.75)';
                    otherCard.style.boxShadow = 'none';
                }
            });
            card.style.filter = 'blur(0px) brightness(1.05)';
            card.style.zIndex = '10';
            card.style.boxShadow = 'none';
        });
    });
    
    clientsGrid.addEventListener('mouseleave', function() {
        clientCards.forEach(card => {
            card.style.filter = 'blur(0px) brightness(1)';
            card.style.zIndex = '1';
            card.style.boxShadow = 'none';
        });
    });
});
</script>

<script>
// Active nav link tracking
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    // Function to update active link
    function updateActiveLink() {
        const scrollPosition = window.scrollY;
        
        navLinks.forEach(link => {
            const targetId = link.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                const sectionTop = targetSection.offsetTop - 100;
                const sectionBottom = sectionTop + targetSection.offsetHeight;
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                }
            }
        });
    }
    
    // Handle direct link clicks
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('active'));
                // Add active class to clicked link
                this.classList.add('active');
            }
        });
    });
    
    // Update active link on scroll
    window.addEventListener('scroll', updateActiveLink);
    
    // Initial check
    updateActiveLink();
});
</script>