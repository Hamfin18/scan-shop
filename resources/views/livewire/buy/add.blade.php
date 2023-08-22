@push('sourceJS')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
@endpush

<div>
    <!-- Modal -->
    <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div id="qr-reader" style="width:100%" wire:ignore></div>
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Barcode Number</label>
                                <input type="text" class="form-control @error('barcode_number') is-invalid @enderror"
                                    name="barcode_number" id="barcode_number" wire:model.defer="barcode_number"
                                    wire:change="barcodeUpdated">
                                @error('barcode_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Item Name</label>
                                <select class="js-select2 form-control" style="width: 100%" wire:model.defer="name"
                                    id="name">
                                    <option value="">Select an option</option>
                                    @if ($options)
                                    @foreach ($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" wire:model.defer="price"
                                    readonly>
                            </div>
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" wire:model.defer="quantity">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="clearForm">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="addToCart">Tambah ke keranjang</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.js-select2').select2({
            dropdownParent: $('#modalAdd')
        });                   
    });



    Livewire.on('select2Refreshed',function(){
            $('.js-select2').select2({
                dropdownParent: $('#modalAdd')
            });  
        });

    $('.js-select2').on('change', function(e) { 
            Livewire.emit('nameUpdated', 
            $('.js-select2').select2("val"));
        });

    


    function vidOff() {
        vid.pause();
        vid.src = "";
        localstream.stop();
    }


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
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);
                $('#barcode_number').val(decodedText);
                if ($('#barcode_number').val(decodedText) != null) {
                    alert('barcode berhasil ter isi');
                    $('#qr-reader').hide();
                    const video = document.querySelector('video');
                    const mediaStream = video.srcObject;
                    const tracks = mediaStream.getTracks();
                    tracks[0].stop();
                    tracks.forEach(track => track.stop())
                }
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
@endpush