<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailListRequest;
use App\Http\Requests\UpdateEmailListRequest;
use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = request()->query('search', '');

        /** @var User $user */
        $user = Auth::user();

        $emailLists = EmailList::select()
            ->where('user_id', $user->id)
            ->when($search, function (Builder $query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->withCount('subscribers')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('email_lists.lists', [
            'emailLists' => $emailLists,
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

        DB::transaction(function () use ($validated, $items) {
            $emailList = EmailList::create([
                'title' => $validated['title']
            ]);

            $emailList->subscribers()->createMany($items);
        });

        return redirect()->route('email_lists.index')->with('success', __('Email list created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $emailList)
    {
        $search = request()->query('search', '');

        $subscribers = $emailList
            ->subscribers()
            ->when($search, function ($query) use ($search) {
                $query
                    ->where('email', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            })
            ->paginate()
            ->appends(['search' => $search]);

        return view('email_lists.show', [
            'emailList' => $emailList,
            'subscribers' => $subscribers,
        ]);
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

    public function deleteSubscriber(EmailList $emailList, Subscriber $subscriber)
    {
        if ($subscriber->email_list_id === $emailList->id) {
            $subscriber->delete();
            return redirect()->back()->with('success', __('Subscriber deleted successfully.'));
        }

        return redirect()->back()->with('error', __('Subscriber does not belong to this email list.'));
    }
}
