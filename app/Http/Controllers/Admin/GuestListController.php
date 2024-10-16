<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestListRequest;
use App\Models\GuestList;
use Illuminate\Support\Facades\Redis;

class GuestListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.guest-list.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.guest-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuestListRequest $request)
    {
        $data = $request->validated();

        $data['is_gift'] = filter_var($data['is_gift'], FILTER_VALIDATE_BOOLEAN);

        GuestList::create($data);

        return redirect()->route('guest-list.index')->with('success', 'Successfully created guest');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guestList = GuestList::whereNull('deleted_at')->find($id);
        if (!$guestList) {
            abort(404);
        }

        return view('backend.pages.guest-list.show', compact('guestList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guestList = GuestList::whereNull('deleted_at')->find($id);
        if (!$guestList) {
            abort(404);
        }

        return view('backend.pages.guest-list.edit', compact('guestList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuestListRequest $request, GuestList $guestList)
    {
        $data = $request->validated();
        
        $guestList->update($data);

        return redirect()->route('guest-list.index')->with('success', 'Successfully updated guest');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GuestList::where('id', $id)->delete();

        return redirect()->route('guest-list.index')->with('success', 'Successfully deleted guest');
    }

    /**
     * Publish data guest list to redis
    */
    public function publish() {
        $guestList   = GuestList::whereNull('deleted_at')->get();
        $data        = $guestList->map(function($item){
            return [
                $item->slug => json_encode([
                    'name'      => $item->name,
                    'is_gift'   => $item->is_gift
                ])
            ];
        })->collapse()->toArray();

        Redis::hmset(config('custom.key_guest_list'), $data);

        return redirect()->route('guest-list.index')->with('success', 'Successfully publish guests');
    }
}
