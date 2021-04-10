<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $input;
    public $products;

    public function search()
    {
        $this->products = [];
        if ($this->input) {
            $this->products = Product::where('name', 'like', $this->input . '%')->get();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
