@extends('layouts.main')

@section('content')
 
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-md-12">
            <form action="/item/search" method="get" class="mt-2" >              
              <div class="input-group mb-3">
                <input type="text" class="form-control"  name="query" value="{{ request('query') }}">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
              </div>
            </form>
        </div>
        <div class="col-md-12">                              
                <a href="/item/add" class="btn btn-outline-primary">Tambah Item</a>            
        </div>
        
        <table class="table text-center">
            <thead>
              <tr>                
                <th scope="col">Item Barcode Number</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $items as $item )
              <tr>                
                <td>{{ $item->barcode_number }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="/item/edit/{{ $item->id }}" class="btn bg-primary text-white">Edit</a> 
                    <a href="/item/delete/{{ $item->id }}" class="btn bg-danger text-white" onclick=" return confirm('yakin ingin menghapus?');">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="/admin" class="btn bg-danger text-white col-md-1">Back</a>
    </div>  
    </div>
</div>

@endsection