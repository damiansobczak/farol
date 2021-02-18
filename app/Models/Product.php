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
		'attributeTypes',
		'priceList',
		'startingPrice',
		'minWidth',
		'maxWidth',
		'minHeight',
		'maxHeight',
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
		if($gallery) {
			foreach($gallery as $key => $image) {
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
		if(static::whereSlug($slug = Str::slug($value))->exists()) {
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
		while(static::whereSlug($slug)->exists()) {
			$slug = "{$original}-" . $count++;
		}
		return $slug;
	}
	/**
	 * Get product category
	 */
	public function productCategory()
	{
		return $this->belongsTo(Category::class, 'categoryId');
	}
	/**
	 * Accessor for types attribute of product
	 *
	 * @return array
	 */	
	public function getAttributeTypesAttribute()
	{
		return json_decode($this->attributes['attributeTypes']);
	}
	/**
	 * Mutator for types attribute of product
	 *
	 * @return void
	 */	
	public function setAttributeTypesAttribute($value)
	{
		$this->attributes['attributeTypes'] = json_encode($value);
	}
	/**
	 * Accessor for price list of product
	 *
	 * @return array
	 */	
	public function getPriceListAttribute()
	{
		return json_decode($this->attributes['priceList']);
	}
	/**
	 * Mutator for price list of product
	 *
	 * @return void
	 */
	public function setPriceListAttribute($value)
	{
		$this->attributes['priceList'] = json_encode($value);
		$this->attributes['minWidth'] = array_keys(last($value))[1];
		$this->attributes['maxWidth'] = last(array_keys(last($value)));
		$this->attributes['minHeight'] = head(head($value));
		$this->attributes['maxHeight'] = head(last($value));
		$this->attributes['startingPrice'] = $this->findLowestPrice($value);
	}
	/**
	 * Finding lowest price in price list
	 *
	 * @return int
	 */	
	public function findLowestPrice($value)
	{
		$startingAt = current((Array)$value);
		foreach($value as $row)
			foreach($row as $cell)
				if($cell < $startingAt)
					$startingAt = $cell;
		return $startingAt;
	}
}
