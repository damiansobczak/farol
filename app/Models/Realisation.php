<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Realisation extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'description',
		'image',
		'video',
		'imageAlt',
		'gallery',
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
	 * Accessor for storage onlyImages
	 *
	 * @return Storage instance
	 */
	public function getPhotoAttribute()
	{
		return Str::startsWith($this->image, 'http') || Str::startsWith($this->image, 'https') ? $this->image : Storage::url($this->image);
	}

	/**
	 * Accessor for storage video
	 *
	 * @return Storage instance
	 */
	public function getMovieAttribute()
	{
		return $this->video ? Storage::url($this->video) : null;
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
