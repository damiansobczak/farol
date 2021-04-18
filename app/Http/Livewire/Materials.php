<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;
use App\Models\Color;
use App\Models\Material;
use App\Services\ManageStorageService;
use Livewire\WithFileUploads;

class Materials extends Component
{
    use WithFileUploads;

    // Data
    public $colors;
    public $collections;
    public $materials;

    // Color form
    public $formColorName;
    public $formColorColor;

    // Collection form
    public $formCollectionName;

    // Material form
    public $formMaterialName;
    public $formMaterialCode;
    public $formMaterialTransmission;
    public $formMaterialAbsorption;
    public $formMaterialReflection;
    public $formMaterialImage;
    public $formMaterialImageAlt;
    public $formMaterialColor;
    public $formMaterialCollection;
    public $formMaterialPropertyGummed;
    public $formMaterialPropertyBlackout;
    public $formMaterialPropertyOneColor;
    public $formMaterialPropertyPatterned;
    public $formMaterialPropertyWashing;
    public $formMaterialPropertyFlameRetardant;
    public $formMaterialPropertyTeflon;
    public $formMaterialPropertyPvcFree;
    public $formMaterialPropertyOffice;
    public $formMaterialPropertyRebound;

    protected $messages = [
        'formColorName.required' => 'Nazwa jest wymagana',
        'formColorColor.required' => 'Kolor jest wymagany',
        'formCollectionName.required' => 'Nazwa jest wymagana',
        'formMaterialImage.image' => 'Nieprawidłowy format',
        'formMaterialImage.max' => 'Obrazek przekracza dozwoloną wielkość',
        'formMaterialName.required' => 'Nazwa jest wymagana',
        'formMaterialColor.required' => 'Pole wymagane',
        'formMaterialCollection.required' => 'Pole wymagane',
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

    public function addMaterial()
    {
        $this->validate([
            'formMaterialImage' => 'image|max:512', // 512kb max
            'formMaterialName' => 'required',
            'formMaterialColor' => 'required',
            'formMaterialCollection' => 'required',
        ]);

        $image = $this->formMaterialImage->store('materials');

        Material::create([
            'name' => $this->formMaterialName,
            'code' => $this->formMaterialCode,
            'transmission' => $this->formMaterialTransmission,
            'absorption' => $this->formMaterialAbsorption,
            'reflection' => $this->formMaterialReflection,
            'image' => $image,
            'imageAlt' => $this->formMaterialImageAlt,
            'color_id' => $this->formMaterialColor,
            'collection_id' => $this->formMaterialCollection,
            'property_gummed' => $this->formMaterialPropertyGummed,
            'property_blackout' => $this->formMaterialPropertyBlackout,
            'property_onecolor' => $this->formMaterialPropertyOneColor,
            'property_patterned' => $this->formMaterialPropertyPatterned,
            'property_washing' => $this->formMaterialPropertyWashing,
            'property_flame_retardant' => $this->formMaterialPropertyFlameRetardant,
            'property_teflon' => $this->formMaterialPropertyTeflon,
            'property_pvc_free' => $this->formMaterialPropertyPvcFree,
            'property_office' => $this->formMaterialPropertyOffice,
            'property_rebound' => $this->formMaterialPropertyRebound,
        ]);

        $this->materials = Material::all();
    }

    public function deleteColor($id)
    {
        $color = Color::where('id', $id)->first();

        if ($color->materials) {
            foreach ($color->materials as $material) {
                $material->update(['color_id' => null]);
            }
            $this->materials = Material::all();
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
            $this->materials = Material::all();
        }

        $collection->delete();

        $this->collections = Collection::all();
    }

    public function deleteMaterial($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        ManageStorageService::destroy($material->image);
        $this->materials = Material::all();
    }

    public function render()
    {
        return view('livewire.materials');
    }
}
