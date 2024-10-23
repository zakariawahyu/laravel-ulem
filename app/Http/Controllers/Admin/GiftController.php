<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use Illuminate\Support\Facades\Redis;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.gift.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = config('custom.banks');

        return view('backend.pages.gift.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GiftRequest $request)
    {
        $data = $request->validated();

        Gift::create($data);

        return redirect()->route('gift.index')->with('success', 'Successfully created gift');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gift = Gift::whereNull('deleted_at')->find($id);
        if (!$gift) {
            abort(404);
        }
        $banks = config('custom.banks');

        return view('backend.pages.gift.show', compact('gift', 'banks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gift = Gift::whereNull('deleted_at')->find($id);
        if (!$gift) {
            abort(404);
        }
        $banks = config('custom.banks');

        return view('backend.pages.gift.edit', compact('gift', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GiftRequest $request, Gift $gift)
    {
        $data = $request->validated();
        
        $gift->update($data);

        return redirect()->route('gift.index')->with('success', 'Successfully updated gift');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gift::where('id', $id)->delete();

        return redirect()->route('gift.index')->with('success', 'Successfully deleted gift');
    }

    /**
     * Publish data gift to redis
    */
    public function publish()
    {
        $gifts  = Gift::whereNull('deleted_at')->get();
        $data   = $gifts->map(function ($item) {
            $banks = config('custom.banks');
            $item['bank'] = $banks[$item->bank];
            return collect($item)->except(['id', 'created_at', 'updated_at', 'deleted_at']); 
        });
        
        Redis::set(config('custom.key_gift'), json_encode($data));

        return redirect()->route('gift.index')->with('success', 'Successfully publish gifts');
    }
}
