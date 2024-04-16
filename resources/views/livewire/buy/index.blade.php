@push('sourceJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

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
                        @if ($cart)
                            @foreach ($cart as $row)
                                <tr>
                                    <td>{{ $row['barcode_number'] }}</td>
                                    <td>{{ $row['name'] }}</td>
                                    <td>{{ number_format($row['price'], 0, ',', ',') }}</td>
                                    <td>{{ $row['quantity'] }}</td>
                                    <td>{{ number_format($row['total'], 0, ',', ',') }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12">
            {{-- <button wire:click="resetCart" class="mt-3 mb-3 btn btn-primary"> --}}
            <button class="mt-3 mb-3 btn btn-primary" onclick="test()">
                Reset
            </button>
        </div>
        <div class="col-md-12 d-flex">
            <h3>Total belanja: </h3>
            <h3 id="harga_total" class="ms-2"> {{ number_format($grandTotal, 0, ',', ',') }} </h3>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        Livewire.on('hideModals', function() {
            $('#modalAdd').modal('hide');
        });




        function test() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('resetCart')
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your cart has been emptied',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
@endpush
