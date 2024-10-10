<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\GiftRequest;
use App\Http\Requests\MetaRequest;
use App\Http\Requests\RsvpRequest;
use App\Http\Requests\StoryRequest;
use App\Http\Requests\ThanksRequest;
use App\Http\Requests\VenueRequest;
use App\Http\Requests\WishesRequest;
use App\Libraries\UploadImage;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class ConfigurationController extends Controller
{
    public function index() {
        $configs = config('custom.configuration');
        $configData = Configuration::all();

        $configData = collect($configData)->map(function($config) {
            return [$config->type => $config->is_active];
        })->collapse()->toArray();

        return view('backend.pages.configuration.index', compact('configs', 'configData'));
    }

    public function publish(Request $request) {
        $field = $request->field;
        $is_active = $request->checked;

        $config = Configuration::where('type', $field)->first();
        if (empty($config)) {
            return response()->json("Error configuration's empty", 404);
        } else {
            $config->update(['is_active' => filter_var($is_active, FILTER_VALIDATE_BOOLEAN)]);
            Redis::set(config('custom.key_config').$field, json_encode(collect($config)->except(['id', 'created_at', 'updated_at'])));
        }
        $published = $is_active == "true" ? 'publish' : 'unplublish';
        return response()->json('Success '.$published.' configuration');
    }

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
            $imageName = (new UploadImage)->upload('meta-image-'.$caption);
        }

        if ($request->hasFile('icon')) {
            $iconName = (new UploadImage)->upload('meta-icon-'.$caption, 'icon');
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

        return redirect()->route('configuration.meta')->with('success', 'Successfully configured meta');
    }

    public function cover() {
        $cover = Configuration::where('type', 'cover')->first();
        
        return view('backend.pages.configuration.cover', compact('cover'));
    }

    public function saveCover(CoverRequest $request) {
        $data = $request->validated();
    
        $datas = [
            'type' => 'cover',
            'title' => $data['title'],
            'description' => $data['description'],
            'custom_data->subtitle' => $data['subtitle'],
        ];

        $cover = Configuration::where('type', 'cover')->first();

        if (empty($cover)) {
            Configuration::create($datas);
        } else {
            $config = Configuration::where('id', $cover['id'])->first();

            $config->update($datas);
        }

        return redirect()->route('configuration.cover')->with('success', 'Successfully configured cover');
    }

    public function event() {
        $event = Configuration::where('type', 'event')->first();
        
        return view('backend.pages.configuration.event', compact('event'));
    }

    public function saveEvent(EventRequest $request) {
        $data = $request->validated();
        $imageName = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }
        
        $datas = [
            'type' => 'event',
            'title' => $data['title'],
            'description' => $data['description'],
            'image_caption' => $data['image_caption'],
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

        return redirect()->route('configuration.event')->with('success', 'Successfully configured event');
    }

    public function story() {
        $story = Configuration::where('type', 'story')->first();
        
        return view('backend.pages.configuration.story', compact('story'));
    }

    public function saveStory(StoryRequest $request) {
        $data = $request->validated();
        $imageName = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }
        
        $datas = [
            'type' => 'story',
            'title' => $data['title'],
            'description' => $data['description'],
            'image_caption' => $data['image_caption'],
        ];

        $story = Configuration::where('type', 'story')->first();

        if (empty($story)) {
            $merge = [
                'image' => $imageName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $story['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;

            $merge = [
                'image' => $image,
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.story')->with('success', 'Successfully configured story');
    }

    public function venue() {
        $venue = Configuration::where('type', 'venue')->first();
        
        return view('backend.pages.configuration.venue', compact('venue'));
    }

    public function saveVenue(VenueRequest $request) {
        $data = $request->validated();
        $data['type'] = 'venue';
        
        $venue = Configuration::where('type', 'venue')->first();

        if (empty($venue)) { 
            Configuration::create($data);
        } else {
            $config = Configuration::where('id', $venue['id'])->first();
        
            $config->update($data);
        }

        return redirect()->route('configuration.venue')->with('success', 'Successfully configured venue');
    }

    public function gift() {
        $gift = Configuration::where('type', 'gift')->first();
        
        return view('backend.pages.configuration.gift', compact('gift'));
    }

    public function saveGift(GiftRequest $request) {
        $data = $request->validated();
        $data['type'] = 'gift';
        
        $gift = Configuration::where('type', 'gift')->first();

        if (empty($gift)) { 
            Configuration::create($data);
        } else {
            $config = Configuration::where('id', $gift['id'])->first();
        
            $config->update($data);
        }

        return redirect()->route('configuration.gift')->with('success', 'Successfully configured gift');
    }

    public function wishes() {
        $wishes = Configuration::where('type', 'wishes')->first();
        
        return view('backend.pages.configuration.wishes', compact('wishes'));
    }

    public function saveWishes(WishesRequest $request) {
        $data = $request->validated();
        $data['type'] = 'wishes';
        
        $wishes = Configuration::where('type', 'wishes')->first();

        if (empty($wishes)) { 
            Configuration::create($data);
        } else {
            $config = Configuration::where('id', $wishes['id'])->first();
        
            $config->update($data);
        }

        return redirect()->route('configuration.wishes')->with('success', 'Successfully configured wishes');
    }

    public function rsvp() {
        $rsvp = Configuration::where('type', 'rsvp')->first();
        
        return view('backend.pages.configuration.rsvp', compact('rsvp'));
    }

    public function saveRsvp(RsvpRequest $request) {
        $data = $request->validated();
        $imageName = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }
        
        $datas = [
            'type' => 'rsvp',
            'title' => $data['title'],
            'description' => $data['description'],
            'image_caption' => $data['image_caption'],
        ];

        $rsvp = Configuration::where('type', 'rsvp')->first();

        if (empty($rsvp)) {
            $merge = [
                'image' => $imageName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $rsvp['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;

            $merge = [
                'image' => $image,
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.rsvp')->with('success', 'Successfully configured rsvp');
    }

    public function thanks() {
        $thanks = Configuration::where('type', 'thanks')->first();
        
        return view('backend.pages.configuration.thanks', compact('thanks'));
    }

    public function saveThanks(ThanksRequest $request) {
        $data = $request->validated();
        $imageName = '';

        if ($request->hasFile('image')) {
            $caption = Str::slug($data['image_caption']);
            $imageName = (new UploadImage)->upload($caption);
        }
        
        $datas = [
            'type' => 'thanks',
            'title' => $data['title'],
            'description' => $data['description'],
            'image_caption' => $data['image_caption'],
        ];

        $thanks = Configuration::where('type', 'thanks')->first();

        if (empty($thanks)) {
            $merge = [
                'image' => $imageName
            ];
            
            Configuration::create(array_merge($datas, $merge));
        } else {
            $config = Configuration::where('id', $thanks['id'])->first();
            $image = !empty($imageName) ? $imageName : $config->image;

            $merge = [
                'image' => $image,
            ];

            $config->update(array_merge($datas, $merge));
        }

        return redirect()->route('configuration.thanks')->with('success', 'Successfully configured thanks');
    }
}
