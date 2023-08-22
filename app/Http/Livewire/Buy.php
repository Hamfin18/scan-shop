<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class Buy extends Component
{
    public $options;
    public $barcode_number;
    public $name;
    public $nameString;
    public $price;
    public $quantity;
    public $cart = [];
    public $grandTotal = 0;

    protected $listeners = ['nameUpdated'];

    public function render()
    {
        $this->options = Item::get();
        $this->select2Refresh();
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

    private function hideModal()
    {
        $this->emit('hideModals');
    }

    public function clearForm()
    {
        $this->name = '';
        $this->price = null;
        $this->barcode_number = null;
        $this->quantity = null;
    }

    public function nameUpdated($value)
    {
        $selected = Item::where('id', $value)->first();

        if ($selected) {
            $this->name = $selected->id;
            $this->nameString = $selected->name;
            $this->price = $selected->price;
            $this->barcode_number = $selected->barcode_number;
        } else {
            $this->clearForm();
        }
        $this->select2Refresh();
    }

    public function barcodeUpdated()
    {
        $selected = Item::where('barcode_number', $this->barcode_number)->first();

        if ($selected) {
            $this->name = $selected->id;
            $this->nameString = $selected->name;
            $this->price = $selected->price;
            $this->barcode_number = $selected->barcode_number;
        } else {
            $this->clearForm();
        }
        $this->select2Refresh();
    }

    public function select2Refresh()
    {
        $this->emit('select2Refreshed');
    }

    public function addToCart()
    {
        $total = $this->price * $this->quantity;

        $newItem = [
            'barcode_number' => $this->barcode_number,
            'name' => $this->nameString,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'total' => $total,
        ];
        $this->cart[] = $newItem;
        $this->grandTotal = $this->grandTotal + $total;

        $this->hideModal();
        $this->clearForm();
        $this->select2Refresh();
    }
}
