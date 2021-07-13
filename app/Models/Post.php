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
        'gallery'
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
            return Str::startsWith($this->image, 'http') || Str::startsWith($this->image, 'https') ? $this->image : Storage::url($this->image);
        }
        return null;
    }

    /**
	 * Accessor for gallery images
	 *
	 * @return array
	 */
	public function getGalleryPhotosAttribute()
	{
		$gallery = json_decode($this->gallery);
		if ($gallery) {
			foreach ($gallery as $key => $image) {
				$gallery[$key] = Storage::url($image);
			}
		}
		return $gallery ?? null;
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
