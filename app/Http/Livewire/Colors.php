<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Color;

class Colors extends Component
{
    public $colors;
    public $name;
    public $color;

    protected $rules = [
        'name' => 'required|max:50',
        'color' => 'required|min:7|max:7',
    ];

    public function add()
    {
        $this->validate();

        Color::create([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->colors = Color::all();
    }

    public function delete($id)
    {
        Color::where('id', $id)->delete();
        $this->colors = Color::all();
    }

    public function render()
    {
        return view('livewire.colors');
    }
}
