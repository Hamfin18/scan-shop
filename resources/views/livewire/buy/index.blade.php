<div>
    @include('livewire.buy.add')
    <div class="container">
        <h2 class="mt-3">Daftar Pembelian</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
            Tambah belanjaan
        </button>
        <div class="col-md-12 d-flex">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Barcode Number</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div id="qr-reader-results"></div>
                        </td>
                        <td id="item-name"></td>
                        <td id="harga"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            {{-- <div id="qr-reader-results"></div>
            <div id="harga"></div>
            <button onclick="jumlah();" class="mt-3 mb-3">Masukkan keranjang</button>
            <button onclick="reset();" class="mt-3 mb-3">Reset</button> --}}
        </div>

        <div class="col-md-12">
            <label class="">Item Amount:</label>
            <input type="text" id="item-amount">
        </div>
        <div class="col-md-12">
            <button onclick="jumlah();" class="mt-3 mb-3 btn btn-success">Masukkan keranjang</button>
            <button onclick="reset();" class="mt-3 mb-3 btn btn-primary">Reset</button>
        </div>
        <div class="col-md-12">
            <label> Buy List:</label>
            <ul class="list-group" id="list-buy">

            </ul>
        </div>
        <div class="col-md-12 d-flex">
            <h3>Total belanja: </h3>
            <h3 id="harga_total" class="ms-2"> 0 </h3>
        </div>
    </div>


</div>