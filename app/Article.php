<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends Model implements HasMedia, Viewable
{
    use SoftDeletes;
    use InteractsWithViews;
    use Sluggable;
    use HasMediaTrait;

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        return $query->where('published_at', '<', Carbon::now()->toDateTimeString());
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

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @param \Cocur\Slugify\Slugify $engine
     * @param string $attribute
     * @return \Cocur\Slugify\Slugify
     */
    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        $engine->activateRuleSet('bulgarian');

        return $engine;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('thumbs')
            // ->useFallbackUrl('/images/no-image.svg')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(640)
            ->height(480);

    }

    public function getPageViewsAttribute()
    {
        return $this->getPageViews();
    }


    public function publishNow()
    {
        return $this->published_at = Carbon::today()->toDateString();
    }

    public function publish(Carbon $dateTime) {
        return $this->published_at = $dateTime->toDateTimeString();
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
