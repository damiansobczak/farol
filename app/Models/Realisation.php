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
		'seoTitle',
		'seoDescription',
		'ogTitle',
		'ogDescription'
	];

	/**
	 * Accessor for storage onlyImages
	 *
	 * @return Storage instance
	 */
	public function getPhotoAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
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
}
