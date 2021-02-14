<?php

namespace App\Services;

use App\Services\ManageStorageService;

class GalleryService
{
	/**
	 * Store gallery to storage
	 *
	 * @param ?Array $gallery
	 * @param ?string $storageDir
	 * @return json
	 */
	public static function store(?Array $gallery, ?string $storageDir)
	{
		if(isset($gallery)) {
			$paths = [];
			foreach ($gallery as $key => $file) {
				$paths[$key] = ManageStorageService::store($file, $storageDir);
			}
			return json_encode($paths);
		}
	}
	/**
	 * Remove gallery to storage
	 *
	 * @param ?string $gallery
	 * @return void
	 */
	public static function destroy(?string $gallery)
	{
		if(isset($gallery)) {
			foreach(json_decode($gallery) as $gallery_image) {
				ManageStorageService::destroy($gallery_image);
			}
		}
	}
	/**
	 * Remove old gallery and store new gallery to storage
	 *
	 * @param ?Array $newGallery
	 * @param ?string $oldGallery
	 * @param ?string $storageDir
	 * @return App\Service\GaleryService
	 */
	public static function update(?Array $newGallery, ?string $oldGallery, ?string $storageDir)
	{
		if(isset($newGallery))
			self::destroy($oldGallery);
		return self::store($newGallery, $storageDir);
	}
}