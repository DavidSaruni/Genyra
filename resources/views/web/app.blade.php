<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $seoTitle = trim($__env->yieldContent('title')) ?: 'genyra Group - Building Solutions | Transforming Healthcare';
        $seoDescription = trim($__env->yieldContent('meta_description')) ?: 'genyra Group delivers MedTech, BioSciences, calibration, and health systems solutions across East Africa.';
        $seoImage = trim($__env->yieldContent('meta_image')) ?: asset('images/favicon.jpeg');
        $seoCanonical = trim($__env->yieldContent('canonical')) ?: url()->current();
        $seoOgType = trim($__env->yieldContent('og_type')) ?: 'website';
    @endphp
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $seoCanonical }}">
    <meta property="og:type" content="{{ $seoOgType }}">
    <meta property="og:site_name" content="genyra Group">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    @stack('head')
    @include('web.partials.seo.structured-data')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
  <script src="https://kit.fontawesome.com/8a42449199.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/web/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

/* Client card blur effect - same as highlight cards */
.client-card {
    filter: blur(0px) brightness(1);
    box-shadow: none;
}

#clientsGrid:has(.client-card:hover) .client-card:not(:hover) {
    filter: blur(1.5px) brightness(0.75);
    box-shadow: none;
}


#clientsGrid .client-card:hover {
    filter: blur(0px) brightness(1.05);
    z-index: 10;
    box-shadow: none;
}

/* Active nav link styling */
.nav-link.active {
    color: #2563eb;
    font-weight: 600;
    border-bottom: 2px solid #2563eb;
}
</style>

<body class="bg-white text-gray-900">


<!-- navbar -->
@include('web.layouts.navbar')


<div style="min-height: 100vh;">
    @yield('body')
</div>


<!-- footer -->
@include('web.layouts.footer')

@include('web.layouts.script')


<x-sweet-alert/>
</body>
</html>