<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatSetting;
use App\Models\Prompt;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    public function index()
    {
        $settings = ChatSetting::first();
        $prompts = Prompt::orderByDesc('is_active')->orderBy('id')->get();

        return view('admin.prompts.index', compact('settings', 'prompts'));
    }

    public function store(Request $request)
    {
        if (Prompt::count() >= 4) {
            return back()->with('error', 'Já existem 4 prompts cadastrados. Delete um antes de criar outro.');
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:80'],
            'content' => ['required', 'string', 'max:4000'],
        ]);

        Prompt::create($data);

        return redirect()->route('admin.prompts.index')->with('success', 'Prompt cadastrado com sucesso.');
    }

    public function edit(Prompt $prompt)
    {
        return view('admin.prompts.edit', compact('prompt'));
    }

    public function update(Request $request, Prompt $prompt)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:80'],
            'content' => ['required', 'string', 'max:4000'],
        ]);

        $prompt->update($data);

        return redirect()->route('admin.prompts.index')->with('success', 'Prompt atualizado com sucesso.');
    }

    public function destroy(Prompt $prompt)
    {
        $prompt->delete();

        return redirect()->route('admin.prompts.index')->with('success', 'Prompt removido com sucesso.');
    }

    public function activate(Prompt $prompt)
    {
        Prompt::query()->update(['is_active' => false]);
        $prompt->update(['is_active' => true]);

        return redirect()->route('admin.prompts.index')->with('success', 'Prompt ativo definido com sucesso.');
    }

    public function updateMainPrompt(Request $request)
    {
        $data = $request->validate([
            'main_prompt' => ['nullable', 'string', 'max:4000'],
        ]);

        ChatSetting::firstOrCreate([])->update($data);

        return redirect()->route('admin.prompts.index')->with('success', 'Prompt principal atualizado com sucesso.');
    }
}
