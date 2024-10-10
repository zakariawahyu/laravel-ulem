<?php

namespace App\Libraries;

use Carbon\Carbon;

class UploadImage {
    public function upload($caption, $field = null) {
        $fieldName  = isset($field) ? $field : 'image';
        $file       = request()->file($fieldName);
        $imageName  = $caption."-".strtotime(Carbon::now()).".".$file->getClientOriginalExtension();

        $path = $file->storeAs(
            'images', $imageName, 'public'
        );

        return $path;
    }
}
