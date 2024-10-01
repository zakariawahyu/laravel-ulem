<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VenueDetailRequest;
use App\Models\VenueDetail;
use Illuminate\Http\Request;

class VenueDetailController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.venue-detail.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.venue-detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueDetailRequest $request)
    {
        $data = $request->validated();
       
        VenueDetail::create($data);

        return redirect()->route('venue-detail.index')->with('succes', 'Successfuly created venue detail');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venueDetail = VenueDetail::whereNull('deleted_at')->find($id);
        if (!$venueDetail) {
            abort(404);
        }

        return view('backend.pages.venue-detail.show', compact('venueDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venueDetail = VenueDetail::whereNull('deleted_at')->find($id);
        if (!$venueDetail) {
            abort(404);
        }

        return view('backend.pages.venue-detail.edit', compact('venueDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueDetailRequest $request, VenueDetail $venueDetail)
    {
        $data = $request->validated();
        
        $venueDetail->update($data);
        
        return redirect()->route('venue-detail.index')->with('succes', 'Successfuly updated venue detail');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VenueDetail::where('id', $id)->delete();

        return redirect()->route('venue-detail.index')->with('succes', 'Successfuly deleted venue detail');
    }
}
