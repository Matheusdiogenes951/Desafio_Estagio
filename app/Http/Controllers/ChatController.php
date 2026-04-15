<?php

namespace App\Http\Controllers;

use App\Models\ChatSetting;
use App\Models\Prompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function __construct()
    {
        // Middleware removido para evitar CSRF em requisições API
    }
    public function send(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.openrouter.key');
        $model = config('services.openrouter.model');

        if (! $apiKey) {
            return response()->json([
                'error' => 'Chave OpenRouter não configurada. Adicione OPENROUTER_API_KEY no .env.',
            ], 500);
        }

        $mainPrompt = ChatSetting::first()->main_prompt ?? 
            "Você é um assistente virtual da EEEP Comendador Miguel Gurgel.

            Sua função é ajudar alunos e interessados respondendo dúvidas sobre a escola de forma clara, objetiva e educada.

            Sobre a escola:
            - A EEEP Comendador Miguel Gurgel é uma escola estadual de ensino profissionalizante localizada no Ceará.
            - Ela oferece ensino médio integrado com cursos técnicos.

            Cursos disponíveis:
            - Desenvolvimento de Sistemas (DS): envolve programação, lógica, criação de sites, bancos de dados e tecnologia.
            - Contabilidade: envolve finanças, organização empresarial, impostos e gestão financeira.
            - Multimídia: envolve design, edição de imagens e vídeos, produção digital e criatividade.

            Regras de comportamento:
            - Sempre responda como um assistente da escola.
            - Seja claro e didático, como um professor.
            - Se a pergunta for sobre cursos, explique de forma simples e prática.
            - Se não souber algo, diga que não tem certeza, mas tente ajudar.

            Objetivo:
            Ajudar alunos a entenderem melhor a escola, seus cursos e conteúdos.";


        $activePrompt = Prompt::where('is_active', true)->first();

        $messages = [
            [
                'role' => 'system',
                'content' => $mainPrompt,
            ],
        ];

        if ($activePrompt) {
            $messages[] = [
                'role' => 'user',
                'content' => "Prompt ativo: {$activePrompt->content}",
            ];
        }

        $messages[] = [
            'role' => 'user',
            'content' => $request->message,
        ];

        $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'HTTP-Referer' => config('app.url'), // Optional: Site URL for rankings
                'X-OpenRouter-Title' => config('app.name'), // Optional: Site title for rankings
            ])
            ->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => $model,
                'messages' => $messages,
                'temperature' => 0.75,
                'max_tokens' => 500,
            ]);

        if ($response->failed()) {
            $data = $response->json();
            $error = data_get($data, 'error.message', $response->body());

            return response()->json([
                'error' => "Erro ao gerar resposta: {$error}",
            ], 500);
        }

        $payload = $response->json();
        $content = data_get($payload, 'choices.0.message.content')
            ?? data_get($payload, 'choices.0.text')
            ?? data_get($payload, 'choices.0.delta.content');

        if (! $content) {
            $content = $response->body();
        }

        return response()->json([
            'assistant' => $content,
        ]);
    }
}
