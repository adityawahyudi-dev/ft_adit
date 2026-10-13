<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') — Aditya Yazidil Wahyudi</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Barlow Condensed', sans-serif; }
    </style>
</head>
<body class="bg-[#f5f4ec] text-[#20211F] min-h-screen flex flex-col antialiased">

    <!-- Top Admin Bar -->
    <header class="bg-[#20211F] text-white h-16 border-b border-[#30312c] px-4 sm:px-6 flex items-center justify-between sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="font-display text-xl sm:text-2xl font-bold tracking-wider uppercase text-white flex items-center gap-1.5">
                <span>ADITYA</span>
                <span class="text-[#C6A77B]">.</span>
                <span class="text-xs bg-white/10 px-2 py-0.5 rounded text-[#e2c194] font-normal tracking-normal ml-2">ADMIN</span>
            </a>
            <a href="{{ route('portfolio.index') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1 text-xs text-white/70 hover:text-white transition-colors bg-white/10 px-3 py-1.5 rounded-lg">
                <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                <span>Lihat Website</span>
            </a>
        </div>

        <div class="flex items-center gap-4">
            <div class="hidden sm:flex flex-col text-right">
                <span class="text-xs font-bold leading-tight">{{ auth()->user()->name ?? 'Aditya' }}</span>
                <span class="text-[10px] text-white/60">{{ auth()->user()->email }}</span>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-600/80 hover:bg-red-600 text-white text-xs font-bold uppercase transition-all">
                    <span class="material-symbols-outlined text-[16px]">logout</span>
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </form>
        </div>
    </header>

    <div class="flex-grow flex flex-col md:flex-row">
        <!-- Sidebar Navigation -->
        <aside class="w-full md:w-64 bg-white border-r border-[#E2E0D5] p-4 flex flex-col justify-between shrink-0">
            <nav class="space-y-1">
                <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider px-3 py-2">
                    NAVIGASI UTAMA
                </div>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.dashboard') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <span class="material-symbols-outlined text-[18px]">dashboard</span>
                    <span>Ringkasan Overview</span>
                </a>

                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.profile.*') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <span class="material-symbols-outlined text-[18px]">person</span>
                    <span>Kelola Profil</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.projects.*') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <span class="material-symbols-outlined text-[18px]">work</span>
                    <span>Kelola Proyek</span>
                </a>

                <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.skills.*') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <span class="material-symbols-outlined text-[18px]">verified</span>
                    <span>Skill &amp; Sertifikasi</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.messages.*') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <div class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[18px]">inbox</span>
                        <span>Pesan Masuk</span>
                    </div>
                    @php
                        $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                    <span class="px-2 py-0.5 rounded-full bg-red-500 text-white text-[10px] font-bold">
                        {{ $unreadCount }}
                    </span>
                    @endif
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider {{ request()->routeIs('admin.settings.*') ? 'bg-[#20211F] text-white shadow-xs' : 'text-[#52544F] hover:bg-[#f5f4ec] hover:text-[#20211F]' }} transition-all">
                    <span class="material-symbols-outlined text-[18px]">settings</span>
                    <span>Pengaturan &amp; CV</span>
                </a>
            </nav>

            <div class="p-3 bg-[#f5f4ec] rounded-xl border border-[#E2E0D5] text-[11px] text-[#52544F] space-y-1">
                <div class="font-bold text-[#20211F]">Status Sistem: Siap</div>
                <div>Laravel v13.35.0 (PHP 8.5)</div>
                <div>SQLite Database Aktif</div>
            </div>
        </aside>

        <!-- Content Body Area -->
        <main class="flex-grow p-4 sm:p-6 lg:p-8 overflow-y-auto">
            <!-- Flash Message Alerts -->
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-800 text-xs font-semibold flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-950 font-bold">✕</button>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-300 text-red-800 text-xs font-semibold flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">error</span>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-950 font-bold">✕</button>
            </div>
            @endif

            @yield('admin_content')
        </main>
    </div>

</body>
</html>
