@extends('admin.admin_master')
@section('admin')

<script src="{{asset('admin/assets/download/js/jquery-3.5.1.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://unpkg.com/html5-qrcode"></script>
<div class="page-wrapper">
	<div class="page-content">


    <div id="reader"></div>
    <add name="Feature-Policy" value="camera 'self'" />
    <div id="result"></div>
    
</div>
</div>

<!-- <script>
     // $('#result').val('test');
     function onScanSuccess(decodedText, decodedResult) {
                // alert(decodedText);
                $('#result').val(decodedText);
                let id = decodedText;                
                html5QrcodeScanner.clear().then(_ => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        
                        url: "{{ route('validasi') }}",
                        type: 'POST',            
                        data: {
                            _methode : "POST",
                            _token: CSRF_TOKEN, 
                            qr_code : id
                        },            
                        success: function (response) { 
                            console.log(response);
                            if(response.status == 200){
                                alert('berhasil');
                            }else{
                                alert('gagal');
                            }
                            
                        }
                    });   
                }).catch(error => {
                    alert('something wrong');
                });
                
            
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}


</script> -->

<script>

    const scanner = new Html5QrcodeScanner('reader', { 
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        },  // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success(result) {

        document.getElementById('result').innerHTML = `
        <h2>Success!</h2>
        <p><a href="${result}">${result}</a></p>
        `;
        // Prints result as a link inside result element

        scanner.clear();
        // Clears scanning instance

        document.getElementById('reader').remove();
        // Removes reader element from DOM since no longer needed
    
    }

    function error(err) {
        console.error(err);
        // Prints any errors to the console
    }

</script>

<script>
    const html5QrCode = new Html5Qrcode(/* element id */ "reader");
// File based scanning
const fileinput = document.getElementById('qr-input-file');
fileinput.addEventListener('change', e => {
  if (e.target.files.length == 0) {
    // No file selected, ignore 
    return;
  }

  const imageFile = e.target.files[0];
  // Scan QR Code
  html5QrCode.scanFile(imageFile, true)
  .then(decodedText => {
    // success, use decodedText
    console.log(decodedText);
  })
  .catch(err => {
    // failure, handle it.
    console.log(`Error scanning file. Reason: ${err}`)
  });
});
</script>
@endsection