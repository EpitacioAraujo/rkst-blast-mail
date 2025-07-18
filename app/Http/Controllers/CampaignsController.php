<?php

namespace App\Http\Controllers;

use App\Models\Campaigns;
use Illuminate\Http\Request;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $crumbs = [
            ['label' => __('Campaigns')],
        ];

        $search = request()->input('search', '');
        $with_trashed = request()->input('with_trashed', false);

        $campaigns = Campaigns::query()
            ->when($with_trashed, function ($query) {
                $query->withTrashed();
            })
            ->when($search, function ($query) use ($search) {
                $query
                    ->where('id', 'like', "{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->appends(compact('search', 'with_trashed'));

        return view('campaigns.index', [
            'campaigns' => $campaigns,
            'crumbs' => $crumbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaigns $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaigns $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaigns $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaigns $campaign)
    {
        //
    }

    public function restore(Campaigns $campaign)
    {
        $campaign->restore();

        return redirect()->route('campaigns.index')
            ->with('success', __('Campaign restored successfully.'));
    }
}
