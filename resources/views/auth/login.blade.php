@extends('layouts.app')

@section('title', 'Login | EEEP Comendador Miguel Gurgel')
@section('hide_chrome', 'true')
@section('body_class', 'bg-[#edf0f1] text-[#191c1d] selection:bg-[#8df8b7] selection:text-[#002110]')
@section('main_class', 'flex min-h-screen items-center justify-center px-6 py-12')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="w-full max-w-md" style="font-family: 'Inter', sans-serif;">
        <div class="mb-10 flex flex-col items-center text-center">
            <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full border border-[#bdcabe]/20 bg-white shadow-sm">
                <span class="material-symbols-outlined text-4xl text-[#006b3f]">account_balance</span>
            </div>
            <h1 class="mb-1 text-lg font-bold uppercase tracking-tight text-[#006b3f]" style="font-family: 'Space Grotesk', sans-serif;">EEEP Comendador Miguel Gurgel</h1>
            <p class="text-sm tracking-[0.2em] text-[#3e4a41]">PORTAL ADMINISTRATIVO</p>
        </div>

        <div class="rounded-xl bg-[#fdfefe] p-8 shadow-[0_24px_60px_rgba(25,28,29,0.12)] ring-1 ring-[#191c1d]/5 md:p-10">
            <div class="mb-8">
                <h2 class="mb-2 text-2xl font-bold text-[#191c1d]" style="font-family: 'Space Grotesk', sans-serif;">Bem Vindo!</h2>
                <p class="text-sm text-[#3e4a41]">Insira suas credenciais para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.18em] text-[#3e4a41]" for="email">Usuario</label>
                    <div class="relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Enter your username"
                            class="w-full border-0 border-b border-[#6e7a70]/40 bg-transparent px-0 py-3 text-[#191c1d] placeholder:text-[#e1e3e4] focus:border-b focus:border-[#006b3f] focus:ring-0"
                        />
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-[#ba1a1a]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <div class="mb-2 flex items-center justify-between gap-3">
                        <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#3e4a41]" for="password">Senha</label>
                        <span class="text-xs font-medium text-[#006b3f]">Acesso interno</span>
                    </div>
                    <div class="relative">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full border-0 border-b border-[#6e7a70]/40 bg-transparent px-0 py-3 text-[#191c1d] placeholder:text-[#e1e3e4] focus:border-b focus:border-[#006b3f] focus:ring-0"
                        />
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-[#ba1a1a]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        class="w-full rounded-lg bg-[#a04100] px-6 py-4 text-sm font-semibold text-white shadow-md shadow-[#a04100]/20 transition-all duration-200 hover:opacity-90 active:scale-[0.98]"
                        style="font-family: 'Space Grotesk', sans-serif;"
                        type="submit"
                    >
                        Login
                    </button>

                    <a
                        href="{{ url('/') }}"
                        class="mt-3 block w-full rounded-lg border border-[#bdcabe] bg-transparent px-6 py-4 text-center text-sm font-semibold text-[#3e4a41] transition-all duration-200 hover:bg-white/70"
                        style="font-family: 'Space Grotesk', sans-serif;"
                    >
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('after_main')
    <footer class="mt-auto w-full border-t border-emerald-900/10 py-8">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-8 md:flex-row">
            <div class="text-xs font-medium uppercase tracking-[0.18em] text-slate-500">
                © 2026 EEEP Comendador Miguel Gurgel.
            </div>
        </div>
    </footer>
@endsection
