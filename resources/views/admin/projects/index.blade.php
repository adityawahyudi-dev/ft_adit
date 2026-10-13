@extends('layouts.admin')

@section('title', 'Kelola Proyek')

@section('admin_content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">PROJECT MANAGEMENT</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Daftar Proyek &amp; Artefak Kode
            </h1>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-xs">
            <span class="material-symbols-outlined text-[16px]">add</span>
            <span>Tambah Proyek Baru</span>
        </a>
    </div>

    <!-- Status Filters -->
    <div class="flex flex-wrap items-center gap-2">
        <a href="{{ route('admin.projects.index', ['status' => 'all']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold uppercase {{ $status === 'all' ? 'bg-[#20211F] text-white' : 'bg-white text-[#52544F] border border-[#E2E0D5]' }}">
            Semua ({{ \App\Models\Project::count() }})
        </a>
        <a href="{{ route('admin.projects.index', ['status' => 'published']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold uppercase {{ $status === 'published' ? 'bg-[#20211F] text-white' : 'bg-white text-[#52544F] border border-[#E2E0D5]' }}">
            Published ({{ \App\Models\Project::where('status', 'published')->count() }})
        </a>
        <a href="{{ route('admin.projects.index', ['status' => 'draft']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold uppercase {{ $status === 'draft' ? 'bg-[#20211F] text-white' : 'bg-white text-[#52544F] border border-[#E2E0D5]' }}">
            Draft ({{ \App\Models\Project::where('status', 'draft')->count() }})
        </a>
    </div>

    <!-- Projects Table -->
    <div class="bg-white border border-[#E2E0D5] rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#f5f4ec] border-b border-[#E2E0D5] text-[10px] uppercase font-bold text-[#52544F]">
                    <tr>
                        <th class="p-4">Mockup</th>
                        <th class="p-4">Judul &amp; Slug</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Urutan</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E0D5]">
                    @forelse($projects as $proj)
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="p-4 w-20">
                            <div class="w-16 h-11 rounded-lg overflow-hidden border border-[#E2E0D5] bg-gray-100">
                                @if($proj->mockup_url)
                                <img src="{{ asset($proj->mockup_url) }}" alt="" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <span class="material-symbols-outlined text-sm">image</span>
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 max-w-xs">
                            <div class="font-bold text-[#20211F] text-xs line-clamp-1">{{ $proj->title_id }}</div>
                            <div class="text-[10px] text-[#52544F] font-mono mt-0.5">{{ $proj->slug }}</div>
                        </td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded bg-[#f5f4ec] font-mono text-[10px] font-semibold text-[#735a35]">
                                {{ $proj->category }}
                            </span>
                        </td>
                        <td class="p-4">
                            <form action="{{ route('admin.projects.toggle-status', $proj->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase transition-all {{ $proj->status === 'published' ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-amber-100 text-amber-800 hover:bg-amber-200' }}" title="Klik untuk beralih status">
                                    {{ $proj->status }}
                                </button>
                            </form>
                        </td>
                        <td class="p-4 font-mono font-bold text-[#52544F]">
                            {{ $proj->sort_order }}
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('portfolio.project.detail', $proj->slug) }}" target="_blank" class="p-1.5 hover:text-[#735a35] text-gray-600 rounded-lg hover:bg-gray-100" title="Preview Publik">
                                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                                </a>
                                <a href="{{ route('admin.projects.edit', $proj->id) }}" class="p-1.5 hover:text-blue-600 text-gray-600 rounded-lg hover:bg-gray-100" title="Edit">
                                    <span class="material-symbols-outlined text-[16px]">edit</span>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $proj->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 hover:text-red-600 text-gray-600 rounded-lg hover:bg-gray-100" title="Hapus">
                                        <span class="material-symbols-outlined text-[16px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            Belum ada proyek yang terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($projects->hasPages())
        <div class="p-4 border-t border-[#E2E0D5]">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
