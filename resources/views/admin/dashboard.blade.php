@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('admin_content')
<div class="space-y-8">
    
    <!-- Top Welcome Banner -->
    <div class="bg-white border border-[#E2E0D5] rounded-2xl p-6 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">PANEL ADMINISTRATOR</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F] mt-0.5">
                Selamat Datang, {{ auth()->user()->name }}
            </h1>
            <p class="text-xs text-[#52544F]">
                Kelola konten portofolio, publikasi proyek, ketersediaan kerja, dan pesan masuk recruiter secara aman.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-xs">
                <span class="material-symbols-outlined text-[16px]">add</span>
                <span>Tambah Proyek</span>
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[#f5f4ec] text-[#20211F] border border-[#E2E0D5] rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-white transition-all">
                <span class="material-symbols-outlined text-[16px]">edit</span>
                <span>Edit Profil</span>
            </a>
        </div>
    </div>

    <!-- 4 KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-[#E2E0D5] shadow-xs space-y-2">
            <div class="flex items-center justify-between text-xs font-bold text-[#52544F] uppercase">
                <span>TOTAL PROYEK</span>
                <span class="material-symbols-outlined text-[20px] text-[#735a35]">work</span>
            </div>
            <div class="font-display text-3xl font-bold text-[#20211F]">{{ $totalProjects }}</div>
            <div class="text-[11px] text-[#52544F]">
                <span class="text-emerald-700 font-bold">{{ $publishedProjects }} Dipublikasikan</span> • {{ $draftProjects }} Draft
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-[#E2E0D5] shadow-xs space-y-2">
            <div class="flex items-center justify-between text-xs font-bold text-[#52544F] uppercase">
                <span>PESAN MASUK</span>
                <span class="material-symbols-outlined text-[20px] text-[#735a35]">mail</span>
            </div>
            <div class="font-display text-3xl font-bold text-[#20211F]">{{ $totalMessages }}</div>
            <div class="text-[11px] text-[#52544F]">
                @if($unreadMessages > 0)
                <span class="text-red-600 font-bold">{{ $unreadMessages }} Belum dibaca</span>
                @else
                <span class="text-emerald-700 font-bold">Semua telah dibaca</span>
                @endif
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-[#E2E0D5] shadow-xs space-y-2">
            <div class="flex items-center justify-between text-xs font-bold text-[#52544F] uppercase">
                <span>KEAHLIAN / PILAR</span>
                <span class="material-symbols-outlined text-[20px] text-[#735a35]">code</span>
            </div>
            <div class="font-display text-3xl font-bold text-[#20211F]">{{ $totalSkills }}</div>
            <div class="text-[11px] text-[#52544F]">
                Fondasi Web &amp; Arsitektur Kode
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-[#E2E0D5] shadow-xs space-y-2">
            <div class="flex items-center justify-between text-xs font-bold text-[#52544F] uppercase">
                <span>SERTIFIKASI VALID</span>
                <span class="material-symbols-outlined text-[20px] text-[#735a35]">verified</span>
            </div>
            <div class="font-display text-3xl font-bold text-[#20211F]">{{ $totalCerts }}</div>
            <div class="text-[11px] text-[#52544F]">
                Dicoding Academy Terverifikasi
            </div>
        </div>
    </div>

    <!-- Dual Column: Recent Projects & Recent Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Recent Projects Column -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-[#E2E0D5] p-6 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-3">
                <h2 class="font-display text-xl uppercase font-bold text-[#20211F]">
                    Daftar Proyek Terkini
                </h2>
                <a href="{{ route('admin.projects.index') }}" class="text-xs text-[#735a35] font-bold hover:underline">
                    Kelola Semua →
                </a>
            </div>

            <div class="divide-y divide-[#E2E0D5]">
                @forelse($recentProjects as $proj)
                <div class="py-3 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-12 h-9 rounded bg-[#f5f4ec] overflow-hidden shrink-0 border border-[#E2E0D5]">
                            <img src="{{ asset($proj->mockup_url) }}" alt="" class="w-full h-full object-cover">
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-xs font-bold text-[#20211F] truncate">{{ $proj->title_id }}</h3>
                            <div class="text-[10px] text-[#52544F] font-mono">{{ $proj->slug }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $proj->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $proj->status }}
                        </span>
                        <a href="{{ route('admin.projects.edit', $proj->id) }}" class="p-1 hover:text-[#735a35]" title="Edit">
                            <span class="material-symbols-outlined text-[16px]">edit</span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="py-4 text-center text-xs text-[#52544F]">Belum ada proyek.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Inquiries Column -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-[#E2E0D5] p-6 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-3">
                <h2 class="font-display text-xl uppercase font-bold text-[#20211F]">
                    Pesan Recruiter &amp; Tamu
                </h2>
                <a href="{{ route('admin.messages.index') }}" class="text-xs text-[#735a35] font-bold hover:underline">
                    Lihat Inbox →
                </a>
            </div>

            <div class="divide-y divide-[#E2E0D5]">
                @forelse($recentMessages as $msg)
                <div class="py-3 space-y-1">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-bold text-[#20211F] {{ !$msg->is_read ? 'text-[#735a35]' : '' }}">
                            {{ $msg->name }}
                        </span>
                        <span class="text-[10px] text-[#52544F]">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-[11px] text-[#52544F] line-clamp-2">
                        {{ $msg->message }}
                    </p>
                    <div class="flex items-center justify-between pt-1">
                        <span class="text-[10px] font-mono text-[#735a35]">{{ $msg->email }}</span>
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-[10px] text-[#20211F] font-bold hover:underline">
                            Buka Detail →
                        </a>
                    </div>
                </div>
                @empty
                <div class="py-4 text-center text-xs text-[#52544F]">Belum ada pesan masuk.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
