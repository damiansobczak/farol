<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'imageAlt',
        'show',
        'seoTitle',
        'seoDescription',
        'ogTitle',
        'ogDescription'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'show' => 'boolean',
    ];

    /**
     * Mutator for slug made of title column
     *
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Accessor for storage images
     *
     * @return void
     */
    public function getPhotoAttribute()
    {
        if ($this->image) {
            return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
        }
        return null;
    }

    /**
     * Helper to load single post by it's slug
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
