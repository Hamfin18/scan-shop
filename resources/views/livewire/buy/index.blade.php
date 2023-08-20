<div>
    <div class="container">
        {{-- <div class="row d-flex justify-content-center">
            <div class="col-md-4 mt-3">
                <div id="qr-reader" style="width: 500px"></div>
            </div>
        </div> --}}
        <h2 class="mt-3">Daftar Pembelian</h2>
        <button class="btn btn-primary">Tambah belanjaan</button>
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
                <button onclick="reset();" class="mt-3 mb-3">Reset</button>    --}}
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


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" ||
                document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results').text = 'babu';
            var lastResult, countResults = 0;

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    console.log(`Scan result ${decodedText}`, decodedResult);
                    $('#qr-reader-results').text(decodedText);
                    $('#harga').text(barcodeXharga.get($('#qr-reader-results').text()));
                    $('#item-name').text(barcodeXname.get($('#qr-reader-results').text()));
                    $('#item-amount').val(0);
                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
</div>
