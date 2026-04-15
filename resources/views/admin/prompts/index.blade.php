@extends('layouts.app')

@section('content')
    <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
        <section class="rounded-3xl border border-gray-200 bg-white/95 p-8 shadow-sm dark:border-[#3E3E3A] dark:bg-[#141414]">
            <h1 class="mb-4 text-3xl font-semibold">Painel de prompts</h1>
            <p class="mb-6 text-sm text-[#706f6c] dark:text-[#A1A09A]">Liste, crie, edite e ative prompts para o chatbot. O prompt principal do chatbot é um campo separado.</p>

            <div class="mb-8 rounded-3xl border border-dashed border-gray-300 bg-gray-50 p-6 dark:border-[#3E3E3A] dark:bg-[#101010]">
                <h2 class="mb-3 text-xl font-semibold">Prompt principal do chatbot</h2>
                <form method="POST" action="{{ route('admin.prompts.main.update') }}" class="space-y-4">
                    @csrf

                    <textarea name="main_prompt" rows="6" class="w-full rounded-3xl border border-gray-300 bg-white px-4 py-4 text-sm outline-none shadow-sm transition focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#3E3E3A] dark:bg-[#121212] dark:text-[#EDEDEC]">{{ old('main_prompt', $settings->main_prompt ?? 'Você é um assistente virtual da EEEP Comendador Miguel Gurgel. Sua função é ajudar alunos, pais e interessados respondendo dúvidas sobre a escola de forma clara, objetiva e educada. Telefone da secretaria : (85) 3101-2071 Sobre a escola: - A EEEP Comendador Miguel Gurgel é uma escola estadual de ensino profissionalizante localizada na Rua José Baíma - Messejana, Fortaleza - CE. - Ela oferece ensino médio integrado com cursos técnicos, preparando os alunos tanto para o mercado de trabalho quanto para o ensino superior. Cursos disponíveis: - Desenvolvimento de Sistemas (DS): envolve programação, lógica, criação de sites, bancos de dados e tecnologia. - Contabilidade: envolve finanças, organização empresarial, impostos e gestão financeira. - Multimídia: envolve design, edição de imagens e vídeos, produção digital e criatividade. - Redes de Computadores: envolve configuração de redes, manutenção de computadores, segurança da informação, servidores e infraestrutura de internet. Regras de comportamento: - Sempre responda como um assistente oficial da escola. - Seja claro, didático e objetivo, como um professor explicando para iniciantes. -Use apenas texto simples, sem formatação especial como negrito, asteriscos, símbolos ou markdown. - Quando falar dos cursos, dê exemplos práticos do que o aluno aprende. Objetivo: Ajudar pais e futuros alunos a entenderem melhor a escola, seus cursos e oportunidades, incentivando o interesse pelos estudos e pela formação profissional. - Sempre que possível, incentive o aluno a estudar e aproveitar as oportunidades da escola.') }}</textarea>

                    <button type="submit" class="rounded-3xl bg-[#1b1b18] px-5 py-3 text-sm font-semibold text-white hover:bg-[#0f0f0f]">Salvar prompt principal</button>
                </form>
            </div>

            <div class="mb-6 rounded-3xl border border-gray-200 bg-gray-50 p-6 dark:border-[#3E3E3A] dark:bg-[#101010]">
                <h2 class="mb-3 text-xl font-semibold">Adicionar novo prompt</h2>
                <form method="POST" action="{{ route('admin.prompts.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Título</label>
                        <input name="title" type="text" value="{{ old('title') }}" class="w-full rounded-3xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none shadow-sm focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#3E3E3A] dark:bg-[#121212] dark:text-[#EDEDEC]" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Conteúdo</label>
                        <textarea name="content" rows="4" class="w-full rounded-3xl border border-gray-300 bg-white px-4 py-3 text-sm outline-none shadow-sm focus:border-[#f53003] focus:ring-2 focus:ring-[#f53003]/20 dark:border-[#3E3E3A] dark:bg-[#121212] dark:text-[#EDEDEC]" required>{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="rounded-3xl bg-[#1b1b18] px-5 py-3 text-sm font-semibold text-white hover:bg-[#0f0f0f]">Salvar prompt</button>
                </form>
            </div>

            @if ($prompts->isEmpty())
                <div class="rounded-3xl border border-gray-200 bg-white p-6 text-sm text-[#706f6c] dark:border-[#3E3E3A] dark:bg-[#101010]">Ainda não há prompts cadastrados.</div>
            @else
                <div class="space-y-4">
                    @foreach ($prompts as $prompt)
                        <article class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-[#3E3E3A] dark:bg-[#141414]">
                            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                                <div>
                                    <div class="flex items-center gap-2 text-sm text-[#706f6c] dark:text-[#A1A09A]"><span class="rounded-full bg-[#e9e5ff] px-3 py-1 text-[11px] font-semibold uppercase text-[#4c3dff] dark:bg-[#2a2473] dark:text-[#d7d0ff]">{{ $prompt->is_active ? 'Ativo' : 'Inativo' }}</span></div>
                                    <h3 class="mt-3 text-xl font-semibold">{{ $prompt->title }}</h3>
                                    <p class="mt-2 text-sm leading-7 text-[#4f4f4a] dark:text-[#d7d0ff]">{{ $prompt->content }}</p>
                                </div>

                                <div class="flex flex-wrap items-center gap-2">
                                    @unless ($prompt->is_active)
                                        <form method="POST" action="{{ route('admin.prompts.activate', $prompt) }}">
                                            @csrf
                                            <button type="submit" class="rounded-full border border-[#f53003] px-4 py-2 text-sm font-semibold text-[#f53003] hover:bg-[#f53003]/10">Ativar</button>
                                        </form>
                                    @endunless
                                    <a href="{{ route('admin.prompts.edit', $prompt) }}" class="rounded-full border border-gray-300 px-4 py-2 text-sm hover:bg-gray-100 dark:border-[#3E3E3A] dark:hover:bg-[#1f1f1f]">Editar</a>
                                    <form method="POST" action="{{ route('admin.prompts.destroy', $prompt) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full border border-red-200 px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:border-[#4d1f1f] dark:hover:bg-[#2e1212]">Deletar</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        <section class="rounded-3xl border border-gray-200 bg-white/95 p-8 shadow-sm dark:border-[#3E3E3A] dark:bg-[#141414]">
            <h2 class="mb-4 text-2xl font-semibold">Resumo</h2>
            <ul class="space-y-3 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Total de prompts:</strong> {{ $prompts->count() }}</li>
                <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Prompt ativo:</strong> {{ optional($prompts->firstWhere('is_active', true))->title ?? 'Nenhum prompt ativo' }}</li>
                <li><strong class="text-[#1b1b18] dark:text-[#EDEDEC]">Prompt principal configurado:</strong> {{ filled($settings->main_prompt ?? null) ? 'Sim' : 'Não' }}</li>
            </ul>
        </section>
    </div>
@endsection
