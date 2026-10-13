@extends('layouts.app')

@section('title', 'Tentang Saya — ' . ($profile->full_name ?? 'Aditya Yazidil Wahyudi'))

@section('content')
<div class="w-full interactive-mesh-bg py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Header Breadcrumb & Title -->
        <div class="space-y-3 border-b border-[#E2E0D5] dark:border-[#2d302a] pb-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-[#E8E7DD] dark:bg-[#222420] rounded-full text-xs font-mono-code text-[#735a35] dark:text-[#C6A77B]">
                <span class="w-1.5 h-1.5 rounded-full bg-[#10b981] animate-pulse"></span>
                <span>BIOGRAFI &amp; REKAM AKADEMIS</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl uppercase font-bold text-[#20211F] dark:text-white tracking-tight">
                {{ __('portfolio.about_title') }}
            </h1>
            <p class="text-sm sm:text-base text-[#52544F] dark:text-[#9a9c94] max-w-2xl leading-relaxed">
                Dedikasi penuh pada rekayasa web modern, fondasi algoritma terstruktur, dan arsitektur kode bersih berstandar industri.
            </p>
        </div>

        <!-- Section 1: Portrait & Narrative -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-sm aspect-[4/5] bg-[#B9BBB0]/50 dark:bg-[#2b2e27] rounded-t-[140px] rounded-b-2xl overflow-hidden shadow-xl border border-[#E2E0D5] dark:border-[#383b33] flex items-end group">
                    <img src="{{ asset('assets/images/aditya-portrait.png') }}" 
                         alt="{{ $profile->full_name }}" 
                         class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 dark:bg-[#20211F]/95 backdrop-blur-md p-3 rounded-xl border border-[#E2E0D5] dark:border-[#32352f] shadow-lg flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#735a35] dark:text-[#C6A77B] text-[20px]">verified</span>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#20211F] dark:text-white">{{ $profile->education_title }}</span>
                        </div>
                        <span class="text-[11px] font-mono-code font-bold px-2 py-0.5 rounded bg-[#f5f4ec] dark:bg-[#272a24] text-[#735a35] dark:text-[#C6A77B]">IPK {{ $profile->gpa }}</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="space-y-3">
                    <div class="text-xs font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-widest">
                        FILOSOFI &amp; PENDEKATAN REKAYASA
                    </div>
                    <h2 class="font-display text-3xl uppercase font-bold text-[#20211F] dark:text-white leading-tight">
                        {{ $profile->full_name }}
                    </h2>
                    <p class="text-sm sm:text-base text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                        {{ $profile->getLocalized('about', $locale) }}
                    </p>
                    <p class="text-sm text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                        Berpengalaman dalam merancang alur logika backend yang andal menggunakan PHP (Laravel) dan Python, memadukan penyimpanan basis data relasional MySQL, serta menyusun antarmuka responsif ramah pengguna dengan metodologi utility-first Tailwind CSS.
                    </p>
                </div>

                <!-- Academic Stepper -->
                <div class="space-y-3 pt-4 border-t border-[#E2E0D5] dark:border-[#2d302a]">
                    <div class="text-xs font-bold uppercase tracking-wider text-[#735a35] dark:text-[#C6A77B] flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px]">school</span>
                        <span>{{ __('portfolio.academic_history') }}</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($education as $edu)
                        <div class="p-4 bg-white dark:bg-[#1f211c] rounded-xl border border-[#E2E0D5] dark:border-[#2d302a] shadow-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-[#20211F] dark:text-white uppercase">{{ $edu->getLocalized('level', $locale) }}</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-[#f5f4ec] dark:bg-[#272a24] text-[#735a35] dark:text-[#C6A77B] font-mono-code">{{ $edu->period }}</span>
                            </div>
                            <div class="mt-2 pl-3 border-l-2 border-[#10b981]/60">
                                <div class="text-sm font-semibold text-[#20211F] dark:text-white">{{ $edu->institution }}</div>
                                <div class="text-xs text-[#52544F] dark:text-[#9a9c94] italic mt-0.5">{{ $edu->getLocalized('focus', $locale) }}</div>
                                @if($edu->getLocalized('badge', $locale))
                                <div class="mt-2">
                                    <span class="text-[10px] uppercase font-bold text-[#15803d] dark:text-[#34d399] bg-[#dcfce7] dark:bg-[#064e3b]/40 px-2 py-0.5 rounded">
                                        {{ $edu->getLocalized('badge', $locale) }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="{{ route('portfolio.cv.download') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all">
                        <span class="material-symbols-outlined text-[16px]">download</span>
                        <span>{{ __('portfolio.cta_download_cv') }}</span>
                    </a>
                    <a href="{{ route('portfolio.index') }}#contact" class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#32352f] text-[#20211F] dark:text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#f5f4ec] transition-all">
                        <span>{{ __('portfolio.cta_contact') }}</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
