<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
	use HasFactory;
	protected $fillable = [
		'image',
		'imageAlt',
		'name'
	];
	/**
	 * Accessor for image
	 *
	 * @return Storage instance
	 */
	public function getImgAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
	}
	/**
	 * Get products from category
	 *
	 * @return array
	 */
	public function products()
	{
		return $this->hasMany(Product::class, 'categoryId');
	}
	/**
	 * Get product from category with lowest price
	 *
	 * @return array
	 */
	public function cheapestProduct()
	{
		return $this->hasOne(Product::class, 'categoryId')->orderBy('startingPrice', 'ASC');
	}
}
