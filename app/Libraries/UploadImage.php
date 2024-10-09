<?php

namespace App\Libraries;

class UploadImage {
    public function upload($caption, $field = null) {
        $file       = '';
        $request    = request();
        $fieldName  = isset($field) ? $field : 'image';
        $file       = $request->file($fieldName);
        $imageName  = $caption.".".$file->getClientOriginalExtension();

        $path = $request->file($field)->storeAs(
            'images', $imageName
        );

        return $path;
    }
}
