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

        $this->items = Item::all();
    }
}
