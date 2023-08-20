<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
    public $items;
    public $barcode_number;
    public $name;
    public $price;
    public $selectedId;


    public function render()
    {
        $this->tableUpdate();
        return view('livewire.item.index');
    }

    public function tableUpdate()
    {
        $this->items = Item::all();
        $this->emit('tableUpdated');
    }

    public function clearForm()
    {
        $this->price = "";
        $this->name = "";
        $this->barcode_number = "";
    }

    public function selectedItem($id)
    {
        $this->selectedId = $id;
        $selected = Item::find($id);
        $this->name = $selected->name;
        $this->price = $selected->price;
        $this->barcode_number = $selected->barcode_number;
    }

    private function hideModal()
    {
        $this->emit('hideModals');
    }

    public function addItem()
    {
        $this->validate([
            'barcode_number' => 'required|unique:items',
            'name' => 'required|min:5',
            'price' => 'required'
        ]);

        Item::insert([
            'barcode_number' => $this->barcode_number,
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->tableUpdate();
        $this->clearForm();
        $this->hideModal();
        $this->emit('modalInfo', 'Data berhasil ditambahkan');
    }

    public function deleteItem()
    {
        Item::find($this->selectedId)->delete();
        $this->clearForm();
        $this->hideModal();
        $this->emit('modalInfo', 'Data berhasil dihapus');
    }

    public function updateItem()
    {
        $this->validate([
            'barcode_number' => 'required|unique:items',
            'name' => 'required|min:5',
            'price' => 'required'
        ]);

        $selected = Item::find($this->selectedId);

        $selected->update([
            'barcode_number' => $this->barcode_number,
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->tableUpdate();
        $this->clearForm();
        $this->hideModal();
        $this->emit('modalInfo', 'Data berhasil diubah');
    }
}
