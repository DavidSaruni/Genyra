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

</body>
</html>