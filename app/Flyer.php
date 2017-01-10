<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable =[
        'street',
        'city',
        'state',
        'country',
        'zip',
        'price',
        'description'
    ];


    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', '$street'))->firstorfail();
    }



    public function getPriceAttribute($price)
    {
        return '$'.number_format($price);
    }


   


    public function urlToPostPhotos()
    {
        return '/' . $this->zip . '/'. $this->street . '/photos';
    }

    /**
    * Add photo to Flyer
    *
    * @param Photo $photo
    */
    public function addPhoto($photo)
    {

        $this->photos()->save($photo);
    }
    
    /**
    * A Flyer Has Many Photos.
    *
    * @return \Elluminate\Database\Eloquent\Relations\HasMany
    */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }




}
