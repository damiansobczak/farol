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
		'title',
		'description',
		'show',
		'avaibility',
		'gallery'
	];
	/**
	 * Accessor for product image
	 *
	 * @return Storage instance
	 */
	public function getImgAttribute()
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
	/**
	 * Get collections for product
	 *
	 * @return array
	 */
	public function collections()
	{
		return $this->belongsToMany(Collection::class);
	}
}
