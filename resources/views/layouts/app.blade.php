<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ($profile->full_name ?? 'Aditya Yazidil Wahyudi') . ' — Portfolio')</title>
    <meta name="description" content="@yield('meta_description', $settings['meta_description'] ?? 'Portofolio profesional Aditya Yazidil Wahyudi, lulusan S1 Teknik Informatika berfokus pada Full-Stack Web Development.')">

    <!-- Preconnect Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Newsreader:ital,opsz,wght@0,6..72,400;1,6..72,400&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Theme check script to avoid flash -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-display, .font-headline {
            font-family: 'Barlow Condensed', sans-serif;
        }
        .font-serif-accent {
            font-family: 'Newsreader', serif;
        }
        .font-mono-code {
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body class="bg-[#F1F0E8] dark:bg-[#161715] text-[#20211F] dark:text-[#F1F0E8] antialiased selection:bg-[#20211F] selection:text-white dark:selection:bg-[#C6A77B] dark:selection:text-[#161715] transition-colors duration-300 relative min-h-screen flex flex-col">

    <!-- Top Navigation Header -->
    <header class="fixed top-0 left-0 w-full z-50 bg-[#F1F0E8]/90 dark:bg-[#161715]/90 backdrop-blur-xl border-b border-[#E2E0D5]/60 dark:border-[#2d302a] transition-all duration-300">
        <div class="h-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('portfolio.index') }}" class="group flex items-center gap-1.5 transition-transform duration-200 active:scale-95">
                <span class="font-display text-2xl lg:text-3xl text-[#20211F] dark:text-[#F1F0E8] tracking-wider uppercase font-bold group-hover:tracking-widest transition-all">
                    ADITYA<span class="text-[#735a35] dark:text-[#C6A77B] group-hover:text-[#20211F] dark:group-hover:text-white">.</span>
                </span>
            </a>

            <!-- Center Navigation Pill -->
            <nav class="hidden md:flex items-center gap-1 bg-[#E8E7DD]/80 dark:bg-[#222420] p-1.5 rounded-full border border-[#E2E0D5]/70 dark:border-[#32352f] shadow-inner text-xs font-semibold uppercase tracking-wider">
                <a href="{{ route('portfolio.index') }}" class="px-4 py-1.5 rounded-full {{ request()->routeIs('portfolio.index') && !request()->has('section') ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] shadow-sm' : 'text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white hover:bg-white/70 dark:hover:bg-[#2d302a]' }} transition-all">
                    {{ __('portfolio.nav_home') }}
                </a>
                <a href="{{ route('portfolio.about') }}" class="px-4 py-1.5 rounded-full {{ request()->routeIs('portfolio.about') ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] shadow-sm' : 'text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white hover:bg-white/70 dark:hover:bg-[#2d302a]' }} transition-all">
                    {{ __('portfolio.nav_about') }}
                </a>
                <a href="{{ route('portfolio.projects') }}" class="px-4 py-1.5 rounded-full {{ request()->routeIs('portfolio.projects') || request()->routeIs('portfolio.project.detail') ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] shadow-sm' : 'text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white hover:bg-white/70 dark:hover:bg-[#2d302a]' }} transition-all">
                    {{ __('portfolio.nav_projects') }}
                </a>
                <a href="{{ route('portfolio.index') }}#skills" class="px-4 py-1.5 rounded-full text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white hover:bg-white/70 dark:hover:bg-[#2d302a] transition-all">
                    {{ __('portfolio.nav_certifications') }}
                </a>
                <a href="{{ route('portfolio.index') }}#contact" class="px-4 py-1.5 rounded-full text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white hover:bg-white/70 dark:hover:bg-[#2d302a] transition-all">
                    {{ __('portfolio.nav_contact') }}
                </a>
            </nav>

            <!-- Right Controls (Language, Theme, CTA) -->
            <div class="flex items-center gap-2.5">
                <!-- Language Switcher -->
                <div class="flex items-center bg-[#E8E7DD]/80 dark:bg-[#222420] rounded-full p-1 border border-[#E2E0D5]/70 dark:border-[#32352f]">
                    <a href="{{ route('portfolio.lang', 'id') }}" class="px-2.5 py-1 rounded-full text-[11px] font-bold uppercase {{ app()->getLocale() === 'id' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] shadow-sm' : 'text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white' }} transition-all">
                        ID
                    </a>
                    <a href="{{ route('portfolio.lang', 'en') }}" class="px-2.5 py-1 rounded-full text-[11px] font-bold uppercase {{ app()->getLocale() === 'en' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] shadow-sm' : 'text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white' }} transition-all">
                        EN
                    </a>
                </div>

                <!-- Dark/Light Theme Toggle -->
                <button type="button" id="theme-toggle-btn" class="w-9 h-9 rounded-full bg-[#E8E7DD]/80 dark:bg-[#222420] border border-[#E2E0D5]/70 dark:border-[#32352f] flex items-center justify-center text-[#52544F] dark:text-[#C6A77B] hover:text-[#20211F] dark:hover:text-white transition-all active:scale-95 shadow-sm" aria-label="Toggle theme">
                    <span class="material-symbols-outlined text-[18px] dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined text-[18px] hidden dark:inline-block">light_mode</span>
                </button>

                <!-- CTA Button -->
                <a href="{{ route('portfolio.index') }}#contact" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 bg-[#20211F] hover:bg-[#30312c] dark:bg-[#C6A77B] dark:hover:bg-[#d6b78b] text-white dark:text-[#161715] rounded-full text-[12px] font-bold uppercase tracking-wider transition-all duration-200 shadow-sm active:scale-95">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#10b981] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#10b981]"></span>
                    </span>
                    <span>{{ __('portfolio.cta_contact') }}</span>
                </a>

                <!-- Mobile Navigation Toggle -->
                <button type="button" id="mobile-menu-btn" class="md:hidden w-9 h-9 rounded-full bg-[#E8E7DD]/80 dark:bg-[#222420] border border-[#E2E0D5]/70 dark:border-[#32352f] flex items-center justify-center text-[#20211F] dark:text-white" aria-label="Open mobile menu">
                    <span class="material-symbols-outlined text-[20px]" id="mobile-menu-icon">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu-dropdown" class="hidden md:hidden bg-[#F1F0E8] dark:bg-[#1c1d1a] border-b border-[#E2E0D5] dark:border-[#2d302a] px-6 py-4 space-y-2">
            <a href="{{ route('portfolio.index') }}" class="block py-2 text-sm font-semibold text-[#20211F] dark:text-[#F1F0E8] uppercase tracking-wider border-b border-[#E2E0D5]/40 dark:border-[#2d302a]">
                {{ __('portfolio.nav_home') }}
            </a>
            <a href="{{ route('portfolio.about') }}" class="block py-2 text-sm font-semibold text-[#20211F] dark:text-[#F1F0E8] uppercase tracking-wider border-b border-[#E2E0D5]/40 dark:border-[#2d302a]">
                {{ __('portfolio.nav_about') }}
            </a>
            <a href="{{ route('portfolio.projects') }}" class="block py-2 text-sm font-semibold text-[#20211F] dark:text-[#F1F0E8] uppercase tracking-wider border-b border-[#E2E0D5]/40 dark:border-[#2d302a]">
                {{ __('portfolio.nav_projects') }}
            </a>
            <a href="{{ route('portfolio.index') }}#skills" class="block py-2 text-sm font-semibold text-[#20211F] dark:text-[#F1F0E8] uppercase tracking-wider border-b border-[#E2E0D5]/40 dark:border-[#2d302a]">
                {{ __('portfolio.nav_certifications') }}
            </a>
            <a href="{{ route('portfolio.index') }}#contact" class="block py-2 text-sm font-semibold text-[#20211F] dark:text-[#F1F0E8] uppercase tracking-wider border-b border-[#E2E0D5]/40 dark:border-[#2d302a]">
                {{ __('portfolio.nav_contact') }}
            </a>
            <div class="pt-2">
                <a href="{{ route('portfolio.index') }}#contact" class="inline-flex w-full justify-center items-center gap-2 py-2.5 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-xl text-xs font-bold uppercase tracking-wider">
                    {{ __('portfolio.cta_contact') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow pt-16">
        @yield('content')
    </main>

    <!-- Architectural Monograph Footer -->
    <footer class="w-full bg-[#E8E7DD]/90 dark:bg-[#131412] border-t border-[#E2E0D5] dark:border-[#262823] py-12 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 pb-8 border-b border-[#E2E0D5]/70 dark:border-[#262823]">
                <div class="space-y-1">
                    <a href="{{ route('portfolio.index') }}" class="font-display text-2xl text-[#20211F] dark:text-white font-bold tracking-wider uppercase">
                        ADITYA<span class="text-[#735a35] dark:text-[#C6A77B]">.</span>
                    </a>
                    <p class="text-xs text-[#52544F] dark:text-[#9a9c94] max-w-md leading-relaxed">
                        {{ __('portfolio.footer_tagline') }}
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#32352f] text-[11px] font-semibold text-[#20211F] dark:text-[#e4e2df] shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-[#10b981] animate-pulse"></span>
                        <span>OPEN FOR OPPORTUNITIES</span>
                    </div>
                    <button type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#20211F] text-white dark:bg-[#252721] dark:text-white text-[11px] font-bold uppercase hover:bg-[#383a34] transition-all active:scale-95">
                        <span class="material-symbols-outlined text-[15px]">arrow_upward</span>
                        <span>{{ __('portfolio.footer_back_to_top') }}</span>
                    </button>
                </div>
            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#52544F] dark:text-[#888981]">
                <div>
                    &copy; {{ date('Y') }} Aditya Yazidil Wahyudi. Situbondo, Indonesia. {{ __('portfolio.footer_rights') }}
                </div>
                <div class="flex items-center gap-5 font-semibold">
                    <a href="{{ $profile->github_url ?? 'https://github.com/aditya-yazidil' }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#20211F] dark:hover:text-white transition-colors">
                        GITHUB
                    </a>
                    <a href="{{ $profile->linkedin_url ?? 'https://linkedin.com/in/aditya-yazidil' }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#20211F] dark:hover:text-white transition-colors">
                        LINKEDIN
                    </a>
                    <a href="mailto:{{ $profile->email ?? 'adityayazidilwahyudi@gmail.com' }}" class="hover:text-[#20211F] dark:hover:text-white transition-colors">
                        EMAIL
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="opacity-40 hover:opacity-100 transition-opacity" title="Admin Portal">
                        •
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        // Theme Toggle Handler
        const themeBtn = document.getElementById('theme-toggle-btn');
        if (themeBtn) {
            themeBtn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }

        // Mobile Menu Toggle Handler
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileDropdown = document.getElementById('mobile-menu-dropdown');
        const mobileIcon = document.getElementById('mobile-menu-icon');
        if (mobileMenuBtn && mobileDropdown) {
            mobileMenuBtn.addEventListener('click', () => {
                const isHidden = mobileDropdown.classList.toggle('hidden');
                if (mobileIcon) {
                    mobileIcon.textContent = isHidden ? 'menu' : 'close';
                }
            });
        }

        // Helper to copy text to clipboard
        function copyToClipboard(text, successMessage = 'Disalin ke clipboard!') {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => {
                    alert(successMessage);
                }).catch(err => {
                    console.error('Copy failed', err);
                });
            } else {
                const input = document.createElement('input');
                input.value = text;
                document.body.appendChild(input);
                input.select();
                document.execCommand('copy');
                document.body.removeChild(input);
                alert(successMessage);
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
