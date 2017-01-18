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

    protected $storageDir = 'app/public/';

    protected $file;

    protected $name;

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }


    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        $photo->name = $photo->fileName();

        return $photo->fill([
            'name' => $photo->name,
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);
    }

    public function fileName()
    {
        $name = sha1(
            time() . $this->file->getClientOriginalName()
        );
        $extension = $this->file->getClientOriginalExtension();

        $this->name = "{$name}.{$extension}";

        return $this->name;
    }

    public function filePath()    {
        return sprintf("%s/%s", $this->baseDir, $this->name);
    }

    public function thumbnailPath()
    {
        return sprintf("%s/tn-%s", $this->baseDir, $this->name);
    }


    public function upload()
    {
        Storage::putFileAs($this->baseDir, $this->file, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    public function makeThumbnail()
    {
        Image::make($this->file)
            ->fit(200)
            ->save(storage_path($this->storageDir . $this->thumbnailPath()));
    }

    public function delete(){
        Storage::delete([
            $this->path,
            $this->thumbnail_path
        ]);
        parent::delete();
    }
}
