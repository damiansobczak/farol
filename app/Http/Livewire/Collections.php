<?php

namespace App\Http\Livewire;

use App\Models\Collection;
use Livewire\Component;

class Collections extends Component
{
    // Data
    public $collections;
    public $modal = false;

    // Collection form
    public $formCollectionName;

    // Modal data
    public $editFormCollectionName;
    public $editFormId;

    protected $messages = [
        'formCollectionName.required' => 'Nazwa jest wymagana',
    ];

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

    public function deleteCollection($id)
    {
        $collection = Collection::where('id', $id)->first();

        if ($collection->materials) {
            foreach ($collection->materials as $material) {
                $material->update(['collection_id' => null]);
            }
        }

        if ($collection->products) {
            $collection->products()->detach();
        }

        $collection->delete();

        $this->collections = Collection::all();
    }

    public function openEditModal($id)
    {
        $this->modal = true;

        $collection = Collection::findOrFail($id);

        $this->editFormId = $collection->id;
        $this->editFormCollectionName = $collection->name;
    }

    public function closeEditModal()
    {
        $this->modal = false;

        $this->editFormCollectionName = '';
        $this->editFormId = null;
    }

    public function editCollection()
    {
        $collection = Collection::findOrFail($this->editFormId);

        $collection->update([
            "name" => $this->editFormCollectionName,
        ]);

        $this->closeEditModal();

        $this->collections = Collection::all();
    }

    public function render()
    {
        return view('livewire.collections');
    }
}
