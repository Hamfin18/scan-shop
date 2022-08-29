<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $validatedData = $request->validate([            
            'barcode_number' => 'required|unique:items',
            'name' => 'required|min:5',
            'price' => 'required'
        ]);    

        Item::insert($validatedData);

        return redirect('/admin/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $id)
    {        
        return view('item.edit',[
            'item'=> $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // dd($item);
        //
        Item::where('id',$item->id)
            ->update([
                'barcode_number' => $request->barcode_number,
                'name' => $request->name,
                'price' => $request->price                
            ]);

        return redirect('/admin/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return redirect('/admin/item');
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $filter = Item::where('barcode_number','LIKE','%'.$search_text.'%')
                          ->orWhere('name','LIKE','%' . $search_text .'%')
                          ->orWhere('price','LIKE','%' . $search_text .'%')
                          ->get();
        
        return view('item.index',[
            'items' => $filter
        ]);
    }
}