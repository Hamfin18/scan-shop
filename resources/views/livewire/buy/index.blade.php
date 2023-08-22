<div>
    @include('livewire.buy.add')
    <div class="container">
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalAdd">
            Tambah belanjaan
        </button>
        <div>
            <h2 class="mt-3">Daftar Pembelian</h2>
            <div class="col-md-12 d-flex">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Barcode Number</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $row)
                        <tr>
                            <td>{{$row['barcode_number']}}</td>
                            <td>{{$row['name']}}</td>
                            <td>{{ number_format($row['price'], 0, ',', ',') }}</td>
                            <td>{{$row['quantity']}}</td>
                            <td>{{ number_format($row['total'], 0, ',', ',') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="col-md-12">
            <label class="">Item Amount:</label>
            <input type="text" id="item-amount">
        </div> --}}
        <div class="col-md-12">
            {{-- <button onclick="jumlah();" class="mt-3 mb-3 btn btn-success">Masukkan keranjang</button> --}}
            <button onclick="reset();" class="mt-3 mb-3 btn btn-primary">Reset</button>
        </div>
        <div class="col-md-12 d-flex">
            <h3>Total belanja: </h3>
            <h3 id="harga_total" class="ms-2"> {{number_format($grandTotal, 0, ',', ',')}} </h3>
        </div>
    </div>
</div>

@push('scripts')
<script>
    Livewire.on('hideModals',function(){
            $('#modalAdd').modal('hide');                
        });
</script>
@endpush