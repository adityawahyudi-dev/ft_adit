@extends('layouts.admin')

@section('title', 'Kelola Profil & Identitas')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">PENGELOLAAN PROFIL</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Edit Profil Aditya Yazidil Wahyudi
            </h1>
        </div>
        <a href="{{ route('portfolio.index') }}" target="_blank" class="text-xs text-[#735a35] hover:underline flex items-center gap-1 font-bold">
            <span>Lihat Tampilan Publik</span>
            <span class="material-symbols-outlined text-[14px]">open_in_new</span>
        </a>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-[#E2E0D5] rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
        @csrf

        <!-- Identity Basics -->
        <div class="space-y-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                1. IDENTITAS DASAR
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Nama Lengkap *</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Gelar / Pendidikan *</label>
                    <input type="text" name="education_title" value="{{ old('education_title', $profile->education_title) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">IPK Terverifikasi *</label>
                    <input type="text" name="gpa" value="{{ old('gpa', $profile->gpa) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Lokasi Domisili *</label>
                    <input type="text" name="location" value="{{ old('location', $profile->location) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Zona Waktu *</label>
                    <input type="text" name="timezone" value="{{ old('timezone', $profile->timezone) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>
        </div>

        <!-- Bilingual Headline & Bio -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                2. HEADLINE &amp; BIOGRAFI DUA BAHASA (ID / EN)
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Headline Utama (ID) *</label>
                    <input type="text" name="headline_id" value="{{ old('headline_id', $profile->headline_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Headline Utama (EN) *</label>
                    <input type="text" name="headline_en" value="{{ old('headline_en', $profile->headline_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Aksen Subheadline (ID) *</label>
                    <input type="text" name="subheadline_id" value="{{ old('subheadline_id', $profile->subheadline_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Aksen Subheadline (EN) *</label>
                    <input type="text" name="subheadline_en" value="{{ old('subheadline_en', $profile->subheadline_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Bio Singkat Hero (ID) *</label>
                    <textarea name="bio_id" rows="3" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('bio_id', $profile->bio_id) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Bio Singkat Hero (EN) *</label>
                    <textarea name="bio_en" rows="3" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('bio_en', $profile->bio_en) }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Narasi Lengkap About (ID)</label>
                    <textarea name="about_id" rows="4" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('about_id', $profile->about_id) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Narasi Lengkap About (EN)</label>
                    <textarea name="about_en" rows="4" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('about_en', $profile->about_en) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Status Kesiapan Kerja -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                3. STATUS KETERSEDIAAN KERJA
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Badge Status (ID) *</label>
                    <input type="text" name="status_badge_id" value="{{ old('status_badge_id', $profile->status_badge_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Badge Status (EN) *</label>
                    <input type="text" name="status_badge_en" value="{{ old('status_badge_en', $profile->status_badge_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Keterangan Status (ID)</label>
                    <input type="text" name="status_description_id" value="{{ old('status_description_id', $profile->status_description_id) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Keterangan Status (EN)</label>
                    <input type="text" name="status_description_en" value="{{ old('status_description_en', $profile->status_description_en) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>
        </div>

        <!-- Social & Contact Links -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                4. KONTAK &amp; TAUTAN SOSIAL
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Email Resmi *</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Nomor WhatsApp / HP</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">URL Profil GitHub</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">URL Profil LinkedIn</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-[#E2E0D5] flex items-center justify-end gap-3">
            <button type="submit" class="px-6 py-3 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-md active:scale-95 flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">save</span>
                <span>SIMPAN PERUBAHAN PROFIL</span>
            </button>
        </div>
    </form>
</div>
@endsection
