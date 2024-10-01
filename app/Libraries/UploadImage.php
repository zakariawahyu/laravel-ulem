<?php

namespace App\Libraries;

class UploadImage {
    public function upload($caption) {
        $request    = request();
        $file       = request()->file('image');
        $imageName  = $caption.".".$file->getClientOriginalExtension();

        $request->image->move(public_path('images'), $imageName);

        return $imageName;
    }
}
