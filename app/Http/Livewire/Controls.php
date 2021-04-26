<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Controls extends Component
{
	//Data
	public $product;

	//Computed
	public $collections;
	public $materials;
	public $colors;

	//Material controls
	public $search;
	public $selectedColor;
	public $selectedCollection;

	public function searchMaterial()
	{
		//
	}

	public function render()
	{
		$this->collections = $this->product->collections;
		$this->materials = $this->product->collections->pluck('materials')->collapse();
		$this->colors = $this->materials->map(function ($item) {
			return $item->color;
		});

		$this->filtered = $this->materials;

		$this->filtered = $this->filtered
			->when($this->selectedColor, function ($query) {
				return $query->filter(function ($value, $key) {
					return $value->color->id == $this->selectedColor;
				});
			});

		$this->filtered = $this->filtered
			->when($this->selectedCollection, function ($query) {
				return $query->filter(function ($value, $key) {
					return $value->collection->id == $this->selectedCollection;
				});
			});

		$this->filtered = $this->filtered
			->when($this->search, function ($query) {
				return $query->filter(function ($value, $key) {
					return Str::contains($value->name, $this->search);
				});
			});


		return view('livewire.controls', [
			"collections" => $this->collections,
			"materials" => $this->materials,
			"colors" => $this->colors,
			"filtered" => $this->filtered
		]);
	}
}
