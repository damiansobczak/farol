<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Color;

class Colors extends Component
{
    // Data
    public $colors;
    public $modal = false;

    // Color form
    public $formColorName;
    public $formColorColor;

    // Modal data
    public $editFormColorName;
    public $editFormColor;
    public $editFormId;

    protected $messages = [
        'formColorName.required' => 'Nazwa jest wymagana',
        'formColorColor.required' => 'Kolor jest wymagany',
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

    public function openEditModal($id)
    {
        $this->modal = true;

        $color = Color::findOrFail($id);

        $this->editFormId = $color->id;
        $this->editFormColorName = $color->name;
        $this->editFormColor = $color->color;
    }

    public function closeEditModal()
    {
        $this->modal = false;

        $this->editFormColorName = '';
        $this->editFormColor = '';
        $this->editFormId = null;
    }

    public function editColor()
    {
        $color = Color::findOrFail($this->editFormId);

        $color->update([
            "name" => $this->editFormColorName,
            "color" => $this->editFormColor,
        ]);

        $this->closeEditModal();

        $this->colors = Color::all();
    }

    public function render()
    {
        return view('livewire.colors');
    }
}
