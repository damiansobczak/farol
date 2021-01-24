<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ManageStorageService
{
	/**
	 * Store image to storage
	 *
	 * @param ?Illuminate\Http\UploadedFile $image
	 * @param ?string $storageDir
	 * @return Illuminate\Support\Facades\Storage
	 */
	public static function store(?UploadedFile $image, ?string $storageDir)
	{
		if(isset($image) && $image->isValid())
			return $image->store($storageDir);
	}
	/**
	 * Remove image to storage
	 *
	 * @param ?string $storageDir
	 * @return Illuminate\Support\Facades\Storage
	 */
	public static function destroy(?string $image)
	{
		if(isset($image))
			return Storage::delete($image);
	}
	/**
	 * Remove old image and store new image to storage
	 *
	 * @param ?Illuminate\Http\UploadedFile $newImage
	 * @param ?string $oldImage
	 * @param ?string $storageDir
	 * @return Illuminate\Support\Facades\Storage
	 */
	public static function update(?UploadedFile $newImage, ?string $oldImage, ?string $storageDir)
	{
		if(isset($oldImage))
			self::destroy($oldImage);
		return self::store($newImage, $storageDir);
	}
}