<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genyra Admin - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        genyra: {
                            primary: '#1e40af',
                            secondary: '#3b82f6',
                            accent: '#60a5fa',
                            dark: '#1e293b',
                            light: '#f1f5f9'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 h-screen overflow-hidden">

    <!-- Sidebar overlay (mobile tap-to-close) -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-10 hidden lg:hidden"></div>

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-genyra-dark text-white z-20 flex flex-col -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <div class="p-4 border-b border-gray-700 flex-shrink-0">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Genyra" class="h-10 w-auto rounded">
                </div>
            </div>
            <nav class="mt-8 flex-1 overflow-y-auto">
                <a href="{{ route('admin.index') }}" class="block py-3 px-4 hover:bg-genyra-primary transition-colors {{ request()->routeIs('admin.index') ? 'bg-genyra-primary border-l-4 border-genyra-accent' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.news.index') }}" class="block py-3 px-4 hover:bg-genyra-primary transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-genyra-primary border-l-4 border-genyra-accent' : '' }}">
                    <i class="fas fa-newspaper mr-3"></i> News Management
                </a>
            </nav>
        </aside>

        <!-- Main Content — offset by sidebar width on desktop only -->
        <div class="flex flex-col w-full lg:pl-64 overflow-hidden">

            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 flex-shrink-0">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <!-- Hamburger — mobile only -->
                        <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-600">
                            <i class="fas fa-user-circle mr-2"></i> {{ auth()->user()->name }}
                        </span>
                        <!-- Logout Button -->
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-red-600 transition-colors" title="Logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 p-6 overflow-y-auto bg-gray-50">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var btn      = document.getElementById('mobile-menu-btn');
            var sidebar  = document.getElementById('sidebar');
            var overlay  = document.getElementById('sidebar-overlay');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }

            if (btn) btn.addEventListener('click', openSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeSidebar();
            });
        });
    </script>
</body>
</html>