<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\MetaRequest;
use App\Libraries\UploadImage;
use App\Models\Configuration;
use Illuminate\Support\Str;

class ConfigurationController extends Controller
{
    public function meta() {
        $meta = Configuration::where('type', 'meta')->first();
        
        return view('backend.pages.configuration.meta', compact('meta'));
    }

    public function saveMeta(MetaRequest $request) {
        $data = $request->validated();
        $imageName = '';
        $iconName = '';

        $caption = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $imageName = (new UploadImage)->upload('image-'.$caption);
        }

        if ($request->hasFile('icon')) {
            $iconName = (new UploadImage)->upload('icon-'.$caption, 'icon');
        }
        
        $datas = [
            'type' => 'meta',
            'title' => $data['title'],
            'description' => $data['description'],
            'custom_data->keywords' => $data['keywords'],
            'custom_data->author' => $data['author'],
        ];

        $meta = Configuration::where('type', 'meta')->first();

        if (empty($meta)) {
            $merge = [
                'image' => $imageName,
                'custom_data->icon' => $iconName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $meta['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;
            $icon = !empty($iconName) ? $iconName : $config->custom_data['icon'];

            $merge = [
                'image' => $image,
                'custom_data->icon' => $icon
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.meta')->with('success', 'Successfuly configured meta');
    }

    public function cover() {
        $cover = Configuration::where('type', 'cover')->first();
        
        return view('backend.pages.configuration.cover', compact('cover'));
    }

    public function saveCover(CoverRequest $request) {
        $data = $request->validated();
        $imageName = '';

        $caption = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $imageName = (new UploadImage)->upload('cover-'.$caption);
        }
        
        $datas = [
            'type' => 'cover',
            'title' => $data['title'],
            'description' => $data['description'],
        ];

        $cover = Configuration::where('type', 'cover')->first();

        if (empty($cover)) {
            $merge = [
                'image' => $imageName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $cover['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;

            $merge = [
                'image' => $image,
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.cover')->with('success', 'Successfuly configured cover');
    }

    public function event() {
        $event = Configuration::where('type', 'event')->first();
        
        return view('backend.pages.configuration.event', compact('event'));
    }

    public function saveEvent(EventRequest $request) {
        $data = $request->validated();
        $imageName = '';

        $caption = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $imageName = (new UploadImage)->upload('event-'.$caption);
        }
        
        $datas = [
            'type' => 'event',
            'title' => $data['title'],
            'description' => $data['description'],
            'custom_data->date' => $data['date']
        ];

        $event = Configuration::where('type', 'event')->first();

        if (empty($event)) {
            $merge = [
                'image' => $imageName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $event['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;

            $merge = [
                'image' => $image,
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.event')->with('success', 'Successfuly configured event');
    }
}
