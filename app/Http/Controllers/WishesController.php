<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishesRequest;
use Illuminate\Support\Facades\Redis;
use App\Models\Wishes;

class WishesController extends Controller
{
    public function store(WishesRequest $request)
    {
        $data       = $request->validated();
        $response   = Wishes::create($data);

        $wishes = Wishes::all();
        $redisData = $wishes->map(function ($item) {
            return collect($item)->except(['id', 'updated_at', 'deleted_at']);
        });

        Redis::set(config('custom.key_wishes'), json_encode($redisData));

        if ($response) {
            return response()->json($data, 200);
        }
    }

    public function show()
    {
        $wishes = json_decode(Redis::get(config('custom.key_wishes')));

        return view('frontend.partials.wishes-data', compact('wishes'));
    }
}
