@extends('admin.admin_master')
@section('admin')

<script src="{{asset('admin/assets/download/js/jquery-3.5.1.js')}}"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<div class="page-wrapper">
	<div class="page-content">


<div id="reader" width="600px"></div>
    <input type="hidden" name="result" id="result">
</div>
</div>

<script>
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

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection