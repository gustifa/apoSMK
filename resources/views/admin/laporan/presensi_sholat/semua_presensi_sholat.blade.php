@extends('admin.admin_master')
@section('admin')

@section('title')
   Laporan Semua Rombel
@endsection

@php
   $datarombel = App\Models\Rombongan_belajar::all();
@endphp
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
 
<div class="page-wrapper">
         <div class="page-content">

            

           <div class="card">

               <div class="card-body">
                              <div class="row">
               <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
                  <div class="col-md-5">
                   <div class="input-group input-daterange">
                       <input type="text" name="from_date" id="from_date" readonly class="form-control" />
                       <div class="input-group-addon"> s/d </div>
                       <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
                   </div>
                  </div>
               <div class="col-md-2">
                <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
               </div>
            </div>
            <hr />
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered" style="width:100%">
                   <thead>
                    <tr>
                     <th width="35%">RFID</th>
                     <th width="50%">Status</th>
                     <th width="15%">Waktu Presensi</th>
                    </tr>
                   </thead>
                   <tbody>
                   
                   </tbody>
                  </table>
               {{ csrf_field() }}
              </div>
             </div>

            </div>
         </div>
      </div>
      <!--end page wrapper -->

<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = ''){
   $.ajax({
      url:"{{ route('daterange.fetch_data') }}",
      method:"POST",
      data:{from_date:from_date, to_date:to_date, _token:_token},
      dataType:"json",
      success:function(data){
       var output = '';
       $('#total_records').text(data.length);
       for(var count = 0; count < data.length; count++){
        output += '<tr>';
        output += '<td>' + data[count].rfid_id + '</td>';
        output += '<td>' + data[count].presensi + '</td>';
        output += '<td>' + data[count].date + '</td></tr>';
       }
       $('tbody').html(output);
    }
   })
}

    $('#filter').click(function(){
     var from_date = $('#from_date').val();
     var to_date = $('#to_date').val();
     if(from_date != '' &&  to_date != '')
     {
      fetch_data(from_date, to_date);
     }
     else
     {
      alert('Data Filter Belum ditentukan');
     }
    });

    $('#refresh').click(function(){
     $('#from_date').val('');
     $('#to_date').val('');
     fetch_data();
    });


});
</script>


@endsection