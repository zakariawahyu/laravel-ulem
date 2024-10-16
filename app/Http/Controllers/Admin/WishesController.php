<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.wish-list.index');
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
    public function show(string $id)
    {
        $wishList = Wishes::whereNull('deleted_at')->find($id);
        if (!$wishList) {
            abort(404);
        }

        return view('backend.pages.wish-list.show', compact('wishList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wishes::where('id', $id)->whereNull('deleted_at')->delete();

        return redirect()->route('wish-list.index')->with('success', 'Successfully deleted wishes');
    }

     /**
     * Publish data wishes details to redis
    */
    public function publish() {
        $wishList   = Wishes::whereNull('deleted_at')->get();
        $data       = $wishList->map(function($item){
            return collect($item)->only('name', 'wish_description', 'created_at');
        })->toArray();

        Redis::set(config('custom.key_wishes'), json_encode($data));

        return redirect()->route('wish-list.index')->with('success', 'Successfully publish wishes');
    }
}
