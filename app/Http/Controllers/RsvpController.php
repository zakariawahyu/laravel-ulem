<?php

namespace App\Http\Controllers;

use App\Http\Requests\RsvpRequest;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function store(RsvpRequest $request)
    {
        $data       = $request->validated();
        $response   = Rsvp::create($data);

        if ($response) {
            return response()->json($data, 200);
        }
    }
}
