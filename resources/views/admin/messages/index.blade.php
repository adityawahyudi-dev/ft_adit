@extends('layouts.admin')

@section('title', 'Pesan Masuk (Inbox)')

@section('admin_content')
<div class="space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">KOMUNIKASI &amp; PERTANYAAN</div>
            <h1 class="font-display text-2xl sm:text-3xl font-bold uppercase text-[#20211F]">
                Pesan Masuk Recruiter &amp; Pengunjung
            </h1>
        </div>
    </div>

    <div class="bg-white border border-[#E2E0D5] rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#f5f4ec] border-b border-[#E2E0D5] text-[10px] uppercase font-bold text-[#52544F]">
                    <tr>
                        <th class="p-4">Status</th>
                        <th class="p-4">Pengirim</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Subjek &amp; Pesan</th>
                        <th class="p-4">Waktu</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E0D5]">
                    @forelse($messages as $msg)
                    <tr class="hover:bg-gray-50/80 transition-colors {{ !$msg->is_read ? 'bg-amber-50/30 font-semibold' : '' }}">
                        <td class="p-4">
                            @if(!$msg->is_read)
                            <span class="inline-block w-2.5 h-2.5 rounded-full bg-amber-500" title="Belum dibaca"></span>
                            @else
                            <span class="inline-block w-2.5 h-2.5 rounded-full bg-gray-300" title="Sudah dibaca"></span>
                            @endif
                        </td>
                        <td class="p-4 whitespace-nowrap text-[#20211F]">
                            {{ $msg->name }}
                        </td>
                        <td class="p-4 font-mono text-[#735a35]">
                            <a href="mailto:{{ $msg->email }}" class="hover:underline">{{ $msg->email }}</a>
                        </td>
                        <td class="p-4 max-w-sm">
                            <div class="text-[#20211F] truncate">{{ $msg->subject ?? 'Tanpa Subjek' }}</div>
                            <div class="text-[11px] text-[#52544F] line-clamp-1 font-normal">{{ $msg->message }}</div>
                        </td>
                        <td class="p-4 whitespace-nowrap text-[#52544F] text-[11px]">
                            {{ $msg->created_at->diffForHumans() }}
                        </td>
                        <td class="p-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="p-1.5 hover:text-[#735a35] text-gray-600 rounded-lg hover:bg-gray-100" title="Buka Detail">
                                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                                </a>
                                <form action="{{ route('admin.messages.toggle-read', $msg->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-1.5 hover:text-blue-600 text-gray-600 rounded-lg hover:bg-gray-100" title="Tandai Sudah/Belum Baca">
                                        <span class="material-symbols-outlined text-[16px]">{{ $msg->is_read ? 'mark_email_unread' : 'mark_email_read' }}</span>
                                    </button>
                                </form>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
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
                            Kotak masuk pesan masih kosong.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
        <div class="p-4 border-t border-[#E2E0D5]">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
