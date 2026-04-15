@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl rounded-3xl border border-gray-200 bg-white/95 p-8 shadow-sm dark:border-[#3E3E3A] dark:bg-[#141414]">
        <h1 class="mb-4 text-3xl font-semibold">Editar prompt</h1>
        <p class="mb-6 text-sm text-[#706f6c] dark:text-[#A1A09A]">Ajuste o título e o conteúdo do prompt definido para o chatbot.</p>

        <form method="POST" action="{{ route('admin.prompts.update', $prompt) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Título do prompt</label>
                <input id="title" name="title" value="{{ old('title', $prompt->title) }}" required class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-3 text-sm shadow-sm outline-none transition focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#3E3E3A] dark:bg-[#121212] dark:text-[#EDEDEC]" />
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="mb-2 block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Conteúdo do prompt</label>
                <textarea id="content" name="content" rows="8" required class="w-full rounded-3xl border border-gray-300 bg-white px-4 py-4 text-sm shadow-sm outline-none transition focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#3E3E3A] dark:bg-[#121212] dark:text-[#EDEDEC]">{{ old('content', $prompt->content) }}</textarea>
                @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-3xl bg-[#1b1b18] px-5 py-3 text-sm font-semibold text-white hover:bg-[#0f0f0f]">Atualizar prompt</button>
                <a href="{{ route('admin.prompts.index') }}" class="rounded-3xl border border-gray-300 px-5 py-3 text-sm hover:bg-gray-100 dark:border-[#3E3E3A] dark:hover:bg-[#1f1f1f]">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
