<!doctype html>
<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-bs-theme="light"
  data-assets-path="{{ asset('dashboard/assets') }}/"
  data-template="vertical-menu-template"
>
<head>
  <meta charset="utf-8" />
  <script>
    (function () {
      var stored = localStorage.getItem('genyra-admin-theme') || 'light';
      var theme = stored === 'system'
        ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light')
        : stored;
      document.documentElement.setAttribute('data-bs-theme', theme);
      document.documentElement.style.backgroundColor = theme === 'dark' ? '#25293c' : '#f8f7fa';
      document.documentElement.style.colorScheme = theme === 'dark' ? 'dark' : 'light';
    })();
  </script>
  <style>
    html, body { background-color: #f8f7fa; }
    html[data-bs-theme="dark"], html[data-bs-theme="dark"] body { background-color: #25293c; }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Genyra Admin — @yield('title', 'Dashboard')</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/favicon.jpeg') }}" />

  <link rel="preload" href="{{ asset('dashboard/assets/vendor/css/core.css') }}" as="style" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/iconify-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/pages/cards-advance.css') }}" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <style>
    /* Genyra brand colors (logo navy + cyan) */
    :root,
    [data-bs-theme="light"] {
      --bs-primary: #1a237e;
      --bs-primary-rgb: 26, 35, 126;
      --bs-primary-text-emphasis: #12185a;
      --bs-primary-bg-subtle: #e8eaf6;
      --bs-primary-border-subtle: #9fa8da;
      --bs-info: #00aeef;
      --bs-info-rgb: 0, 174, 239;
      --bs-info-text-emphasis: #0077a8;
      --bs-info-bg-subtle: #e0f7ff;
      --bs-info-border-subtle: #7ad7f7;
      --bs-link-color: #1a237e;
      --bs-link-color-rgb: 26, 35, 126;
      --bs-link-hover-color: #12185a;
      --bs-link-hover-color-rgb: 18, 24, 90;
      --bs-focus-ring-color: rgba(26, 35, 126, 0.25);
    }
    [data-bs-theme="dark"] {
      --bs-primary: #5c6bc0;
      --bs-primary-rgb: 92, 107, 192;
      --bs-primary-text-emphasis: #c5cae9;
      --bs-primary-bg-subtle: #2a2f55;
      --bs-primary-border-subtle: #3f4680;
      --bs-info: #4dc9f6;
      --bs-info-rgb: 77, 201, 246;
      --bs-info-text-emphasis: #b3e9fb;
      --bs-info-bg-subtle: #1a3a4a;
      --bs-info-border-subtle: #2a6f8a;
      --bs-link-color: #9fa8da;
      --bs-link-color-rgb: 159, 168, 218;
      --bs-link-hover-color: #c5cae9;
      --bs-link-hover-color-rgb: 197, 202, 233;
      --bs-focus-ring-color: rgba(92, 107, 192, 0.35);
    }

    .tw-pagination { width: 100%; }
    .tw-pagination-mobile { display: flex; align-items: center; justify-content: space-between; gap: .5rem; }
    .tw-pagination-desktop { display: none; }
    .tw-pagination-info { margin: 0; font-size: .8125rem; color: var(--bs-secondary-color); }
    .tw-page-group { display: inline-flex; box-shadow: 0 .125rem .25rem rgba(47, 43, 61, .08); border-radius: .375rem; overflow: hidden; }
    .tw-page-btn {
      display: inline-flex; align-items: center; justify-content: center;
      min-width: 2.25rem; padding: .5rem .875rem; margin-left: -1px;
      font-size: .8125rem; font-weight: 500; line-height: 1.25;
      color: var(--bs-heading-color); background: var(--bs-paper-bg, #fff);
      border: 1px solid var(--bs-border-color); text-decoration: none;
      transition: background .15s ease, color .15s ease;
    }
    .tw-page-btn:hover:not(.tw-disabled):not(.tw-active) {
      background: var(--bs-gray-50, #f3f2f3); color: var(--bs-primary);
    }
    .tw-page-btn.tw-active {
      background: var(--bs-primary); border-color: var(--bs-primary); color: #fff; z-index: 1;
    }
    .tw-page-btn.tw-disabled { opacity: .55; cursor: not-allowed; pointer-events: none; }
    .tw-page-icon { padding: .5rem .65rem; }
    .tw-rounded-l { border-radius: .375rem 0 0 .375rem; }
    .tw-rounded-r { border-radius: 0 .375rem .375rem 0; }
    @media (min-width: 576px) {
      .tw-pagination-mobile { display: none; }
      .tw-pagination-desktop { display: flex; align-items: center; justify-content: space-between; gap: 1rem; width: 100%; }
    }
    /* Keep table action menus above rows and clickable */
    .card .table-responsive {
      overflow: visible;
    }
    .table-actions-menu {
      z-index: 1090;
      min-width: 10rem;
      overflow: hidden;
    }
    .table-actions-menu .dropdown-item {
      display: flex;
      align-items: center;
      width: 100%;
      white-space: nowrap;
    }
    .table-actions-menu form {
      margin: 0;
      width: 100%;
    }
    .layout-navbar,
    .layout-navbar .navbar-nav-right,
    .layout-navbar .navbar-nav,
    .navbar-dropdown {
      overflow: visible !important;
    }
    .genyra-dropdown-menu.show {
      display: block !important;
    }
    .navbar-verse {
      min-width: 0;
      flex: 1 1 auto;
      max-width: 720px;
      line-height: 1.25;
    }
    .navbar-verse-text {
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 2;
      line-clamp: 2;
      overflow: hidden;
      font-size: .8125rem;
      font-style: italic;
      color: var(--bs-heading-color);
    }
    .navbar-verse-ref {
      margin-top: .15rem;
      font-size: .75rem;
      font-weight: 600;
      color: var(--bs-info);
    }
  </style>

  <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
  @livewireStyles
  @stack('styles')
</head>
<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @persist('admin-menu')
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('admin.index') }}" class="app-brand-link" wire:navigate.hover>
            <span class="app-brand-logo demo">
              <img src="{{ asset('images/logo.jpeg') }}" alt="Genyra" height="42" style="border-radius:6px;" />
            </span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}" data-menu-match="exact:/admin">
            <a href="{{ route('admin.index') }}" class="menu-link" wire:navigate.hover>
              <i class="menu-icon icon-base ti tabler-smart-home"></i>
              <div>Dashboard</div>
            </a>
          </li>

          <li class="menu-header small"><span class="menu-header-text">Content</span></li>
          <li class="menu-item {{ request()->routeIs('admin.news.*') ? 'active open' : '' }}" data-menu-group="/admin/news">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon icon-base ti tabler-news"></i>
              <div>News</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ request()->routeIs('admin.news.index') || request()->routeIs('admin.news.show') || request()->routeIs('admin.news.edit') ? 'active' : '' }}" data-menu-match="prefix:/admin/news" data-menu-exclude="/admin/news/create">
                <a href="{{ route('admin.news.index') }}" class="menu-link" wire:navigate.hover>
                  <div>All Articles</div>
                </a>
              </li>
              <li class="menu-item {{ request()->routeIs('admin.news.create') ? 'active' : '' }}" data-menu-match="exact:/admin/news/create">
                <a href="{{ route('admin.news.create') }}" class="menu-link" wire:navigate.hover>
                  <div>Add Article</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item {{ request()->routeIs('admin.posters.*') ? 'active open' : '' }}" data-menu-group="/admin/posters">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon icon-base ti tabler-photo"></i>
              <div>Posters</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ request()->routeIs('admin.posters.index') || request()->routeIs('admin.posters.edit') ? 'active' : '' }}" data-menu-match="prefix:/admin/posters" data-menu-exclude="/admin/posters/create">
                <a href="{{ route('admin.posters.index') }}" class="menu-link" wire:navigate.hover>
                  <div>All Posters</div>
                </a>
              </li>
              <li class="menu-item {{ request()->routeIs('admin.posters.create') ? 'active' : '' }}" data-menu-match="exact:/admin/posters/create">
                <a href="{{ route('admin.posters.create') }}" class="menu-link" wire:navigate.hover>
                  <div>Add Poster</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-header small"><span class="menu-header-text">Communication</span></li>
          <li class="menu-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" data-menu-match="prefix:/admin/contacts">
            <a href="{{ route('admin.contacts.index') }}" class="menu-link" wire:navigate.hover>
              <i class="menu-icon icon-base ti tabler-mail"></i>
              <div>Contacts</div>
              @php $unreadCount = \App\Models\Contact::whereNull('read_at')->count(); @endphp
              @if($unreadCount)
                <div class="badge text-bg-danger rounded-pill ms-auto">{{ $unreadCount }}</div>
              @endif
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs('admin.emails.*') ? 'active open' : '' }}" data-menu-group="/admin/emails">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon icon-base ti tabler-send"></i>
              <div>Emails</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ request()->routeIs('admin.emails.index') || request()->routeIs('admin.emails.show') ? 'active' : '' }}" data-menu-match="prefix:/admin/emails" data-menu-exclude="/admin/emails/create">
                <a href="{{ route('admin.emails.index') }}" class="menu-link" wire:navigate.hover>
                  <div>History</div>
                </a>
              </li>
              <li class="menu-item {{ request()->routeIs('admin.emails.create') ? 'active' : '' }}" data-menu-match="exact:/admin/emails/create">
                <a href="{{ route('admin.emails.create') }}" class="menu-link" wire:navigate.hover>
                  <div>Compose</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      @endpersist

      <div class="layout-page">
        @persist('admin-navbar')
        <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="icon-base ti tabler-menu-2 icon-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center justify-content-between w-100" id="navbar-collapse">
            <div class="navbar-verse d-none d-md-flex flex-column me-3 pe-3">
              <span class="navbar-verse-text">Where there is no vision, the people perish: but he that keepeth the law, happy is he.</span>
              <span class="navbar-verse-ref">Proverbs 29:18</span>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item me-2">
                <a class="nav-link btn btn-icon btn-text-secondary rounded-pill" href="javascript:void(0);" id="theme-toggle" title="Toggle dark mode">
                  <i class="icon-base ti tabler-moon icon-22px" id="theme-toggle-icon"></i>
                </a>
              </li>
              <li class="nav-item navbar-dropdown dropdown-user dropdown genyra-dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0 genyra-dropdown-toggle" href="javascript:void(0);" aria-expanded="false">
                  <div class="avatar avatar-online">
                    <span class="avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end genyra-dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <span class="avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                          <small class="text-body-secondary">Administrator</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li><div class="dropdown-divider my-1"></div></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                      <i class="icon-base ti tabler-world me-3 icon-md"></i>
                      <span>View website</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="icon-base ti tabler-logout me-3 icon-md"></i>
                        <span>Log Out</span>
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        @endpersist

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @if(session('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(session('error'))
              <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @yield('content')
          </div>

          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  © {{ date('Y') }}, made by <a href="{{ route('home') }}" class="footer-link fw-medium">genyra Group</a>
                </div>
              </div>
            </div>
          </footer>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
  </div>

  <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
  @livewireScripts
  <script>
    (function () {
      function initThemeToggle() {
        var btn = document.getElementById('theme-toggle');
        var icon = document.getElementById('theme-toggle-icon');
        if (!btn || !icon || btn.dataset.bound === '1') return;
        btn.dataset.bound = '1';

        function currentTheme() {
          return document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light';
        }
        function syncIcon(theme) {
          icon.classList.remove('tabler-sun', 'tabler-moon');
          icon.classList.add(theme === 'dark' ? 'tabler-sun' : 'tabler-moon');
          btn.setAttribute('title', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        }
        function setTheme(theme) {
          document.documentElement.setAttribute('data-bs-theme', theme);
          document.documentElement.style.backgroundColor = theme === 'dark' ? '#25293c' : '#f8f7fa';
          localStorage.setItem('genyra-admin-theme', theme);
          syncIcon(theme);
        }
        syncIcon(currentTheme());
        btn.addEventListener('click', function () {
          setTheme(currentTheme() === 'dark' ? 'light' : 'dark');
        });
      }

      function enableAdminNavigate() {
        document.querySelectorAll('a[href]').forEach(function (link) {
          if (link.hasAttribute('wire:navigate') || link.hasAttribute('wire:navigate.hover')) return;
          if (link.target && link.target !== '_self') return;
          if (link.hasAttribute('download')) return;
          // Dropdown items conflict with Bootstrap close + Livewire navigate
          if (link.closest('.dropdown-menu')) return;

          var href = link.getAttribute('href');
          if (!href || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) return;

          try {
            var url = new URL(href, window.location.href);
            if (url.origin !== window.location.origin) return;
            if (!url.pathname.startsWith('/admin')) return;
          } catch (err) {
            return;
          }

          link.setAttribute('wire:navigate', '');
        });
      }

      function pathMatches(path, rule, exclude) {
        if (!rule) return false;
        var parts = rule.split(':');
        var mode = parts[0];
        var value = parts.slice(1).join(':');
        if (exclude && (path === exclude || path.indexOf(exclude + '/') === 0)) return false;
        if (mode === 'exact') return path === value;
        if (mode === 'prefix') return path === value || path.indexOf(value + '/') === 0;
        return false;
      }

      function syncMenuActiveState() {
        var path = window.location.pathname.replace(/\/+$/, '') || '/';
        document.querySelectorAll('#layout-menu .menu-item[data-menu-match], #layout-menu .menu-item[data-menu-group]').forEach(function (item) {
          item.classList.remove('active', 'open');
        });
        document.querySelectorAll('#layout-menu .menu-item[data-menu-match]').forEach(function (item) {
          if (pathMatches(path, item.getAttribute('data-menu-match'), item.getAttribute('data-menu-exclude'))) {
            item.classList.add('active');
          }
        });
        document.querySelectorAll('#layout-menu .menu-item[data-menu-group]').forEach(function (item) {
          var group = item.getAttribute('data-menu-group');
          if (path === group || path.indexOf(group + '/') === 0) {
            item.classList.add('active', 'open');
          }
        });
      }

      function closeTableActionMenus() {
        document.querySelectorAll('.table-actions-menu.show').forEach(function (menu) {
          menu.classList.remove('show');
          menu.style.position = '';
          menu.style.top = '';
          menu.style.left = '';
          menu.style.right = '';
          menu.style.bottom = '';
          menu.style.zIndex = '';
        });
        document.querySelectorAll('.table-actions-dropdown.show').forEach(function (wrap) {
          wrap.classList.remove('show');
        });
        document.querySelectorAll('.table-actions-toggle[aria-expanded="true"]').forEach(function (btn) {
          btn.setAttribute('aria-expanded', 'false');
        });
      }

      function closeGenyraDropdowns(exceptWrap) {
        document.querySelectorAll('.genyra-dropdown.show').forEach(function (wrap) {
          if (exceptWrap && wrap === exceptWrap) return;
          wrap.classList.remove('show');
          var menu = wrap.querySelector('.genyra-dropdown-menu, .dropdown-menu');
          if (menu) {
            menu.classList.remove('show');
            menu.style.position = '';
            menu.style.top = '';
            menu.style.left = '';
            menu.style.right = '';
            menu.style.bottom = '';
            menu.style.zIndex = '';
            menu.style.minWidth = '';
            menu.style.transform = '';
            menu.style.inset = '';
            menu.style.display = '';
          }
          var toggle = wrap.querySelector('.genyra-dropdown-toggle');
          if (toggle) toggle.setAttribute('aria-expanded', 'false');
        });
      }

      function positionTableActionMenu(toggle, menu) {
        var rect = toggle.getBoundingClientRect();
        var menuWidth = Math.max(menu.offsetWidth || 160, 160);
        var top = rect.bottom + 6;
        var left = rect.right - menuWidth;

        if (left < 8) left = 8;
        if (left + menuWidth > window.innerWidth - 8) {
          left = Math.max(8, window.innerWidth - menuWidth - 8);
        }
        if (top + 180 > window.innerHeight && rect.top > 180) {
          top = rect.top - 6 - Math.min(menu.offsetHeight || 120, 180);
        }

        menu.style.position = 'fixed';
        menu.style.top = top + 'px';
        menu.style.left = left + 'px';
        menu.style.right = 'auto';
        menu.style.bottom = 'auto';
        menu.style.zIndex = '1090';
      }

      function positionGenyraDropdown(toggle, menu) {
        menu.style.position = 'fixed';
        menu.style.transform = 'none';
        menu.style.inset = 'auto';
        menu.style.zIndex = '1090';
        menu.style.minWidth = '14rem';
        menu.style.display = 'block';

        var rect = toggle.getBoundingClientRect();
        var menuWidth = Math.max(menu.offsetWidth || 224, 224);
        var menuHeight = Math.max(menu.offsetHeight || 180, 120);
        var top = rect.bottom + 8;
        var left = rect.right - menuWidth;

        if (left < 8) left = 8;
        if (left + menuWidth > window.innerWidth - 8) {
          left = Math.max(8, window.innerWidth - menuWidth - 8);
        }
        if (top + menuHeight > window.innerHeight - 8 && rect.top > menuHeight + 8) {
          top = rect.top - menuHeight - 8;
        }

        menu.style.top = top + 'px';
        menu.style.left = left + 'px';
        menu.style.right = 'auto';
        menu.style.bottom = 'auto';
      }

      function hydrateDropdownToggles() {
        document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function (el) {
          if (el.classList.contains('table-actions-toggle')) return;
          el.classList.add('genyra-dropdown-toggle');
          el.removeAttribute('data-bs-toggle');
          var wrap = el.closest('.dropdown');
          if (wrap) {
            wrap.classList.add('genyra-dropdown');
            var menu = wrap.querySelector('.dropdown-menu');
            if (menu) menu.classList.add('genyra-dropdown-menu');
          }
        });
      }

      if (!window.__genyraDropdownsBound) {
        window.__genyraDropdownsBound = true;

        document.addEventListener('click', function (e) {
          var tableToggle = e.target.closest('.table-actions-toggle');
          if (tableToggle) {
            e.preventDefault();
            e.stopPropagation();
            var tableWrap = tableToggle.closest('.table-actions-dropdown');
            var tableMenu = tableWrap ? tableWrap.querySelector('.table-actions-menu') : null;
            var willOpenTable = tableMenu && !tableMenu.classList.contains('show');
            closeTableActionMenus();
            closeGenyraDropdowns();
            if (willOpenTable && tableMenu) {
              tableWrap.classList.add('show');
              tableMenu.classList.add('show');
              tableToggle.setAttribute('aria-expanded', 'true');
              positionTableActionMenu(tableToggle, tableMenu);
            }
            return;
          }

          var toggle = e.target.closest('.genyra-dropdown-toggle');
          if (toggle) {
            e.preventDefault();
            e.stopPropagation();
            var wrap = toggle.closest('.genyra-dropdown, .dropdown');
            var menu = wrap ? wrap.querySelector('.genyra-dropdown-menu, .dropdown-menu') : null;
            var willOpen = menu && !menu.classList.contains('show');
            closeTableActionMenus();
            closeGenyraDropdowns(willOpen ? wrap : null);
            if (willOpen && menu && wrap) {
              wrap.classList.add('show');
              menu.classList.add('show');
              toggle.setAttribute('aria-expanded', 'true');
              positionGenyraDropdown(toggle, menu);
            }
            return;
          }

          if (!e.target.closest('.table-actions-menu') && !e.target.closest('.genyra-dropdown-menu') && !e.target.closest('.dropdown-menu')) {
            closeTableActionMenus();
            closeGenyraDropdowns();
          }
        }, true);

        window.addEventListener('resize', function () {
          closeTableActionMenus();
          closeGenyraDropdowns();
        });
        document.addEventListener('scroll', function () {
          closeTableActionMenus();
          closeGenyraDropdowns();
        }, true);
      }

      document.addEventListener('DOMContentLoaded', function () {
        initThemeToggle();
        enableAdminNavigate();
        syncMenuActiveState();
        hydrateDropdownToggles();
      });

      document.addEventListener('livewire:navigated', function () {
        closeTableActionMenus();
        closeGenyraDropdowns();
        initThemeToggle();
        enableAdminNavigate();
        syncMenuActiveState();
        hydrateDropdownToggles();
        if (window.Helpers && typeof window.Helpers.scrollToActive === 'function') {
          window.Helpers.scrollToActive(false);
        }
      });
    })();
  </script>
  @stack('scripts')
</body>
</html>
