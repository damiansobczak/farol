<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumbs extends Component
{
	/*
	 * crumbs data array
	 */
	public $crumbs;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct($crumbs)
	{
		$this->crumbs = $crumbs;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|string
	 */
	public function render()
	{
		return view('components.breadcrumbs');
	}
}
