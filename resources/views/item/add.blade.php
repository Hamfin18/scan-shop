@extends('layouts.main')

@section('content')
 
<div class="container">
   <div class="row d-flex justify-content-center">
      <div class="col-md-12">
         <form action="/item" method="post">
            @csrf
            <div class="mb-3">
               <div id="qr-reader" style="width:500px"></div>
              <label for="exampleInputEmail1" class="form-label" >Barcode Number</label>
              <input type="text" class="form-control @error('barcode_number') is-invalid @enderror" name="barcode_number" id="barcode_number" required>
              @error('barcode_number')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror    
              <label for="exampleInputEmail1" class="form-label">Item Name</label>
              <input type="text" class="form-control" name="name" required>
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror    
              <label for="exampleInputEmail1" class="form-label">Price</label>
              <input type="text" class="form-control" name="price" required>
            </div>                       
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/item" class="btn btn-danger">Back</a>
          </form>
          
      </div>
   </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
<script>
   function vidOff() {
      vid.pause();
      vid.src = "";
      localstream.stop();
   }


  function docReady(fn) {
      // see if DOM is already available
      if (document.readyState === "complete"
          || document.readyState === "interactive") {
          // call on next available tick
          setTimeout(fn, 1);
      } else {
          document.addEventListener("DOMContentLoaded", fn);
      }
  }

  docReady(function () {           
      var lastResult, countResults = 0;
      function onScanSuccess(decodedText, decodedResult) {
          if (decodedText !== lastResult) {
              ++countResults;
              lastResult = decodedText;
              // Handle on success condition with the decoded message.
              console.log(`Scan result ${decodedText}`, decodedResult);
             $('#barcode_number').val(decodedText);
            if($('#barcode_number').val(decodedText) != null){               
               alert('barcode berhasil ter isi');
               $('#qr-reader').remove();
               const video = document.querySelector('video');
               const mediaStream = video.srcObject;
               const tracks = mediaStream.getTracks();
               tracks[0].stop();
               tracks.forEach(track => track.stop())
            }
          }
      }

      var html5QrcodeScanner = new Html5QrcodeScanner(
          "qr-reader", { fps: 10, qrbox: 250 });
      html5QrcodeScanner.render(onScanSuccess);

      
  });
</script>
@endsection