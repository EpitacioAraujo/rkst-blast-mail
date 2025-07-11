<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $crumbs = [
            ['label' => __('Templates')],
        ];

        $search = request()->input('search', '');

        $templates =Template::query()
            ->when($search, function ($query) use ($search) {
                $query
                    ->where('id', 'like', "{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->appends(compact('search'));

        return view('templates.index', [
            'templates' => $templates,
            'crumbs' => $crumbs,
        ]);
    }

    public function create()
    {
        return view('templates.register', [
            'crumbs' => [
                ['label' => __('Templates'), 'url' => route('templates.index')],
                ['label' => __('Create template')],
            ],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
        ]);

        /** @var User user */
        $user = Auth::user();

        Template::create([
            'user_id' => $user->id,
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return redirect()->route('templates.index')->with('success', __('Template created successfully.'));
    }

    public function edit(Template $template)
    {
        $crumbs = [
            ['label' => __('Templates'), 'url' => route('templates.index')],
            ['label' => __('Edit template')],
        ];

        return view('templates.register', [
            'template' => $template,
            'crumbs' => $crumbs,
        ]);
    }

    public function update(Request $request, Template $template)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
        ]);

        $template->update([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return redirect()->route('templates.index')->with('success', __('Template updated successfully.'));
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('templates.index')->with('success', __('Template deleted successfully.'));
    }
}
