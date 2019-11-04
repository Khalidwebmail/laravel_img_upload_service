<?php

namespace App\Uploader;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;

class FileUpload
{
    public function uploadData($upload_file,$folder)
    {
        $name =Str::random(25);
        $extension = $upload_file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($folder, $upload_file, $name.'.'.$extension);
        return $name.'.'.$extension;
    }
}
