<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    public function create(EmailList $emailList)
    {
        $crumbs = [
            ['label' => __('Email lists'), 'url' => route('email_lists.index')],
            ['label' => $emailList->title, 'url' => route('email_lists.show', $emailList)],
            ['label' => __('Create subscriber')]
        ];

        return view('subscribers.create', [
            'emailList' => $emailList,
            'crumbs' => $crumbs,
        ]);
    }

    public function store(Request $request, EmailList $emailList)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => [
                'required','email','max:255',
                Rule::unique('subscribers')->where('email_list_id', $emailList->id)
            ],
        ]);

        Subscriber::create([
            'email_list_id' => $emailList->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('email_lists.show', $emailList)->with('success', __('Subscriber added successfully.'));
    }
}
