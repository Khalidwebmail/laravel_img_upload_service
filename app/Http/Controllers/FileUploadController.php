<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uploader\FileUpload;
use App\ImageUpload;
use File;

class FileUploadController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $file = new ImageUpload();


        if($request->hasFile('image')){
            $files = $request->file('image');
            //$file_name = \FileUpload::uploadData($files,'upload');
            $file_name = \FileUpload::upload('public', $files, ['open graph']);
            $file->image = $file_name;
            $file->save();

        }
    }
}
