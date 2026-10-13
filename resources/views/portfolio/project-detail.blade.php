@extends('layouts.app')

@section('title', $project->getLocalized('title', $locale) . ' — Case Study')

@section('content')
<div class="w-full interactive-mesh-bg py-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Navigation Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-mono-code text-[#52544F] dark:text-[#9a9c94]">
            <a href="{{ route('portfolio.index') }}" class="hover:text-[#20211F] dark:hover:text-white transition-colors">HOME</a>
            <span>/</span>
            <a href="{{ route('portfolio.projects') }}" class="hover:text-[#20211F] dark:hover:text-white transition-colors">PROYEK</a>
            <span>/</span>
            <span class="text-[#20211F] dark:text-white font-bold truncate max-w-xs">{{ $project->slug }}</span>
        </nav>

        <!-- Header Hero Lockup -->
        <div class="space-y-4 border-b border-[#E2E0D5] dark:border-[#2d302a] pb-8">
            <div class="flex flex-wrap items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-[#E8E7DD] dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#32352f] rounded-full text-xs font-mono-code font-bold text-[#735a35] dark:text-[#C6A77B]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#735a35] dark:bg-[#C6A77B]"></span>
                    {{ $project->getLocalized('category_label', $locale) }}
                </span>
                <span class="px-3 py-1 rounded-full bg-[#f0efe6] dark:bg-[#272a24] text-xs font-mono-code text-[#52544F] dark:text-[#c4c6be] border border-[#E2E0D5]/60 dark:border-[#383b33]">
                    {{ $project->getLocalized('status_label', $locale) }}
                </span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl uppercase font-bold text-[#20211F] dark:text-white leading-[1.02]">
                {{ $project->getLocalized('title', $locale) }}
            </h1>

            <p class="text-base sm:text-lg text-[#52544F] dark:text-[#9a9c94] max-w-3xl leading-relaxed">
                {{ $project->getLocalized('summary', $locale) }}
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
                @if($project->repository_url)
                <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-md active:scale-95">
                    <span class="material-symbols-outlined text-[16px]">code</span>
                    <span>Lihat di GitHub</span>
                </a>
                @endif
                @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#32352f] text-[#20211F] dark:text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#f5f4ec] transition-all">
                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                    <span>Live Demo / Repositori</span>
                </a>
                @endif
            </div>
        </div>

        <!-- High-res Mockup Visual -->
        @if($project->mockup_url)
        <div class="rounded-2xl border border-[#E2E0D5] dark:border-[#2d302a] overflow-hidden shadow-2xl bg-white dark:bg-[#161715]">
            <div class="flex items-center justify-between px-4 py-3 bg-[#eae9e0]/80 dark:bg-[#222420] border-b border-[#E2E0D5] dark:border-[#2d302a]">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-[#f87171]"></span>
                    <span class="w-3 h-3 rounded-full bg-[#fbbf24]"></span>
                    <span class="w-3 h-3 rounded-full bg-[#34d399]"></span>
                    <span class="ml-3 font-mono-code text-xs text-[#52544F] dark:text-[#9a9c94]">https://{{ $project->slug }}.architecture.internal</span>
                </div>
                <span class="text-xs font-mono-code text-[#10b981] font-bold">HTTPS ENCRYPTED</span>
            </div>
            <img src="{{ asset($project->mockup_url) }}" alt="{{ $project->getLocalized('title', $locale) }}" class="w-full h-auto object-cover">
        </div>
        @endif

        <!-- Case Study Sections (Problem, Solution, Key Features) -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <div class="md:col-span-8 space-y-8">
                
                <!-- Overview & Description -->
                <div class="space-y-3">
                    <h2 class="font-display text-2xl uppercase font-bold text-[#20211F] dark:text-white">
                        Latar Belakang &amp; Gambaran Sistem
                    </h2>
                    <p class="text-sm text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                        {{ $project->getLocalized('description', $locale) }}
                    </p>
                </div>

                <!-- Problem vs Solution Breakdown -->
                @if($project->problem_id || $project->solution_id)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    @if($project->problem_id)
                    <div class="p-5 bg-white dark:bg-[#1c1d1a] border border-red-200/60 dark:border-red-900/40 rounded-xl space-y-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-red-600 dark:text-red-400 uppercase tracking-wider">
                            <span class="material-symbols-outlined text-[16px]">warning</span>
                            <span>Tantangan &amp; Masalah</span>
                        </div>
                        <p class="text-xs text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                            {{ $project->getLocalized('problem', $locale) }}
                        </p>
                    </div>
                    @endif

                    @if($project->solution_id)
                    <div class="p-5 bg-white dark:bg-[#1c1d1a] border border-emerald-200/60 dark:border-emerald-900/40 rounded-xl space-y-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">
                            <span class="material-symbols-outlined text-[16px]">check_circle</span>
                            <span>Solusi Arsitektur</span>
                        </div>
                        <p class="text-xs text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                            {{ $project->getLocalized('solution', $locale) }}
                        </p>
                    </div>
                    @endif
                </div>
                @endif

                <!-- Key Architectural Features -->
                @if($project->key_features && count($project->key_features) > 0)
                <div class="space-y-4 pt-2">
                    <h3 class="font-display text-xl uppercase font-bold text-[#20211F] dark:text-white">
                        Fitur Utama &amp; Integritas Sistem
                    </h3>
                    <ul class="space-y-2.5">
                        @foreach($project->key_features as $feature)
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-[#52544F] dark:text-[#9a9c94]">
                            <span class="material-symbols-outlined text-[#735a35] dark:text-[#C6A77B] text-[18px] shrink-0 mt-0.5">verified</span>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>

            <!-- Sidebar Specifications & Metrics -->
            <div class="md:col-span-4 space-y-6">
                
                <!-- Performance Metrics -->
                @if($project->metrics && count($project->metrics) > 0)
                <div class="p-5 bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl space-y-3">
                    <div class="text-xs font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                        TOLOK UKUR PERFORMA
                    </div>
                    <div class="space-y-2">
                        @foreach($project->metrics as $metric)
                        <div class="flex items-center justify-between text-xs pb-2 border-b border-[#E2E0D5]/50 dark:border-[#2d302a]">
                            <span class="text-[#52544F] dark:text-[#9a9c94]">{{ $metric['label'] ?? '' }}</span>
                            <span class="font-mono-code font-bold text-[#20211F] dark:text-white">{{ $metric['value'] ?? '' }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Technologies Used -->
                @if($project->technologies && count($project->technologies) > 0)
                <div class="p-5 bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl space-y-3">
                    <div class="text-xs font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                        TEKNOLOGI &amp; TOOLS
                    </div>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($project->technologies as $tech)
                        <span class="px-2.5 py-1 rounded bg-[#f5f4ec] dark:bg-[#272a24] border border-[#E2E0D5] dark:border-[#383b33] text-[#20211F] dark:text-white font-mono-code text-xs font-medium">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Author info & Contact CTA -->
                <div class="p-5 bg-[#E8E7DD]/70 dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl space-y-3 text-center">
                    <div class="text-xs font-bold uppercase tracking-wider text-[#20211F] dark:text-white">
                        Tertarik dengan arsitektur ini?
                    </div>
                    <p class="text-xs text-[#52544F] dark:text-[#9a9c94]">
                        Diskusikan implementasi serupa atau kebutuhan proyek sistem Anda.
                    </p>
                    <a href="{{ route('portfolio.index') }}#contact" class="inline-flex w-full justify-center items-center gap-1.5 py-2.5 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all">
                        <span>Hubungi Aditya</span>
                        <span class="material-symbols-outlined text-[14px]">mail</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- Related Projects Navigation -->
        @if($relatedProjects && count($relatedProjects) > 0)
        <div class="pt-8 border-t border-[#E2E0D5] dark:border-[#2d302a] space-y-4">
            <h3 class="font-display text-xl uppercase font-bold text-[#20211F] dark:text-white">
                Studi Kasus Lainnya
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($relatedProjects as $rel)
                <a href="{{ route('portfolio.project.detail', $rel->slug) }}" class="p-4 bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] dark:border-[#2d302a] hover:border-[#735a35] dark:hover:border-[#C6A77B] rounded-xl flex items-center justify-between group transition-all">
                    <div>
                        <div class="text-[10px] font-mono-code text-[#735a35] dark:text-[#C6A77B] font-bold uppercase">{{ $rel->getLocalized('category_label', $locale) }}</div>
                        <div class="font-display text-lg font-bold text-[#20211F] dark:text-white uppercase group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors mt-0.5">{{ $rel->getLocalized('title', $locale) }}</div>
                    </div>
                    <span class="material-symbols-outlined text-[#52544F] dark:text-[#9a9c94] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
