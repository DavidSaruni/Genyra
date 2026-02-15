<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title','Genyra Group - Healthcare Solutions Across East Africa')
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/web/style.css') }}">
</head>


<style>
/* Subtle blur effect - NO SHADOWS, NO SCALE */
.highlight-card {
    filter: blur(0px) brightness(1);
    box-shadow: none;
}

#highlightGrid:has(.highlight-card:hover) .highlight-card:not(:hover) {
    filter: blur(1.5px) brightness(0.75);
    box-shadow: none;
}

#highlightGrid .highlight-card:hover {
    filter: blur(0px) brightness(1.05);
    z-index: 10;
    box-shadow: none;
}

/* Project card blur effect - same as highlight cards */
.project-card {
    filter: blur(0px) brightness(1);
    box-shadow: none;
}

#projectsGrid:has(.project-card:hover) .project-card:not(:hover) {
    filter: blur(1.5px) brightness(0.75);
    box-shadow: none;
}

#projectsGrid .project-card:hover {
    filter: blur(0px) brightness(1.05);
    z-index: 10;
    box-shadow: none;
}
</style>

<body class="bg-white text-gray-900">


<!-- navbar -->
@include('web.layouts.navbar')


<div style="min-height: 100vh;">
    @yield('body')
</div>

    <!-- Contact Section -->
    <!-- <section id="contact" class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-16">
                <div>
                    <div class="category-label mb-4">GET IN TOUCH</div>
                    <h2 class="text-4xl font-bold mb-8 text-gray-900">Contact Information</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <h3 class="font-bold text-lg mb-2">Head Office</h3>
                            <p class="text-gray-600">P.O. Box 43844, 00100<br/>Nairobi, Kenya</p>
                        </div>
                        
                        <div>
                            <h3 class="font-bold text-lg mb-2">Phone</h3>
                            <p class="text-gray-600">+254 705 435 438</p>
                        </div>
                        
                        <div>
                            <h3 class="font-bold text-lg mb-2">Email</h3>
                            <p class="text-gray-600">
                                General: info@genyragroup.com<br/>
                                Sales: sales@genyragroup.com<br/>
                                Support: support@genyragroup.com
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="font-bold text-lg mb-2">Business Hours</h3>
                            <p class="text-gray-600">
                                Monday - Friday: 8:00 AM - 5:00 PM<br/>
                                Saturday: 9:00 AM - 1:00 PM
                            </p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-bold mb-6">Send us a Message</h3>
                        <form class="space-y-4">
                            <div>
                                <input type="text" placeholder="Your Name" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <input type="email" placeholder="Your Email" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <input type="tel" placeholder="Phone Number" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <textarea rows="4" placeholder="Your Message" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- footer -->
@include('web.layouts.footer')

@include('web.layouts.script')

</body>
</html>