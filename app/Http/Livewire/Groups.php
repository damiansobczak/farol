<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;
use App\Models\Color;

class Groups extends Component
{
    // Data
    public $colors;
    public $collections;

    // Color form
    public $formColorName;
    public $formColorColor;

    // Collection form
    public $formCollectionName;

    protected $messages = [
        'formColorName.required' => 'Nazwa jest wymagana',
        'formColorColor.required' => 'Kolor jest wymagany',
        'formCollectionName.required' => 'Nazwa jest wymagana',
    ];

    public function addColor()
    {
        $this->validate([
            'formColorName' => 'required',
            'formColorColor' => 'required',
        ]);

        Color::create([
            'name' => $this->formColorName,
            'color' => $this->formColorColor,
        ]);

        $this->colors = Color::all();
    }

    public function addCollection()
    {
        $this->validate([
            'formCollectionName' => 'required',
        ]);

        Collection::create([
            'name' => $this->formCollectionName,
        ]);

        $this->collections = Collection::all();
    }

    public function deleteColor($id)
    {
        $color = Color::where('id', $id)->first();

        if ($color->materials) {
            foreach ($color->materials as $material) {
                $material->update(['color_id' => null]);
            }
        }

        $color->delete();

        $this->colors = Color::all();
    }

    public function deleteCollection($id)
    {
        $collection = Collection::where('id', $id)->first();

        if ($collection->materials) {
            foreach ($collection->materials as $material) {
                $material->update(['collection_id' => null]);
            }
        }

        $collection->delete();

        $this->collections = Collection::all();
    }

    public function render()
    {
        return view('livewire.groups');
    }
}
