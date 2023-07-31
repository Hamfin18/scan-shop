@extends('layouts.main')

@section('content')

<div class="container position-absolute top-50 start-50 translate-middle">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h1 class="h3 mb-3 fw-normal">Pilih Menu: </h1>
            <a href="{{route('admin.item')}}" class="w-100 btn btn-lg btn-primary mb-3">Atur Barang</a>
            <a href="" class="w-100 btn btn-lg btn-success mb-3">Pengaturan Admin</a>
            <a href="{{route('/')}}" class="w-100 btn btn-lg btn-danger">Back</a>

        </div>
    </div>
</div>

@endsection