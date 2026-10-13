<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator — Aditya Yazidil Wahyudi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Barlow Condensed', sans-serif; }
    </style>
</head>
<body class="bg-[#F1F0E8] text-[#20211F] min-h-screen flex items-center justify-center p-4 antialiased selection:bg-[#20211F] selection:text-white">

    <div class="w-full max-w-md bg-white border border-[#E2E0D5] rounded-2xl shadow-xl p-6 sm:p-8 space-y-6">
        
        <div class="text-center space-y-2">
            <a href="{{ route('portfolio.index') }}" class="font-display text-3xl font-bold tracking-wider uppercase inline-block">
                ADITYA<span class="text-[#735a35]">.</span>
            </a>
            <h1 class="text-xs font-bold uppercase tracking-widest text-[#52544F]">
                PORTAL ADMINISTRATOR
            </h1>
            <p class="text-xs text-[#52544F]/80">
                Silakan masuk untuk mengelola portofolio, proyek, dan data profil.
            </p>
        </div>

        @if($errors->any())
        <div class="p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-xl font-medium">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] mb-1.5">
                    ALAMAT EMAIL
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', 'admin@aditya.dev') }}" 
                       required 
                       autofocus
                       class="w-full px-4 py-3 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs text-[#20211F] focus:outline-none focus:border-[#735a35] focus:ring-1 focus:ring-[#735a35]">
            </div>

            <div>
                <label for="password" class="block text-[11px] font-bold uppercase tracking-wider text-[#20211F] mb-1.5">
                    KATA SANDI
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required 
                       value="password123"
                       class="w-full px-4 py-3 bg-[#fbfaf1] border border-[#E2E0D5] rounded-xl text-xs text-[#20211F] focus:outline-none focus:border-[#735a35] focus:ring-1 focus:ring-[#735a35]">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 cursor-pointer text-[#52544F]">
                    <input type="checkbox" name="remember" class="rounded border-[#E2E0D5] text-[#20211F] focus:ring-0">
                    <span>Ingat sesi saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 bg-[#20211F] text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#30312c] transition-all shadow-md active:scale-95 flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[16px]">lock_open</span>
                <span>MASUK KE DASHBOARD</span>
            </button>
        </form>

        <div class="pt-4 border-t border-[#E2E0D5] text-center space-y-2">
            <div class="text-[11px] text-[#52544F]">
                Kredensial Default: <span class="font-mono font-semibold">admin@aditya.dev</span> / <span class="font-mono font-semibold">password123</span>
            </div>
            <div>
                <a href="{{ route('portfolio.index') }}" class="text-xs text-[#735a35] hover:underline font-semibold">
                    ← Kembali ke Halaman Portofolio
                </a>
            </div>
        </div>

    </div>

</body>
</html>
