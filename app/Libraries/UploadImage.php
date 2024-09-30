<?php

namespace App\Libraries;

class UploadImage {
    public function upload() {
        $request    = request();
        $file       = request()->file('image');
        $imageName  = $file->hashName();

        $request->image->move(public_path('images'), $imageName);

        return $imageName;
    }
}
