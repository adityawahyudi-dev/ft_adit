@extends('layouts.admin')

@section('title', 'Kelola Keahlian & Sertifikasi')

@section('admin_content')
<div class="space-y-10">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">SKILLS &amp; LICENSES</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Manajemen Keahlian &amp; Sertifikasi
            </h1>
        </div>
    </div>

    <!-- PART 1: 4 PILLARS & SKILLS -->
    <div class="bg-white border border-[#E2E0D5] rounded-2xl p-6 shadow-xs space-y-6">
        <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-3">
            <h2 class="font-display text-xl uppercase font-bold text-[#20211F]">
                1. Daftar Pilar Keahlian Teknis
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($skills as $skill)
            <div class="p-4 rounded-xl border border-[#E2E0D5] bg-[#fbfaf1] flex items-start justify-between gap-3">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold uppercase text-[#735a35] bg-[#f5f4ec] px-2 py-0.5 rounded border border-[#E2E0D5]">
                            {{ $skill->badge_id }}
                        </span>
                        <span class="font-bold text-xs text-[#20211F]">{{ $skill->name }}</span>
                    </div>
                    <div class="font-display text-base font-bold uppercase text-[#20211F]">{{ $skill->title_id }}</div>
                    <p class="text-[11px] text-[#52544F]">{{ $skill->description_id }}</p>
                    @if($skill->technologies)
                    <div class="flex flex-wrap gap-1 pt-1">
                        @foreach($skill->technologies as $tech)
                        <span class="text-[10px] bg-white border border-[#E2E0D5] px-2 py-0.5 rounded font-mono">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
                <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Hapus keahlian ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-1 text-gray-400 hover:text-red-600 rounded">
                        <span class="material-symbols-outlined text-[16px]">delete</span>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Add Skill Form -->
        <div class="pt-4 border-t border-[#E2E0D5]">
            <h3 class="text-xs font-bold uppercase text-[#20211F] mb-3">Tambah Pilar Keahlian Baru</h3>
            <form action="{{ route('admin.skills.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                @csrf
                <input type="text" name="name" required placeholder="Nama (e.g. Python &amp; Data)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="category" required value="programming" placeholder="Kategori" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="icon" value="code" placeholder="Material Icon (e.g. code)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="badge_id" required placeholder="Badge ID (e.g. LOGIKA)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="badge_en" required placeholder="Badge EN (e.g. LOGIC)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="title_id" required placeholder="Judul ID (e.g. DATA PIPELINE)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="title_en" required placeholder="Judul EN" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="description_id" required placeholder="Deskripsi ID" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs sm:col-span-2">
                <input type="text" name="description_en" required placeholder="Deskripsi EN" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs sm:col-span-2">
                <div class="flex items-center">
                    <button type="submit" class="w-full py-2 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase hover:bg-[#30312c]">
                        + Tambah Skill
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- PART 2: CERTIFICATIONS -->
    <div class="bg-white border border-[#E2E0D5] rounded-2xl p-6 shadow-xs space-y-6">
        <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-3">
            <h2 class="font-display text-xl uppercase font-bold text-[#20211F]">
                2. Daftar Sertifikasi Terakreditasi (Dicoding)
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($certifications as $cert)
            <div class="p-4 rounded-xl border border-[#E2E0D5] bg-[#fbfaf1] flex items-start justify-between gap-3">
                <div class="space-y-1 min-w-0">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold text-[#735a35] uppercase font-mono">ID: {{ $cert->credential_id }}</span>
                        <span class="text-[10px] text-gray-500">• {{ $cert->valid_until }}</span>
                    </div>
                    <div class="font-display text-base font-bold uppercase text-[#20211F] truncate">{{ $cert->title_id }}</div>
                    <p class="text-[11px] text-[#52544F] line-clamp-2">{{ $cert->description_id }}</p>
                    <div class="pt-1">
                        <a href="{{ $cert->credential_url }}" target="_blank" class="text-[11px] text-[#735a35] font-bold hover:underline flex items-center gap-1">
                            <span>Verifikasi Dicoding</span>
                            <span class="material-symbols-outlined text-[13px]">north_east</span>
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.certs.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Hapus sertifikat ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-1 text-gray-400 hover:text-red-600 rounded">
                        <span class="material-symbols-outlined text-[16px]">delete</span>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Add Cert Form -->
        <div class="pt-4 border-t border-[#E2E0D5]">
            <h3 class="text-xs font-bold uppercase text-[#20211F] mb-3">Tambah Sertifikat Baru</h3>
            <form action="{{ route('admin.certs.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                @csrf
                <input type="text" name="title_id" required placeholder="Judul Sertifikat (ID)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="title_en" required placeholder="Judul Sertifikat (EN)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="credential_id" required placeholder="ID Kredensial (e.g. 6RPNOK804X2M)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
                <input type="text" name="issuer" required value="Dicoding Indonesia" placeholder="Penerbit" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="track_id" required value="WEB DEVELOPMENT TRACK" placeholder="Track ID" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="track_en" required value="WEB DEVELOPMENT TRACK" placeholder="Track EN" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="issue_date_id" required placeholder="Tgl Lulus (e.g. 18 Agustus 2026)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="issue_date_en" required placeholder="Date EN (e.g. August 18, 2026)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="text" name="valid_until" required value="2029" placeholder="Berlaku s/d" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <input type="url" name="credential_url" placeholder="https://dicoding.com/certificates/..." class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs sm:col-span-2">
                <input type="file" name="image" accept="image/*" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                <textarea name="description_id" required rows="2" placeholder="Deskripsi kurikulum (ID)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs sm:col-span-3"></textarea>
                <textarea name="description_en" required rows="2" placeholder="Curriculum Description (EN)" class="px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs sm:col-span-3"></textarea>
                <div>
                    <button type="submit" class="py-2.5 px-6 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase hover:bg-[#30312c]">
                        + Tambah Sertifikat
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
