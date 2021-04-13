<?php

namespace App;

use App\Events\ProfileCreating;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Sluggable;

    protected $dispatchesEvents = [
        'creating' => ProfileCreating::class,
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'user.username'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
