<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailListRequest;
use App\Http\Requests\UpdateEmailListRequest;
use App\Models\EmailList;
use Illuminate\Http\UploadedFile;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email_lists.lists', [
            'emailLists' => EmailList::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email_lists.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmailListRequest $request)
    {
        $validated = $request->validated();

        /** @var UploadedFile $file */
        $file = $request->file('file');

        $fileStream = fopen($file->getRealPath(), 'r');

        $i = 0;
        $items = [];

        while(($row = fgetcsv($fileStream)) != false)
        {
            if($i++ == 0) { continue; }

            [
                0 => $email,
                1 => $name,
            ] = $row; // This is just to avoid unused variable warning, you can process the row as needed

            $items[] = [
                'email' => $email,
                'name' => $name,
            ];
        }

        fclose($fileStream);

        $emailList = EmailList::create([
            'title' => $validated['title']
        ]);

        $emailList->subscribers()->createMany($items);

        return redirect()->route('email_lists.index')->with('success', __('Email list created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $emailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailListRequest $request, EmailList $emailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $emailList)
    {
        //
    }
}
