@extends('layouts.main')

@section('content')
 
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <form method="post" action="/item/{{ $item->id }}/edit" >              
            @csrf                      
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label" >Barcode Number: {{ $item->barcode_number }}</label>
              <br>
              <input type="text" class="form-control" name="barcode_number" id="barcode_number" value="{{ $item->barcode_number }}" required hidden>
              <label for="exampleInputEmail1" class="form-label">Item Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}" required>
              <label for="exampleInputEmail1" class="form-label">Price</label>
              <input type="text" class="form-control" name="price" id="price" value="{{ $item->price }}" required>
            </div>                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
   </div>

</div>

@endsection