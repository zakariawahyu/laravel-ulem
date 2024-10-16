<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    protected $configRedis;

    public function __construct()
    {
        $this->configRedis = Redis::hGetAll(config('custom.key_config'));
    }

    public function index(Request $request, $name = null) {
        $meta           = self::getHashRedis('meta');
        $cover          = self::getHashRedis('cover');
        $event          = self::getHashRedis('event');
        $story          = self::getHashRedis('story');
        $venue          = self::getHashRedis('venue');
        $rsvp           = self::getHashRedis('rsvp');
        $wishes         = self::getHashRedis('wishes');
        $thanks         = self::getHashRedis('thanks');
        $couples        = self::getRedis(config('custom.key_couples'));
        $venueDetails   = self::getRedis(config('custom.key_venue_details'));
        $galleries      = self::getRedis(config('custom.key_galleries'));
        $guest          = json_decode(Redis::hGet(config('custom.key_guest_list'), $name));

        return view('frontend.home', compact(
            'meta',
            'cover',
            'event',
            'story',
            'venue',
            'rsvp',
            'wishes',
            'thanks',
            'couples',
            'venueDetails',
            'galleries',
            'guest',
        ));
    }

    private function getRedis($key) {
        return json_decode(Redis::get($key));
    }

    private function getHashRedis($type) {
        return isset($this->configRedis[$type]) ? json_decode($this->configRedis[$type]) : '';
    }
}
