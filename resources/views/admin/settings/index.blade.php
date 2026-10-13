@extends('layouts.admin')

@section('title', 'Pengaturan Website & CV')

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">SISTEM &amp; DOKUMEN</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Pengaturan Website &amp; Berkas CV
            </h1>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-[#E2E0D5] rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
        @csrf

        <!-- General Site Info -->
        <div class="space-y-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                1. INFORMASI &amp; SEO WEBSITE
            </h2>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Judul Situs (Title Tag)</label>
                <input type="text" name="site_title" value="{{ old('site_title', $settings['site_title'] ?? 'Aditya Yazidil Wahyudi — Portfolio') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Meta Deskripsi (SEO)</label>
                <textarea name="meta_description" rows="2" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Target SLA Respon Kontak</label>
                    <input type="text" name="response_sla" value="{{ old('response_sla', $settings['response_sla'] ?? 'Dalam waktu 1x24 jam kerja') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Email Penerima Notifikasi Kontak</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? 'adityayazidilwahyudi@gmail.com') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
                </div>
            </div>
        </div>

        <!-- R&D Progress -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                2. PROGRES RISET &amp; INOVASI MANDIRI
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Persentase Selesai (%)</label>
                    <input type="number" name="research_project_progress" min="0" max="100" value="{{ old('research_project_progress', $settings['research_project_progress'] ?? '65') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Status Sprint</label>
                    <input type="text" name="research_project_sprint" value="{{ old('research_project_sprint', $settings['research_project_sprint'] ?? 'Sprint 4 / 6') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Target Rilis</label>
                    <input type="text" name="research_project_target" value="{{ old('research_project_target', $settings['research_project_target'] ?? 'Target Rilis: Q2 2026') }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>
        </div>

        <!-- CV Upload Management -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                3. BERKAS RESMI CURRICULUM VITAE (CV)
            </h2>

            <div class="flex items-center gap-4 p-4 rounded-xl bg-[#fbfaf1] border border-[#E2E0D5]">
                <span class="material-symbols-outlined text-3xl text-[#735a35]">picture_as_pdf</span>
                <div class="min-w-0 flex-grow">
                    <div class="text-xs font-bold text-[#20211F]">File CV Saat Ini: {{ $profile->cv_filename ?? 'CV_Aditya_Yazidil_Wahyudi.png' }}</div>
                    <div class="text-[11px] text-[#52544F]">Tersedia untuk diunduh langsung oleh recruiter pada tombol publik.</div>
                </div>
                <a href="{{ route('portfolio.cv.download') }}" class="px-3 py-1.5 bg-[#20211F] text-white rounded-lg text-xs font-bold uppercase hover:bg-[#30312c]">
                    Test Unduh
                </a>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Unggah File CV Baru (PDF / PNG)</label>
                <input type="file" name="cv_file" accept=".pdf,image/*" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <p class="text-[10px] text-[#52544F] mt-1">Format disarankan: PDF atau PNG beresolusi tinggi, ukuran maksimal 5 MB.</p>
            </div>
        </div>

        <div class="pt-4 border-t border-[#E2E0D5] flex items-center justify-end gap-3">
            <button type="submit" class="px-6 py-3 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-md active:scale-95 flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">save</span>
                <span>SIMPAN PENGATURAN</span>
            </button>
        </div>
    </form>
</div>
@endsection
