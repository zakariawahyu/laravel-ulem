<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request) {
        $event = self::getRedis(config('custom.key_config').'event');
        $venue = self::getRedis(config('custom.key_config').'venue');
        $rsvp = self::getRedis(config('custom.key_config').'rsvp');
        $wishes = self::getRedis(config('custom.key_config').'wishes');
        $thanks = self::getRedis(config('custom.key_config').'thanks');
        $couples = self::getRedis(config('custom.key_couples'));
        $venueDetails = self::getRedis(config('custom.key_venue_details'));
        $galleries = self::getRedis(config('custom.key_galleries'));

        return view('frontend.home', compact(
            'event',
            'venue',
            'rsvp',
            'wishes',
            'thanks',
            'couples',
            'venueDetails',
            'galleries'
        ));
    }

    private function getRedis($key) {
        return json_decode(Redis::get($key));
    }
}
