@extends('layouts.admin')

@section('title', 'Detail Pesan — ' . $message->name)

@section('admin_content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between border-b border-[#E2E0D5] pb-4">
        <div>
            <div class="text-[10px] font-bold text-[#735a35] uppercase tracking-wider">DETAIL PESAN</div>
            <h1 class="font-display text-2xl font-bold uppercase text-[#20211F]">
                {{ $message->subject ?? 'Pesan Tanpa Subjek' }}
            </h1>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-xs text-[#52544F] hover:text-[#20211F] font-bold">
            ← Kembali ke Inbox
        </a>
    </div>

    <div class="bg-white border border-[#E2E0D5] rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#E2E0D5] text-xs">
            <div>
                <div class="text-[10px] font-bold uppercase text-[#52544F]">PENGIRIM</div>
                <div class="font-bold text-sm text-[#20211F] mt-0.5">{{ $message->name }}</div>
                <div class="font-mono text-[#735a35]">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject ?? 'Portofolio Aditya') }}" class="hover:underline">
                        {{ $message->email }}
                    </a>
                </div>
            </div>
            <div class="sm:text-right">
                <div class="text-[10px] font-bold uppercase text-[#52544F]">WAKTU DITERIMA</div>
                <div class="text-[#20211F] mt-0.5">{{ $message->created_at->format('d M Y, H:i') }} WIB</div>
                <div class="text-[10px] text-gray-400 font-mono">IP: {{ $message->ip_address ?? '127.0.0.1' }}</div>
            </div>
        </div>

        <div class="space-y-2">
            <div class="text-[10px] font-bold uppercase text-[#52544F]">ISI PESAN</div>
            <div class="p-4 rounded-xl bg-[#fbfaf1] border border-[#E2E0D5] text-sm text-[#20211F] whitespace-pre-wrap leading-relaxed">
                {{ $message->message }}
            </div>
        </div>

        <div class="pt-4 border-t border-[#E2E0D5] flex items-center justify-between gap-4">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject ?? 'Diskusi Peluang Kerja') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all">
                <span class="material-symbols-outlined text-[16px]">reply</span>
                <span>Balas Lewat Email</span>
            </a>

            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-xl text-xs font-bold uppercase transition-all">
                    <span class="material-symbols-outlined text-[16px]">delete</span>
                    <span>Hapus Pesan</span>
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
