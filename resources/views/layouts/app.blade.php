<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', $title ?? config('app.name', 'Laravel'))</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('head')
    </head>
    <body class="@yield('body_class', 'min-h-screen bg-[#FDFDFC] text-[#1b1b18] dark:bg-[#0a0a0a] dark:text-[#EDEDEC]')">
        @unless (View::hasSection('hide_chrome'))
            <header class="border-b border-gray-200 bg-white/95 px-6 py-4 backdrop-blur dark:border-[#3E3E3A] dark:bg-[#121212]">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-3">
                    <a href="{{ url('/') }}" class="text-lg font-semibold">{{ config('app.name', 'Escola AI') }}</a>

                    <nav class="flex flex-wrap items-center gap-3 text-sm">
                        <a href="{{ url('/') }}" class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-[#1f1f1f]">Página inicial</a>
                        @auth
                            <a href="{{ route('admin.prompts.index') }}" class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-[#1f1f1f]">Admin</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-[#1f1f1f]">Sair</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-[#1f1f1f]">Entrar</a>
                        @endauth
                    </nav>
                </div>
            </header>
        @endunless

        <main class="@yield('main_class', 'mx-auto max-w-6xl px-6 py-10')">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-900">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-900">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        @yield('after_main')
    </body>
</html>
