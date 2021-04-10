<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Controls extends Component
{
	//Data
	public $product;
	public $collections;
	public $materials;
	public $materialsCopy;
	public $colors;
	//Material controls
	public $searchMaterial;
	public $totalMaterials = 0;

	public function mount($product)
	{
		$this->product = $product;
		$this->collections = $this->product->collections;
		$this->materials = $this->collections->pluck('materials')->collapse();
		$this->materialsCopy = $this->materials;
		$this->colors = $this->materials->pluck('color')->collapse();
		$this->totalMaterials = $this->materials->count();
	}

	public function search()
	{
		$value = $this->searchMaterial;
		$this->materials = $this->materialsCopy->filter(function($material) use ($value) {
			return false !== stripos($material['name'], $value);
		});
	}

	public function render()
	{
		return view('livewire.controls');
	}
}
