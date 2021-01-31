<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PriceListService
{
	/**
	 * Process CSV to array
	 *
	 * @param ?Illuminate\Http\UploadedFile $image
	 * @return array
	 */
	public static function processFile(?UploadedFile $file)
	{
		if(isset($file) && $file->isValid())
		{
			$csv = array_map(function($v){ return str_getcsv($v, ';'); }, file($file));
			array_walk($csv, function(&$a) use ($csv) {
				$a = array_combine($csv[0], $a);
			});
			array_shift($csv);
			return $csv;
		}
	}
}