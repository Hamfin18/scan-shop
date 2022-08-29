@extends('layouts.main')

@section('content')
 
<div class="container position-absolute top-50 start-50 translate-middle">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">            
                  <h1 class="h3 mb-3 fw-normal">Selamat Datang di Toko X</h1>    
                  <a href="/admin" class="w-100 btn btn-lg btn-primary mb-3">Login Admin</a>                                                     
                  <a href="/buy" class="w-100 btn btn-lg btn-success">Beli Barang</a>                                                     
                                                   
        </div>
    </div>
</div>

@endsection