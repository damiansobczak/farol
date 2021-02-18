<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('*', function($view)
		{
			$categories = Category::select('id', 'image', 'imageAlt', 'name')->with('cheapestProduct')->get();
			$view->with('headCategories', $categories);
		});
	}
}
