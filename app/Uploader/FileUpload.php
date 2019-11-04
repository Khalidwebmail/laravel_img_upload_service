<?php

namespace App\Uploader;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class FileUpload
{

    protected $filename;
    protected $file_obj;
    protected $disk;

    // public function uploadData($upload_file,$folder)
    // {
    //     $name =Str::random(25);
    //     $extension = $upload_file->getClientOriginalExtension();
    //     Storage::disk('public')->putFileAs($folder, $upload_file, $name.'.'.$extension);
    //     return $name.'.'.$extension;
    // }

    public function upload($disk, $file_obj, $parameters = [])
    {
        $this->file_obj = $file_obj;
        //dd($file_obj);
        $this->disk = $disk;
        //dd($disk);
        $this->filename = Str::random(25).'.'.$this->file_obj->getClientOriginalExtension();
       Storage::disk($this->disk)->put($this->filename, File::get($this->file_obj));

        if(count($parameters = []) > 0) {
            //dd($parameters);
            foreach($parameters as $parameter) {
                $function = ucwords($parameter);
                $this->crop{str_replace(' ','',$function)}();
            }
        }

        return $this->filename;
    }

    public function cropOpenGraph()
    {
        $path = Config::get('filesystems.disks.'.$this->disk.'.root');
        Image::make($this->file_obj)->resize(1200, 630)->save($path . '/1200x630-' . $this->filename);
    }
}
