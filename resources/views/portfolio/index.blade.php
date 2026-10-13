@extends('layouts.app')

@section('title', ($profile->full_name ?? 'Aditya Yazidil Wahyudi') . ' — Portfolio')

@section('content')
<div class="w-full interactive-mesh-bg overflow-x-hidden">

    <!-- HERO SECTION: Tripartite Composition -->
    <section class="relative w-full pt-6 pb-14 lg:py-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 items-center">
                
                <!-- Zone 1 (Left): Headline & CTAs -->
                <div class="lg:col-span-5 flex flex-col justify-center space-y-5 order-2 lg:order-1">
                    <!-- Greeting Badge -->
                    <div class="inline-flex items-center gap-2 bg-[#E8E7DD]/80 dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#32352f] px-3.5 py-1.5 rounded-full w-fit shadow-xs">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#10b981] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#10b981]"></span>
                        </span>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#20211F] dark:text-[#F1F0E8]">
                            {{ $profile->getLocalized('headline', $locale) == 'FULL-STACK DEVELOPER' ? ($locale === 'en' ? 'HELLO, I AM ' . $profile->full_name : 'HALO, SAYA ' . $profile->full_name) : $profile->getLocalized('headline', $locale) }}
                        </span>
                    </div>

                    <!-- Display Typography -->
                    <div class="space-y-1">
                        <h1 class="font-display text-[58px] sm:text-[68px] lg:text-[76px] leading-[0.92] text-[#20211F] dark:text-white font-bold tracking-tight uppercase">
                            FULL-STACK
                        </h1>
                        <div class="font-serif-accent italic text-[42px] sm:text-[50px] lg:text-[54px] leading-tight text-[#9a7b4f] dark:text-[#C6A77B]">
                            {{ $profile->getLocalized('subheadline', $locale) }}
                        </div>
                        <p class="text-[15px] text-[#52544F] dark:text-[#9a9c94] max-w-md pt-2 leading-relaxed">
                            {{ $profile->getLocalized('bio', $locale) }}
                        </p>
                    </div>

                    <!-- CTA Actions -->
                    <div class="flex flex-wrap items-center gap-3 pt-1">
                        <a href="#projects" class="group relative inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-xl text-[13px] font-bold uppercase tracking-wider hover:bg-[#30312c] dark:hover:bg-[#d6b78b] transition-all shadow-md hover:shadow-xl active:scale-[0.97] hover:-translate-y-0.5">
                            <span>{{ __('portfolio.cta_view_projects') }}</span>
                            <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1.5 transition-transform duration-200">arrow_forward</span>
                        </a>
                        <a href="#contact" class="group relative inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-white dark:bg-[#222420] border border-[#E2E0D5] dark:border-[#32352f] text-[#20211F] dark:text-[#F1F0E8] rounded-xl text-[13px] font-bold uppercase tracking-wider hover:bg-[#f5f4ec] dark:hover:bg-[#2c2f29] transition-all shadow-xs hover:shadow-md active:scale-[0.97] hover:-translate-y-0.5">
                            <span>{{ __('portfolio.cta_contact') }}</span>
                            <span class="material-symbols-outlined text-[16px] group-hover:rotate-45 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-all duration-300">near_me</span>
                        </a>
                    </div>

                    <!-- Verified Badges -->
                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <div class="inline-flex items-center gap-2 px-3.5 py-2 bg-white dark:bg-[#222420] border border-[#E2E0D5]/80 dark:border-[#32352f] rounded-xl text-[12px] font-semibold text-[#52544F] dark:text-[#c4c6be] shadow-xs">
                            <span class="material-symbols-outlined text-[16px] text-[#735a35] dark:text-[#C6A77B]">school</span>
                            <span>{{ $profile->education_title }} • IPK {{ $profile->gpa }}</span>
                        </div>
                        <div class="inline-flex items-center gap-2 px-3.5 py-2 bg-white dark:bg-[#222420] border border-[#E2E0D5]/80 dark:border-[#32352f] rounded-xl text-[12px] font-semibold text-[#52544F] dark:text-[#c4c6be] shadow-xs">
                            <span class="material-symbols-outlined text-[16px] text-[#10b981]">verified</span>
                            <span>Ready to Work</span>
                        </div>
                    </div>
                </div>

                <!-- Zone 2 (Center): Architectural Arch & Portrait Cutout -->
                <div class="lg:col-span-4 flex justify-center items-end relative order-1 lg:order-2 pt-2">
                    <div class="relative w-[280px] sm:w-[320px] flex justify-center items-end group">
                        
                        <!-- Arch Frame Backdrop -->
                        <div class="w-[260px] sm:w-[290px] h-[370px] sm:h-[400px] bg-[#B9BBB0]/40 dark:bg-[#2b2e27] border border-[#E2E0D5] dark:border-[#383b33] rounded-t-[140px] rounded-b-2xl absolute bottom-0 left-1/2 -translate-x-1/2 shadow-inner animate-arch-breathe pointer-events-none"></div>
                        
                        <!-- Aditya's Cutout Photo -->
                        <div class="relative z-10 w-full flex justify-center transition-transform duration-500 ease-out group-hover:scale-[1.03] group-hover:-translate-y-1">
                            <img src="{{ asset('assets/images/aditya-cutout.png') }}" 
                                 alt="Aditya Yazidil Wahyudi" 
                                 class="w-[280px] sm:w-[320px] h-[400px] sm:h-[440px] object-contain object-bottom drop-shadow-2xl transition-all duration-300">
                        </div>

                        <!-- Floating Live Status Badge -->
                        <div class="absolute -bottom-4 z-20 bg-white/95 dark:bg-[#20211F]/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-lg border border-[#E2E0D5] dark:border-[#383b33] flex items-center gap-3 transition-all duration-300 hover:scale-105 cursor-default">
                            <div class="relative flex h-7 w-7 shrink-0">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#10b981] opacity-35"></span>
                                <div class="w-7 h-7 rounded-lg bg-[#ecfdf5] dark:bg-[#064e3b]/40 flex items-center justify-center text-[#10b981] shrink-0 border border-[#10b981]/20">
                                    <span class="material-symbols-outlined text-[16px]">bolt</span>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="text-[9px] text-[#9a7b4f] dark:text-[#C6A77B] font-bold uppercase tracking-wider leading-none">
                                    {{ __('portfolio.status_current') }}
                                </div>
                                <div class="font-display text-[#20211F] dark:text-white text-[12px] font-bold tracking-wide uppercase mt-0.5 flex items-center gap-1.5">
                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#10b981]"></span>
                                    {{ $profile->getLocalized('status_badge', $locale) }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Zone 3 (Right): Stacked Metrics & Availability -->
                <div class="lg:col-span-3 flex flex-col space-y-3.5 order-3">
                    
                    <!-- Availability Card -->
                    <div class="bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] p-4 rounded-2xl shadow-xs hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 space-y-1.5 group cursor-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1.5 text-[11px] font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#10b981] opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#10b981]"></span>
                                </span>
                                <span>{{ $locale === 'en' ? 'WORK AVAILABILITY' : 'KESIAPAN KERJA' }}</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full bg-[#dcfce7] dark:bg-[#064e3b]/50 text-[#15803d] dark:text-[#34d399] text-[10px] font-bold uppercase tracking-wider inline-flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#15803d] dark:bg-[#34d399] animate-pulse"></span>
                                {{ __('portfolio.status_active') }}
                            </span>
                        </div>
                        <div class="font-display text-[17px] font-bold text-[#20211F] dark:text-white uppercase leading-tight pt-0.5 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                            {{ __('portfolio.status_hire') }}
                        </div>
                        <p class="text-[12px] text-[#52544F] dark:text-[#9a9c94] leading-snug">
                            {{ $profile->getLocalized('status_description', $locale) ?? __('portfolio.status_desc') }}
                        </p>
                    </div>

                    <!-- Location & Timezone Card -->
                    <div class="bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] p-4 rounded-2xl shadow-xs hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 space-y-2 group cursor-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1.5 text-[11px] font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                                <span class="material-symbols-outlined text-[14px]">location_on</span>
                                <span>{{ __('portfolio.location_label') }}</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-md bg-[#f5f4ec] dark:bg-[#272a24] text-[#52544F] dark:text-[#c4c6be] text-[10px] font-semibold border border-[#E2E0D5]/50 dark:border-[#383b33]">
                                {{ $profile->timezone }}
                            </span>
                        </div>
                        <div class="font-display text-[17px] font-bold text-[#20211F] dark:text-white uppercase leading-tight group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                            {{ __('portfolio.location_val') }}
                        </div>
                        <div class="flex flex-wrap gap-2 pt-1">
                            <div class="inline-flex items-center gap-1 px-2.5 py-1 bg-[#f5f4ec] dark:bg-[#272a24] border border-[#E2E0D5]/60 dark:border-[#383b33] rounded-lg text-[11px] font-semibold text-[#52544F] dark:text-[#c4c6be]">
                                <span class="material-symbols-outlined text-[13px] text-[#10b981]">wifi</span>
                                <span>{{ __('portfolio.remote_ok') }}</span>
                            </div>
                            <div class="inline-flex items-center gap-1 px-2.5 py-1 bg-[#f5f4ec] dark:bg-[#272a24] border border-[#E2E0D5]/60 dark:border-[#383b33] rounded-lg text-[11px] font-semibold text-[#52544F] dark:text-[#c4c6be]">
                                <span class="material-symbols-outlined text-[13px] text-[#735a35] dark:text-[#C6A77B]">apartment</span>
                                <span>{{ __('portfolio.hybrid_relocate') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stack Snapshot Card -->
                    <div class="bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] p-4 rounded-2xl shadow-xs hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 space-y-2.5 group cursor-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1.5 text-[11px] font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                                <span class="material-symbols-outlined text-[14px]">code</span>
                                <span>{{ __('portfolio.tech_stack_quick') }}</span>
                            </div>
                            <span class="material-symbols-outlined text-[14px] text-[#52544F] dark:text-[#9a9c94]">tune</span>
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(['Laravel', 'PHP 8.5', 'JavaScript', 'Python', 'MySQL', 'Tailwind'] as $tech)
                            <span class="px-2.5 py-1 bg-[#f5f4ec] dark:bg-[#272a24] hover:bg-[#20211F] hover:text-white dark:hover:bg-[#C6A77B] dark:hover:text-[#161715] border border-[#E2E0D5]/60 dark:border-[#383b33] rounded-lg text-[11px] font-semibold text-[#20211F] dark:text-[#e4e2df] transition-all duration-200 cursor-default">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- 4 FOUNDATIONAL PILLARS -->
    <section class="w-full pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($skills->take(4) as $skill)
                <div class="relative bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] p-4 rounded-2xl shadow-xs flex items-center gap-3.5 hover:shadow-lg hover:-translate-y-1 hover:border-[#735a35]/60 dark:hover:border-[#C6A77B]/60 transition-all duration-300 group cursor-default overflow-hidden">
                    <div class="w-11 h-11 rounded-xl bg-[#f5f4ec] dark:bg-[#272a24] group-hover:bg-[#20211F] group-hover:text-white dark:group-hover:bg-[#C6A77B] dark:group-hover:text-[#161715] transition-colors flex items-center justify-center text-[#20211F] dark:text-white shrink-0 font-bold text-[13px]">
                        @if($skill->icon === 'html')
                            <span class="tracking-tighter">HTML</span>
                        @else
                            <span class="material-symbols-outlined text-[18px]">{{ $skill->icon ?? 'terminal' }}</span>
                        @endif
                    </div>
                    <div>
                        <div class="text-[10px] font-bold text-[#9a7b4f] dark:text-[#C6A77B] uppercase tracking-wider leading-none">
                            {{ $skill->getLocalized('badge', $locale) }}
                        </div>
                        <h3 class="font-display text-[16px] font-bold text-[#20211F] dark:text-white uppercase mt-0.5 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                            {{ $skill->getLocalized('title', $locale) }}
                        </h3>
                        <p class="text-[12px] text-[#52544F] dark:text-[#9a9c94] mt-0.5 leading-snug">
                            {{ $skill->getLocalized('description', $locale) }}
                        </p>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-[#735a35] dark:via-[#C6A77B] to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION: DICODING ACADEMY VERIFIED CERTIFICATIONS -->
    <section class="w-full scroll-mt-16 py-14 bg-[#20211F] dark:bg-[#111210] text-white relative overflow-hidden" id="skills">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-white/20">
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 border border-white/20 rounded-full text-[11px] font-bold uppercase tracking-wider text-white shadow-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#10b981] animate-ping"></span>
                            DICODING ACADEMY VERIFIED
                        </span>
                    </div>
                    <h2 class="font-display text-[34px] sm:text-[42px] leading-none text-white uppercase font-bold tracking-tight">
                        {{ __('portfolio.certs_title') }}
                    </h2>
                    <p class="text-[14px] text-white/70 max-w-2xl leading-relaxed">
                        {{ __('portfolio.certs_desc') }}
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <div class="px-4 py-2.5 bg-white/10 border border-white/20 rounded-xl shadow-xs text-left backdrop-blur-md">
                        <div class="text-[10px] font-bold text-[#e2c194] uppercase tracking-wider leading-none">TOTAL STATUS</div>
                        <div class="font-display text-[18px] font-bold text-white uppercase mt-0.5 flex items-center gap-2">
                            <span class="inline-block w-2 h-2 rounded-full bg-[#10b981] animate-pulse"></span>
                            {{ $certifications->count() }} {{ __('portfolio.certs_count') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certifications Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 max-w-5xl mx-auto gap-6 pt-8">
                @foreach($certifications as $cert)
                <div class="hover-tilt-card bg-white dark:bg-[#1c1d1a] text-[#20211F] dark:text-[#F1F0E8] rounded-2xl border border-[#E2E0D5] dark:border-[#32352f] shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group p-5">
                    <div class="space-y-4">
                        <!-- Certificate Mockup with Shimmer Sweep -->
                        <div class="relative rounded-xl overflow-hidden border border-[#E2E0D5] dark:border-[#32352f] shadow-sm bg-[#20211F] aspect-[16/11]">
                            <img src="{{ asset($cert->image_url) }}" 
                                 alt="{{ $cert->getLocalized('title', $locale) }}" 
                                 class="w-full h-full object-cover object-center group-hover:scale-[1.03] transition-transform duration-700 ease-out">
                            <div class="absolute top-3 left-3 bg-[#20211F]/90 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 flex items-center gap-1.5 shimmer-sweep-effect shadow-md">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#10b981]"></span>
                                <span class="font-mono-code text-[10px] text-white font-bold tracking-wider uppercase">{{ __('portfolio.verified_credential') }}</span>
                            </div>
                            <div class="absolute top-3 right-3 bg-[#735a35] text-white px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm flex items-center gap-1 shimmer-sweep-effect">
                                <span class="material-symbols-outlined text-[13px]">verified</span>
                                <span>{{ __('portfolio.seal_of_pass') }}</span>
                            </div>
                        </div>

                        <!-- Certificate Meta & Copyable Credential ID -->
                        <div class="flex items-center justify-between border-b border-[#E2E0D5]/70 dark:border-[#2d302a] pb-3">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-[#735a35] dark:bg-[#C6A77B] animate-pulse"></span>
                                <span class="text-[11px] text-[#735a35] dark:text-[#C6A77B] uppercase tracking-widest font-bold">
                                    {{ $cert->issuer }}
                                </span>
                            </div>
                            <button type="button" 
                                    onclick="copyToClipboard('{{ $cert->credential_id }}', 'ID Kredensial Dicoding disalin!')" 
                                    class="px-2.5 py-1 rounded-md bg-[#f5f4ec] dark:bg-[#272a24] text-[#20211F] dark:text-white text-[10px] font-mono-code font-bold uppercase tracking-wider border border-[#E2E0D5]/60 dark:border-[#383b33] hover:bg-[#20211F] hover:text-white dark:hover:bg-[#C6A77B] dark:hover:text-[#161715] transition-colors cursor-pointer flex items-center gap-1" 
                                    title="Klik untuk menyalin ID Kredensial">
                                <span>ID: {{ $cert->credential_id }}</span>
                                <span class="material-symbols-outlined text-[12px]">content_copy</span>
                            </button>
                        </div>

                        <!-- Content Details -->
                        <div>
                            <div class="text-[11px] font-bold text-[#52544F] dark:text-[#9a9c94] uppercase tracking-wider">
                                {{ $cert->getLocalized('track', $locale) }}
                            </div>
                            <h3 class="font-display text-[22px] text-[#20211F] dark:text-white uppercase font-bold leading-tight mt-1 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                                {{ $cert->getLocalized('title', $locale) }}
                            </h3>
                            <p class="text-[13px] text-[#52544F] dark:text-[#9a9c94] mt-2 leading-relaxed">
                                {{ $cert->getLocalized('description', $locale) }}
                            </p>
                        </div>

                        <!-- Skill Tags -->
                        @if($cert->skills)
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($cert->skills as $skillTag)
                            <span class="px-2.5 py-1 bg-[#f5f4ec] dark:bg-[#272a24] border border-[#E2E0D5] dark:border-[#383b33] rounded-lg text-[11px] font-semibold text-[#20211F] dark:text-[#e4e2df]">
                                {{ $skillTag }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Card Footer: Issue date & Verification link -->
                    <div class="pt-5 mt-4 border-t border-[#E2E0D5] dark:border-[#2d302a] flex flex-wrap items-center justify-between gap-3">
                        <div class="space-y-0.5">
                            <div class="text-[10px] font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-wider">
                                {{ __('portfolio.graduation_date') }}
                            </div>
                            <div class="text-[12px] font-semibold text-[#20211F] dark:text-white">
                                {{ $cert->getLocalized('issue_date', $locale) }} • <span class="text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.valid_until') }} {{ $cert->valid_until }}</span>
                            </div>
                        </div>
                        @if($cert->credential_url)
                        <a href="{{ $cert->credential_url }}" target="_blank" rel="noopener noreferrer" class="group/btn inline-flex items-center gap-2 font-bold text-white bg-[#20211F] hover:bg-[#30312c] dark:bg-[#C6A77B] dark:text-[#161715] dark:hover:bg-[#d6b78b] px-4 py-2.5 rounded-xl transition-all duration-200 shadow-xs hover:shadow-md active:scale-95 text-[12px] uppercase tracking-wider">
                            <span>{{ __('portfolio.cta_verify_credential') }}</span>
                            <span class="material-symbols-outlined text-[15px] group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5 transition-transform">north_east</span>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- SECTION: ABOUT & ACADEMIC STEPPER -->
    <section class="w-full py-16 scroll-mt-16 bg-[#fbfaf1] dark:bg-[#161715]" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left: Arch Photo Cutout in Room Setting -->
                <div class="lg:col-span-5 relative flex justify-center">
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

                <!-- Right: Narrative & Stepper -->
                <div class="lg:col-span-7 flex flex-col space-y-6">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-widest">
                            <span class="w-2 h-2 rounded-full bg-[#735a35] dark:bg-[#C6A77B] animate-ping"></span>
                            <span>{{ __('portfolio.about_track_record') }}</span>
                        </div>
                        <h2 class="font-display text-[36px] sm:text-[44px] uppercase font-bold text-[#20211F] dark:text-white leading-tight">
                            {{ $profile->full_name }}
                        </h2>
                        <p class="text-[15px] text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                            {{ $profile->getLocalized('about', $locale) }}
                        </p>
                    </div>

                    <!-- Academic Timeline Stepper -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center justify-between border-b border-[#E2E0D5] dark:border-[#2d302a] pb-2">
                            <span class="text-xs font-bold uppercase tracking-widest text-[#735a35] dark:text-[#C6A77B] flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[16px]">school</span>
                                <span>{{ __('portfolio.academic_history') }}</span>
                            </span>
                            <span class="text-[11px] uppercase tracking-wider text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.academic_subtitle') }}</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            @foreach($education as $edu)
                            <div class="p-3.5 bg-white dark:bg-[#1f211c] rounded-xl border border-[#E2E0D5] dark:border-[#2d302a] shadow-2xs hover:shadow-sm hover:border-[#735a35] dark:hover:border-[#C6A77B] transition-all">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-xs font-bold text-[#20211F] dark:text-white uppercase">{{ $edu->getLocalized('level', $locale) }}</span>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-[#f5f4ec] dark:bg-[#272a24] text-[#735a35] dark:text-[#C6A77B] font-mono-code">{{ $edu->period }}</span>
                                </div>
                                <div class="mt-2 pl-3 border-l-2 border-[#10b981]/50 space-y-0.5">
                                    <div class="text-[13px] font-semibold text-[#20211F] dark:text-[#F1F0E8]">{{ $edu->institution }}</div>
                                    <div class="text-[11px] text-[#52544F] dark:text-[#9a9c94] italic">{{ $edu->getLocalized('focus', $locale) }}</div>
                                    @if($edu->getLocalized('badge', $locale))
                                    <div class="pt-1">
                                        <span class="inline-block text-[10px] uppercase font-bold text-[#15803d] dark:text-[#34d399] bg-[#dcfce7] dark:bg-[#064e3b]/40 px-2 py-0.5 rounded">
                                            {{ $edu->getLocalized('badge', $locale) }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- 3 Stat Metrics Counters -->
                    <div class="grid grid-cols-3 gap-3 pt-3">
                        <div class="p-3 bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl text-center">
                            <div class="font-display text-[28px] sm:text-[34px] font-bold text-[#20211F] dark:text-white leading-none">100%</div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#735a35] dark:text-[#C6A77B] mt-1">{{ __('portfolio.stat_clean_code') }}</div>
                            <div class="text-[10px] text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.stat_clean_code_sub') }}</div>
                        </div>
                        <div class="p-3 bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl text-center">
                            <div class="font-display text-[28px] sm:text-[34px] font-bold text-[#20211F] dark:text-white leading-none">144+</div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#735a35] dark:text-[#C6A77B] mt-1">{{ __('portfolio.stat_credits') }}</div>
                            <div class="text-[10px] text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.stat_credits_sub') }}</div>
                        </div>
                        <div class="p-3 bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] rounded-xl text-center">
                            <div class="font-display text-[28px] sm:text-[34px] font-bold text-[#20211F] dark:text-white leading-none">&lt;100ms</div>
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#735a35] dark:text-[#C6A77B] mt-1">{{ __('portfolio.stat_latency') }}</div>
                            <div class="text-[10px] text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.stat_latency_sub') }}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: OFFICIAL CV CURRICULUM VITAE DOWNLOAD -->
    <section class="w-full py-14 bg-[#20211F] dark:bg-[#111210] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full text-xs font-mono-code text-[#e2c194]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#10b981] animate-pulse"></span>
                        <span>{{ __('portfolio.cv_section_title') }}</span>
                    </div>
                    <div>
                        <h2 class="font-display text-[36px] sm:text-[46px] leading-tight text-white uppercase font-bold">
                            {{ __('portfolio.cv_section_title') }} <span class="font-serif-accent italic lowercase text-[#e2c194]">curriculum vitae</span> LENGKAP
                        </h2>
                        <p class="text-[14px] text-white/70 max-w-xl leading-relaxed pt-2">
                            {{ __('portfolio.cv_section_desc') }}
                        </p>
                    </div>

                    <div class="space-y-2 pt-2 border-y border-white/10 py-4 text-xs font-semibold">
                        <div class="flex items-center justify-between text-white/80">
                            <span class="text-white/50">FORMAT:</span>
                            <span class="font-mono-code text-white">Portable Document Format (PDF)</span>
                        </div>
                        <div class="flex items-center justify-between text-white/80">
                            <span class="text-white/50">FOKUS:</span>
                            <span>Web Developer & Software Engineering</span>
                        </div>
                        <div class="flex items-center justify-between text-white/80">
                            <span class="text-white/50">STATUS:</span>
                            <span class="text-[#34d399] flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#34d399] animate-pulse"></span>
                                {{ __('portfolio.cv_current_status') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ route('portfolio.cv.download') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-[#C6A77B] hover:bg-[#d6b78b] text-[#161715] font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all active:scale-95">
                            <span class="material-symbols-outlined text-[18px]">download</span>
                            <span>{{ __('portfolio.cta_download_cv') }}</span>
                        </a>
                        <span class="text-[11px] text-white/60">
                            Ukuran: ~1.4 MB • Versi Revisi {{ date('Y') }}
                        </span>
                    </div>
                </div>

                <!-- CV Preview Mockup -->
                <div class="lg:col-span-6 flex justify-center">
                    <div class="relative w-full max-w-md bg-white text-[#20211F] rounded-2xl p-4 shadow-2xl border border-white/20 group">
                        <div class="flex items-center justify-between pb-3 border-b border-[#E2E0D5] text-[11px] font-mono-code text-[#52544F]">
                            <div class="flex items-center gap-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                                <span class="ml-2 font-semibold">CV_ADITYA_YAZIDIL_WAHYUDI.PDF</span>
                            </div>
                            <span>1 HALAMAN</span>
                        </div>
                        <div class="pt-3 max-h-[380px] overflow-hidden rounded-lg bg-gray-50 flex justify-center">
                            <img src="{{ asset('assets/images/cv-preview.png') }}" 
                                 alt="CV Aditya Yazidil Wahyudi" 
                                 class="w-full object-contain group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="pt-3 text-center">
                            <a href="{{ route('portfolio.cv.download') }}" class="inline-flex items-center gap-1 text-xs font-bold uppercase text-[#735a35] hover:underline">
                                <span class="material-symbols-outlined text-[15px]">zoom_in</span>
                                <span>Periksa Dokumen Lengkap</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: PROJECTS SHOWCASE -->
    <section class="w-full py-16 scroll-mt-16" id="projects">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 pb-4 border-b border-[#E2E0D5] dark:border-[#2d302a]">
                <div class="space-y-1">
                    <div class="text-[11px] font-bold text-[#735a35] dark:text-[#C6A77B] uppercase tracking-widest">
                        03 / REAL-WORLD CODE ARTIFACTS
                    </div>
                    <h2 class="font-display text-[36px] sm:text-[46px] uppercase font-bold text-[#20211F] dark:text-white leading-tight">
                        {{ __('portfolio.projects_heading') }}
                    </h2>
                    <p class="text-sm text-[#52544F] dark:text-[#9a9c94]">
                        {{ __('portfolio.projects_subheading') }}
                    </p>
                </div>
                <a href="{{ route('portfolio.projects') }}" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-[#20211F] dark:text-white hover:text-[#735a35] dark:hover:text-[#C6A77B] transition-colors">
                    <span>Lihat Semua Proyek</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
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

                        <!-- Meta & Title -->
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
                            @foreach(array_slice($proj->technologies, 0, 4) as $tech)
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
                <div class="col-span-3 p-8 text-center bg-white dark:bg-[#1c1d1a] border border-[#E2E0D5] rounded-2xl">
                    <p class="text-[#52544F] dark:text-[#9a9c94]">{{ __('portfolio.projects_empty') }}</p>
                </div>
                @endforelse
            </div>

            <!-- INDEPENDENT R&D EXPLORATION CARD -->
            <div class="mt-10 p-6 sm:p-8 bg-[#E8E7DD]/70 dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] rounded-2xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-2 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/70 dark:bg-[#272a24] rounded-full text-[10px] font-bold uppercase tracking-widest text-[#735a35] dark:text-[#C6A77B]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#735a35] dark:bg-[#C6A77B] animate-ping"></span>
                        <span>{{ __('portfolio.research_title') }}</span>
                    </div>
                    <h3 class="font-display text-[24px] sm:text-[28px] uppercase font-bold text-[#20211F] dark:text-white">
                        {{ __('portfolio.research_project_name') }}
                    </h3>
                    <p class="text-xs sm:text-sm text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                        {{ __('portfolio.research_desc') }}
                    </p>
                </div>
                <div class="bg-white dark:bg-[#272a24] border border-[#E2E0D5] dark:border-[#383b33] p-4 rounded-xl shadow-xs w-full md:w-64 text-center shrink-0">
                    <div class="flex items-center justify-between text-xs font-semibold text-[#52544F] dark:text-[#9a9c94] mb-1">
                        <span>STATUS PROGRES</span>
                        <span class="text-[#10b981] font-bold">{{ $settings['research_project_sprint'] ?? 'Sprint 4 / 6' }}</span>
                    </div>
                    <div class="font-display text-3xl font-bold text-[#20211F] dark:text-white">{{ $settings['research_project_progress'] ?? '65' }}% SELESAI</div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-full mt-2 overflow-hidden">
                        <div class="bg-[#735a35] dark:bg-[#C6A77B] h-2 rounded-full" style="width: {{ $settings['research_project_progress'] ?? '65' }}%;"></div>
                    </div>
                    <div class="text-[10px] text-[#52544F] dark:text-[#9a9c94] mt-2 font-mono-code">{{ $settings['research_project_target'] ?? 'Target Rilis: Q2 2026' }}</div>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: CONTACT & INQUIRY -->
    <section class="w-full py-16 scroll-mt-16 bg-[#fbfaf1] dark:bg-[#161715]" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 mb-8">
                <h2 class="font-display text-[36px] sm:text-[46px] leading-none text-[#20211F] dark:text-white uppercase font-bold tracking-tight">
                    {{ __('portfolio.contact_title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Left: Channels, Availability & SLA -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="space-y-3">
                        <h3 class="font-display text-[24px] sm:text-[28px] uppercase font-bold text-[#20211F] dark:text-white leading-tight">
                            {{ __('portfolio.contact_subtitle') }}
                        </h3>
                        <p class="text-[14px] text-[#52544F] dark:text-[#9a9c94] leading-relaxed">
                            {{ __('portfolio.contact_desc') }}
                        </p>
                    </div>

                    <div class="space-y-3 pt-2">
                        <!-- Email Link with Copy -->
                        <div class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] hover:border-[#735a35] dark:hover:border-[#C6A77B] shadow-2xs hover:shadow-md transition-all group">
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-11 h-11 rounded-lg bg-[#f5f4ec] dark:bg-[#272a24] flex items-center justify-center text-[#735a35] dark:text-[#C6A77B] shrink-0 group-hover:bg-[#20211F] group-hover:text-white dark:group-hover:bg-[#C6A77B] dark:group-hover:text-[#161715] transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">mail</span>
                                </div>
                                <div class="min-w-0">
                                    <div class="text-[10px] font-bold text-[#9a7b4f] dark:text-[#C6A77B] uppercase tracking-wider leading-none">{{ __('portfolio.contact_email_direct') }}</div>
                                    <a href="mailto:{{ $profile->email ?? 'adityayazidilwahyudi@gmail.com' }}" class="text-[13px] sm:text-[14px] font-semibold text-[#20211F] dark:text-white truncate block hover:text-[#735a35] dark:hover:text-[#C6A77B] transition-colors mt-0.5">
                                        {{ $profile->email ?? 'adityayazidilwahyudi@gmail.com' }}
                                    </a>
                                </div>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $profile->email ?? 'adityayazidilwahyudi@gmail.com' }}', 'Alamat email disalin!')" class="shrink-0 text-xs px-2.5 py-1 rounded-md bg-[#f5f4ec] dark:bg-[#272a24] text-[#52544F] dark:text-[#9a9c94] hover:text-[#20211F] dark:hover:text-white font-semibold">
                                Salin
                            </button>
                        </div>

                        <!-- LinkedIn Link -->
                        <a href="{{ $profile->linkedin_url ?? 'https://linkedin.com/in/aditya-yazidil' }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] hover:border-[#735a35] dark:hover:border-[#C6A77B] shadow-2xs hover:shadow-md transition-all group">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-lg bg-[#f5f4ec] dark:bg-[#272a24] flex items-center justify-center text-[#735a35] dark:text-[#C6A77B] shrink-0 group-hover:bg-[#20211F] group-hover:text-white dark:group-hover:bg-[#C6A77B] dark:group-hover:text-[#161715] transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">badge</span>
                                </div>
                                <div>
                                    <div class="text-[10px] font-bold text-[#9a7b4f] dark:text-[#C6A77B] uppercase tracking-wider leading-none">{{ __('portfolio.contact_linkedin') }}</div>
                                    <div class="text-[13px] sm:text-[14px] font-semibold text-[#20211F] dark:text-white mt-0.5 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                                        linkedin.com/in/aditya-yazidil
                                    </div>
                                </div>
                            </div>
                            <span class="material-symbols-outlined text-[18px] text-[#52544F] dark:text-[#9a9c94] group-hover:translate-x-1 transition-transform">north_east</span>
                        </a>

                        <!-- GitHub Link -->
                        <a href="{{ $profile->github_url ?? 'https://github.com/aditya-yazidil' }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] hover:border-[#735a35] dark:hover:border-[#C6A77B] shadow-2xs hover:shadow-md transition-all group">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-lg bg-[#f5f4ec] dark:bg-[#272a24] flex items-center justify-center text-[#735a35] dark:text-[#C6A77B] shrink-0 group-hover:bg-[#20211F] group-hover:text-white dark:group-hover:bg-[#C6A77B] dark:group-hover:text-[#161715] transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">code</span>
                                </div>
                                <div>
                                    <div class="text-[10px] font-bold text-[#9a7b4f] dark:text-[#C6A77B] uppercase tracking-wider leading-none">{{ __('portfolio.contact_github') }}</div>
                                    <div class="text-[13px] sm:text-[14px] font-semibold text-[#20211F] dark:text-white mt-0.5 group-hover:text-[#735a35] dark:group-hover:text-[#C6A77B] transition-colors">
                                        github.com/aditya-yazidil
                                    </div>
                                </div>
                            </div>
                            <span class="material-symbols-outlined text-[18px] text-[#52544F] dark:text-[#9a9c94] group-hover:translate-x-1 transition-transform">north_east</span>
                        </a>
                    </div>

                    <div class="flex items-center gap-2 text-[12px] font-semibold text-[#52544F] dark:text-[#9a9c94] pt-1">
                        <span class="material-symbols-outlined text-[16px] text-[#735a35] dark:text-[#C6A77B]">schedule</span>
                        <span>{{ __('portfolio.contact_response_sla') }}</span>
                    </div>
                </div>

                <!-- Right: Validated Interactive Contact Form -->
                <div class="lg:col-span-7 bg-[#E8E7DD]/70 dark:bg-[#1f211c] border border-[#E2E0D5] dark:border-[#2d302a] rounded-2xl p-6 sm:p-8 shadow-xs">
                    
                    @if(session('contact_success'))
                    <div class="mb-4 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-300 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-xs font-semibold flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">check_circle</span>
                        <span>{{ session('contact_success') }}</span>
                    </div>
                    @endif

                    <form id="portfolio-contact-form" action="{{ route('portfolio.contact') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Anti-spam Honeypot (Hidden) -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website_url" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact-name" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] dark:text-white mb-1.5">
                                    {{ __('portfolio.form_name') }}
                                </label>
                                <input type="text" 
                                       id="contact-name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       placeholder="{{ __('portfolio.form_name_placeholder') }}" 
                                       class="w-full px-4 py-3 bg-white dark:bg-[#161715] border border-[#E2E0D5] dark:border-[#32352f] rounded-xl text-[13px] text-[#20211F] dark:text-white placeholder:text-[#52544F]/60 dark:placeholder:text-[#9a9c94]/60 focus:outline-none focus:border-[#735a35] dark:focus:border-[#C6A77B] shadow-2xs transition-all">
                                @error('name')
                                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="contact-email" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] dark:text-white mb-1.5">
                                    {{ __('portfolio.form_email') }}
                                </label>
                                <input type="email" 
                                       id="contact-email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       placeholder="{{ __('portfolio.form_email_placeholder') }}" 
                                       class="w-full px-4 py-3 bg-white dark:bg-[#161715] border border-[#E2E0D5] dark:border-[#32352f] rounded-xl text-[13px] text-[#20211F] dark:text-white placeholder:text-[#52544F]/60 dark:placeholder:text-[#9a9c94]/60 focus:outline-none focus:border-[#735a35] dark:focus:border-[#C6A77B] shadow-2xs transition-all">
                                @error('email')
                                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="contact-subject" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] dark:text-white mb-1.5">
                                {{ __('portfolio.form_subject') }}
                            </label>
                            <input type="text" 
                                   id="contact-subject" 
                                   name="subject" 
                                   value="{{ old('subject') }}" 
                                   placeholder="{{ __('portfolio.form_subject_placeholder') }}" 
                                   class="w-full px-4 py-3 bg-white dark:bg-[#161715] border border-[#E2E0D5] dark:border-[#32352f] rounded-xl text-[13px] text-[#20211F] dark:text-white placeholder:text-[#52544F]/60 dark:placeholder:text-[#9a9c94]/60 focus:outline-none focus:border-[#735a35] dark:focus:border-[#C6A77B] shadow-2xs transition-all">
                        </div>

                        <div>
                            <label for="contact-message" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] dark:text-white mb-1.5">
                                {{ __('portfolio.form_message') }}
                            </label>
                            <textarea id="contact-message" 
                                      name="message" 
                                      rows="4" 
                                      required 
                                      placeholder="{{ __('portfolio.form_message_placeholder') }}" 
                                      class="w-full px-4 py-3 bg-white dark:bg-[#161715] border border-[#E2E0D5] dark:border-[#32352f] rounded-xl text-[13px] text-[#20211F] dark:text-white placeholder:text-[#52544F]/60 dark:placeholder:text-[#9a9c94]/60 focus:outline-none focus:border-[#735a35] dark:focus:border-[#C6A77B] shadow-2xs transition-all resize-none">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2 flex flex-wrap items-center justify-between gap-4">
                            <button type="submit" id="btn-contact-submit" class="group relative inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-[#20211F] dark:bg-[#C6A77B] text-white dark:text-[#161715] rounded-xl text-[13px] font-bold uppercase tracking-wider hover:bg-[#30312c] dark:hover:bg-[#d6b78b] transition-all shadow-md active:scale-95">
                                <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform" id="btn-submit-icon">send</span>
                                <span id="btn-submit-text">{{ __('portfolio.form_submit') }}</span>
                            </button>

                            <div id="form-ajax-feedback" class="hidden text-xs font-semibold"></div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    // AJAX Form Handling with Fallback
    const contactForm = document.getElementById('portfolio-contact-form');
    const feedbackBox = document.getElementById('form-ajax-feedback');
    const submitBtn = document.getElementById('btn-contact-submit');
    const submitIcon = document.getElementById('btn-submit-icon');
    const submitText = document.getElementById('btn-submit-text');

    if (contactForm && feedbackBox) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            submitBtn.disabled = true;
            submitText.textContent = "{{ __('portfolio.form_sending') }}";
            submitIcon.textContent = "hourglass_top";

            const formData = new FormData(contactForm);

            fetch("{{ route('portfolio.contact') }}", {
                method: "POST",
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                feedbackBox.classList.remove('hidden', 'text-red-500');
                feedbackBox.classList.add('text-emerald-600', 'dark:text-emerald-400');
                feedbackBox.textContent = data.message || "{{ __('portfolio.form_success') }}";
                contactForm.reset();
            })
            .catch(err => {
                feedbackBox.classList.remove('hidden', 'text-emerald-600', 'dark:text-emerald-400');
                feedbackBox.classList.add('text-red-500');
                feedbackBox.textContent = "{{ __('portfolio.form_error') }}";
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitText.textContent = "{{ __('portfolio.form_submit') }}";
                submitIcon.textContent = "send";
            });
        });
    }
</script>
@endpush
