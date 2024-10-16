<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoupleRequest;
use App\Libraries\UploadImage;
use App\Models\Couple;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class CoupleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.couple.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coupleTypes = config('custom.couple_type');

        return view('backend.pages.couple.create', compact('coupleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoupleRequest $request)
    {
        $data       = $request->validated();
        $imageName  = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }

        $data['image'] = $imageName;

        Couple::create($data);

        return redirect()->route('couple.index')->with('success', 'Successfully created couple');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $couple = Couple::whereNull('deleted_at')->find($id);
        if (!$couple) {
            abort(404);
        }
        $coupleTypes    = config('custom.couple_type');

        return view('backend.pages.couple.show', compact('couple','coupleTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $couple         = Couple::whereNull('deleted_at')->find($id);
        if (!$couple) {
            abort(404);
        }
        $coupleTypes    = config('custom.couple_type');

        return view('backend.pages.couple.edit', compact('couple', 'coupleTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoupleRequest $request, Couple $couple)
    {
        $data       = $request->validated();
        
        $imageName  = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);

            $data['image'] = $imageName;
        }

        $couple->update($data);
        
        return redirect()->route('couple.index')->with('success', 'Successfully updated couple');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Couple::where('id', $id)->delete();

        return redirect()->route('couple.index')->with('success', 'Successfully deleted couple');
    }

    /**
     * Publish data couple to redis
     */
    public function publish() {
        $couples    = Couple::all();
        $data       = $couples->map(function ($item) {
           return collect($item)->except(['id', 'created_at', 'updated_at', 'deleted_at']); 
        });
        
        Redis::set(config('custom.key_couples'), json_encode($data));

        return redirect()->route('couple.index')->with('success', 'Successfully publish couples');
    }
}
