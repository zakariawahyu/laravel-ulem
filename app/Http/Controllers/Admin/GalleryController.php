<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Libraries\UploadImage;
use App\Models\Gallery;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data       = $request->validated();
        $imageName  = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }

        $data['image'] = $imageName;

        Gallery::create($data);

        return redirect()->route('gallery.index')->with('success', 'Successfully created gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::whereNull('deleted_at')->find($id);
        if (!$gallery) {
            abort(404);
        }

        return view('backend.pages.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::whereNull('deleted_at')->find($id);
        if (!$gallery) {
            abort(404);
        }

        return view('backend.pages.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $data       = $request->validated();
        
        $imageName  = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);

            $data['image'] = $imageName;
        }

        $gallery->update($data);
        
        return redirect()->route('gallery.index')->with('success', 'Successfully updated gallery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gallery::where('id', $id)->delete();

        return redirect()->route('gallery.index')->with('success', 'Successfully deleted gallery');
    }

    /**
     * Publish data gallery to redis
     */
    public function publish() {
        $galleries = Gallery::all();
        Redis::set(config('custom.key_galleries'), json_encode($galleries));

        return redirect()->route('gallery.index')->with('success', 'Successfully publish galleries');
    }
}
