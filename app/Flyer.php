<?php

namespace App;

use Illuminate\Support\Facades\Gate;
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



    public function urlToFlyer()
    {
        return '/' . $this->zip . '/'. str_replace(' ', '-', $this->street);
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
        if (Gate::denies('addPhoto', $this)) {
            abort(403, 'Unauthorized');
        }
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

    /**
    * A Flyer is owned by a User
    *
    * @return \Elluminate\Database\Eloquent\Relations\BelongsTo
    */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }


    /**
    * Determine if a given user created the flyer
    *
    * @param User $user
    * @return boolean
    */
    public function ownerBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
