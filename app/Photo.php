<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $baseDir = 'flyer/photo';



    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    public static function named($name){

        return (new static)->saveAs($name);

    }

    public function saveAs($name){

        $this->name = sprintf("%s-%s", time(), $name);

        $this->path = sprintf("%s/%s",$this->baseDir, $this->name);

        $this->thumbnail_path = sprintf("%s/tn-%s",$this->baseDir, $this->name);

        return $this;
    }


    public function move(UploadedFile $file){

        Storage::putFileAs($this->baseDir , $file , $this->name);

        $this->makeThumbnail($file);

        return $this;

    }

    public function makeThumbnail(UploadedFile $file){

        Image::make($file)
            ->fit(200)
            ->save(storage_path('app/public/'.$this->thumbnail_path));

    }


}
