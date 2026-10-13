@extends('layouts.admin')

@section('title', 'Edit Proyek — ' . $project->title_id)

@section('admin_content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">PROJECT MANAGEMENT</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Edit Proyek: {{ $project->title_id }}
            </h1>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs text-[#52544F] hover:text-[#20211F] font-bold">
            ← Kembali ke Daftar Proyek
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-white border border-[#E2E0D5] rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
        @csrf
        @method('PUT')

        <!-- Metadata Proyek -->
        <div class="space-y-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                1. METADATA &amp; STATUS
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Kategori *</label>
                    <select name="category" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                        <option value="fullstack" {{ $project->category === 'fullstack' ? 'selected' : '' }}>Full-Stack Application</option>
                        <option value="backend" {{ $project->category === 'backend' ? 'selected' : '' }}>Backend &amp; API Service</option>
                        <option value="designsystem" {{ $project->category === 'designsystem' ? 'selected' : '' }}>Design System / Frontend</option>
                        <option value="research" {{ $project->category === 'research' ? 'selected' : '' }}>R&amp;D / Eksplorasi</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Status Publikasi *</label>
                    <select name="status" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                        <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>Published (Tampil Publik)</option>
                        <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                        <option value="archived" {{ $project->status === 'archived' ? 'selected' : '' }}>Archived (Diarsipkan)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Urutan Tampil (Sort)</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Label Kategori (ID) *</label>
                    <input type="text" name="category_label_id" value="{{ old('category_label_id', $project->category_label_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Label Kategori (EN) *</label>
                    <input type="text" name="category_label_en" value="{{ old('category_label_en', $project->category_label_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Badge Status (ID) *</label>
                    <input type="text" name="status_label_id" value="{{ old('status_label_id', $project->status_label_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Badge Status (EN) *</label>
                    <input type="text" name="status_label_en" value="{{ old('status_label_en', $project->status_label_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>
        </div>

        <!-- Bilingual Titles & Slug -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                2. JUDUL &amp; SLUG URL
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Judul Proyek (ID) *</label>
                    <input type="text" name="title_id" value="{{ old('title_id', $project->title_id) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Judul Proyek (EN) *</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $project->title_en) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Slug URL *</label>
                <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Ringkasan Summary (ID) *</label>
                    <textarea name="summary_id" rows="2" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('summary_id', $project->summary_id) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Ringkasan Summary (EN) *</label>
                    <textarea name="summary_en" rows="2" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('summary_en', $project->summary_en) }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Deskripsi Lengkap (ID) *</label>
                    <textarea name="description_id" rows="4" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('description_id', $project->description_id) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Deskripsi Lengkap (EN) *</label>
                    <textarea name="description_en" rows="4" required class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('description_en', $project->description_en) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Problem & Solution -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                3. TANTANGAN &amp; SOLUSI ARSITEKTUR
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Tantangan / Problem (ID)</label>
                    <textarea name="problem_id" rows="2" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('problem_id', $project->problem_id) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Solusi / Solution (ID)</label>
                    <textarea name="solution_id" rows="2" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ old('solution_id', $project->solution_id) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Tech stack & Media -->
        <div class="space-y-4 pt-2">
            <h2 class="text-xs font-bold uppercase tracking-wider text-[#735a35] border-b border-[#E2E0D5] pb-2">
                4. TEKNOLOGI, TAUTAN &amp; MOCKUP
            </h2>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Teknologi Digunakan (Pisahkan koma)</label>
                <input type="text" name="technologies_raw" value="{{ is_array($project->technologies) ? implode(', ', $project->technologies) : '' }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Fitur Utama (Satu per baris baru)</label>
                <textarea name="key_features_raw" rows="3" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">{{ is_array($project->key_features) ? implode("\n", $project->key_features) : '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">URL Demo / Live</label>
                    <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">URL Repositori GitHub</label>
                    <input type="url" name="repository_url" value="{{ old('repository_url', $project->repository_url) }}" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs font-mono">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase text-[#20211F] mb-1">Ganti Mockup Gambar (Opsional)</label>
                @if($project->mockup_url)
                <div class="mb-2 w-32 h-20 rounded-lg overflow-hidden border border-[#E2E0D5]">
                    <img src="{{ asset($project->mockup_url) }}" alt="" class="w-full h-full object-cover">
                </div>
                @endif
                <input type="file" name="mockup" accept="image/*" class="w-full px-3 py-2 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs">
            </div>
        </div>

        <div class="pt-4 border-t border-[#E2E0D5] flex items-center justify-end gap-3">
            <button type="submit" class="px-6 py-3 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-md active:scale-95 flex items-center gap-2">
                <span class="material-symbols-outlined text-[16px]">save</span>
                <span>SIMPAN PERUBAHAN PROYEK</span>
            </button>
        </div>
    </form>
</div>
@endsection
