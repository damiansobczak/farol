<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Slider extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'description',
		'actionName',
		'actionLink',
		'image',
		'imageAlt',
		'onlyImage',
		'onlyImageLink',
	];

	/**
	 * Accessor for storage images
	 *
	 * @return Storage instance
	 */
	public function getPhotoAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
	}

	/**
	 * Accessor for storage onlyImages
	 *
	 * @return Storage instance
	 */
	public function getOnlyPhotoAttribute()
	{
		return Storage::url($this->onlyImage);
	}
}
