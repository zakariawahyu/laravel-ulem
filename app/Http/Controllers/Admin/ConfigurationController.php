<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
