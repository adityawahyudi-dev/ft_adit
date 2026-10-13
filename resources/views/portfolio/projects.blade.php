@extends('layouts.app')

@section('title', 'Proyek Rekayasa Sistem — ' . ($profile->full_name ?? 'Aditya Yazidil Wahyudi'))

@section('content')
<div class="w-full interactive-mesh-bg py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header & Category Toolbar -->
        <div class="space-y-6 border-b border-[#E2E0D5] dark:border-[#2d302a] pb-8">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-[#E8E7DD] dark:bg-[#222420] rounded-full text-xs font-mono-code text-[#735a35] dark:text-[#C6A77B]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#10b981] animate-pulse"></span>
                    <span>STUDI KASUS &amp; REPOSITORI KODE</span>
                </div>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl uppercase font-bold text-[#20211F] dark:text-white tracking-tight">
                    {{ __('portfolio.projects_heading') }}
                </h1>
                <p class="text-sm sm:text-base text-[#52544F] dark:text-[#9a9c94] max-w-2xl leading-relaxed">
                    Eksplorasi implementasi sistem modular, arsitektur RESTful API berlatensi rendah, serta sistem desain web berstandar aksesibilitas tinggi.
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap items-center gap-2 pt-2">
                <a href="{{ route('portfolio.projects', ['category' => 'all']) }}" 
                   class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider border transition-all {{ $category === 'all' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] border-[#20211F]' : 'bg-white dark:bg-[#1f211c] text-[#52544F] dark:text-[#9a9c94] border-[#E2E0D5] dark:border-[#32352f] hover:border-[#735a35]' }}">
                    {{ __('portfolio.projects_all') }}
                </a>
                <a href="{{ route('portfolio.projects', ['category' => 'fullstack']) }}" 
                   class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider border transition-all {{ $category === 'fullstack' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] border-[#20211F]' : 'bg-white dark:bg-[#1f211c] text-[#52544F] dark:text-[#9a9c94] border-[#E2E0D5] dark:border-[#32352f] hover:border-[#735a35]' }}">
                    {{ __('portfolio.projects_fullstack') }}
                </a>
                <a href="{{ route('portfolio.projects', ['category' => 'backend']) }}" 
                   class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider border transition-all {{ $category === 'backend' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] border-[#20211F]' : 'bg-white dark:bg-[#1f211c] text-[#52544F] dark:text-[#9a9c94] border-[#E2E0D5] dark:border-[#32352f] hover:border-[#735a35]' }}">
                    {{ __('portfolio.projects_backend') }}
                </a>
                <a href="{{ route('portfolio.projects', ['category' => 'designsystem']) }}" 
                   class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider border transition-all {{ $category === 'designsystem' ? 'bg-[#20211F] text-white dark:bg-[#C6A77B] dark:text-[#161715] border-[#20211F]' : 'bg-white dark:bg-[#1f211c] text-[#52544F] dark:text-[#9a9c94] border-[#E2E0D5] dark:border-[#32352f] hover:border-[#735a35]' }}">
                    {{ __('portfolio.projects_designsystem') }}
                </a>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $proj)
            <article class="flex flex-col justify-between bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] dark:border-[#2d302a] hover:border-[#735a35] dark:hover:border-[#C6A77B] rounded-2xl p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                <div class="space-y-4">
                    
                    <!-- Chrome Header & Mockup -->
                    <div class="rounded-xl border border-[#E2E0D5] dark:border-[#2d302a] overflow-hidden bg-[#fbfaf1] dark:bg-[#161715]">
                        <div class="flex items-center justify-between px-3 py-2 bg-[#eae9e0]/80 dark:bg-[#252822] border-b border-[#E2E0D5] dark:border-[#2d302a]">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#f87171]"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-[#fbbf24]"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-[#34d399]"></span>
                            </div>
                            <span class="text-[10px] font-mono-code text-[#52544F] dark:text-[#9a9c94]">app.{{ $proj->slug }}.internal</span>
                            <span class="material-symbols-outlined text-[12px] text-[#52544F] dark:text-[#9a9c94]">lock</span>
                        </div>
                        <div class="relative overflow-hidden aspect-video">
                            <img src="{{ asset($proj->mockup_url) }}" 
                                 alt="{{ $proj->getLocalized('title', $locale) }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                        </div>
                    </div>

                    <!-- Title & Badges -->
                    <div>
                        <div class="flex items-center justify-between text-xs font-mono-code mb-2">
                            <span class="font-bold text-[#20211F] dark:text-[#C6A77B] flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#735a35]"></span>
                                {{ $proj->getLocalized('category_label', $locale) }}
                            </span>
                            <span class="px-2 py-0.5 rounded-full bg-[#f0efe6] dark:bg-[#272a24] text-[10px] font-semibold text-[#52544F] dark:text-[#c4c6be]">
                                {{ $proj->getLocalized('status_label', $locale) }}
                            </span>
                        </div>
                        <h3 class="font-display text-[22px] font-bold text-[#20211F] dark:text-white uppercase leading-tight group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                            {{ $proj->getLocalized('title', $locale) }}
                        </h3>
                    </div>

                    <p class="text-xs text-[#52544F] dark:text-[#9a9c94] leading-relaxed line-clamp-3">
                        {{ $proj->getLocalized('summary', $locale) }}
                    </p>

                    <!-- Tech Stack Tags -->
                    @if($proj->technologies)
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        @foreach($proj->technologies as $tech)
                        <span class="px-2 py-0.5 rounded bg-[#f5f4ec] dark:bg-[#272a24] border border-[#E2E0D5]/60 dark:border-[#383b33] text-[#20211F] dark:text-[#e4e2df] font-mono-code text-[11px]">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                </div>

                <!-- Footer Actions -->
                <div class="flex items-center justify-between gap-2 pt-4 mt-5 border-t border-[#E2E0D5] dark:border-[#2d302a]">
                    <a href="{{ route('portfolio.project.detail', $proj->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-[#20211F] dark:text-[#C6A77B] hover:underline">
                        <span>{{ __('portfolio.cta_view_case_study') }}</span>
                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                    </a>
                    @if($proj->repository_url)
                    <a href="{{ $proj->repository_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-[#f0efe6] dark:bg-[#272a24] hover:bg-[#20211F] hover:text-white dark:hover:bg-[#C6A77B] dark:hover:text-[#161715] text-[#20211F] dark:text-white font-mono-code text-xs transition-all">
                        <span>GitHub</span>
                        <span class="material-symbols-outlined text-[13px]">code</span>
                    </a>
                    @endif
                </div>
            </article>
            @empty
            <div class="col-span-3 p-12 text-center bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] dark:border-[#2d302a] rounded-2xl space-y-3">
                <span class="material-symbols-outlined text-4xl text-[#735a35] dark:text-[#C6A77B]">folder_open</span>
                <p class="text-base font-semibold text-[#20211F] dark:text-white">{{ __('portfolio.projects_empty') }}</p>
                <a href="{{ route('portfolio.projects', ['category' => 'all']) }}" class="inline-block text-xs font-bold uppercase text-[#735a35] dark:text-[#C6A77B] hover:underline">
                    Tampilkan Semua Kategori
                </a>
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
