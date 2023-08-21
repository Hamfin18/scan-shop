<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Buy extends Component
{
    public $options;

    public function render()
    {
        $this->options = Item::get();
        return view('livewire.buy.index');
    }

    public function selectedItem($id)
    {
        // $this->selectedId = $id;
        // $selected = Item::find($id);
        // $this->name = $selected->name;
        // $this->price = $selected->price;
        // $this->barcode_number = $selected->barcode_number;
    }
}
