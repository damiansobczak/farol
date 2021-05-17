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
		if ($this->image) {
			return Str::startsWith($this->image, 'http') || Str::startsWith($this->image, 'https') ? $this->image : Storage::url($this->image);
		}
		return null;
	}

	/**
	 * Accessor for storage onlyImages
	 *
	 * @return Storage instance
	 */
	public function getOnlyPhotoAttribute()
	{
		if ($this->onlyImage) {
			return Str::startsWith($this->onlyImage, 'http') || Str::startsWith($this->onlyImage, 'https') ? $this->onlyImage : Storage::url($this->onlyImage);
		}
		return null;
	}
}
