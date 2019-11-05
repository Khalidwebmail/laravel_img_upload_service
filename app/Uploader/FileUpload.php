<?php

namespace App\Uploader;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileUpload
{

    protected $filename;
    protected $file_obj;
    protected $disk;
    protected $path;
    protected $quality = 60;

    /**
     * upload function
     *
     * @param string $disk
     * @param object $file_obj
     * @param array $parameters
     * @return string
     */
    public function upload($disk, $file_obj, $parameters = [])
    {
        $this->file_obj = $file_obj;

        $this->disk = $disk;

        $this->filename = Str::random(25).'.'.$this->file_obj->getClientOriginalExtension();
        Storage::disk($this->disk)->put($this->filename, File::get($this->file_obj));

        if(count($parameters) > 0) {
            $this->path = Config::get('filesystems.disks.'.$this->disk.'.root');
            foreach($parameters as $parameter) {
                $function = ucwords($parameter);
                $this->{"crop".str_replace(' ','',$function)}();
            }
        }

        return $this->filename;
    }

    public function cropOpenGraph()
    {
        Image::make($this->file_obj)->fit(1200, 630)->save($this->path . '/1200x630-' . $this->filename);
    }

    public function cropDetails()
    {
        Image::make($this->file_obj)->fit(940, 493)->save($this->path . '/940x493-' . $this->filename, $this->quality);
    }

    public function cropThumbnail()
    {
        Image::make($this->file_obj)->fit(220, 220)->save($this->path . '/220x220-' . $this->filename, $this->quality);
    }

    public function cropSmallThumbnail()
    {
        Image::make($this->file_obj)->fit(40, 40)->save($this->path . '/40x40-' . $this->filename, $this->quality);
    }
}
