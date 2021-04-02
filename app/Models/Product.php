<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
	use HasFactory;
	protected $fillable = [
		'slug',
		'name',
		'imageAlt',
		'image',
		'categoryId',
		'featured',
		'description',
		'show',
		'avaibility',
		'gallery',
		'seoTitle',
		'seoDescription',
		'ogTitle',
		'ogDesc'
	];
	/**
	 * Accessor for gallery images
	 *
	 * @return Storage instance
	 */
	public function getImgAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
	}

	/**
	 * Accessor for gallery images
	 *
	 * @return array
	 */
	public function getGalleryImgAttribute()
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
	 * Mutator for slug made of name column
	 *
	 * @return void
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = $value;
		if (static::whereSlug($slug = Str::slug($value))->exists()) {
			$slug = $this->incrementSlug($slug);
		}
		$this->attributes['slug'] = $slug;
	}
	/**
	 * Function avoiding duplicates slug
	 *
	 * @return string
	 */
	public function incrementSlug($slug)
	{
		$original = $slug;
		$count = 2;
		while (static::whereSlug($slug)->exists()) {
			$slug = "{$original}-" . $count++;
		}
		return $slug;
	}
	/**
	 * Get product category
	 */
	public function category()
	{
		return $this->belongsTo(Category::class, 'categoryId');
	}
}
