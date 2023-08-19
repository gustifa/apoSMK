@extends('admin.admin_master')
@section('admin')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
<script src="{{asset('admin/assets/download/js/jquery.min.js')}}"></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

@section('title')
   Laporan Presensi Sholat 
@endsection


<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
        <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Laporan</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Laporan Presensi</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->
				<div class="mt-2-3">
					<div class="card">
					<div class="card-body">
                   <!--  <input type="text" class="form-control filter-input" placeholder="Cari Nama Peserta Didik">
                    <br>
                     <input type="text" class="form-control filter-input" placeholder="Cari Presensi">
                     <br> -->
                     <!-- <select class="form-select">
                        <option class="form-control" selected="" disabled="">Pilih Rombel</option>
                    </select>
                    <hr /> -->
						<div class="table-responsive">
				<table id="records" class="table table-striped table-bordered data-table ">
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <!-- <th>ID</th> -->
                <th>PESERTA DIDIK</th>
                <th>DATE</th>
                <!-- <th>KELAS</th> -->
                <th>WAKTU PRESENSI</th>
                <th>PRESENSI</th>
                <!-- <th width="105px">Action</th> -->
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <input id="presensi" type="text" class="form-control filter-input" placeholder="Cari Nama Peserta Didik">
                </td>
                <td>
                    <input type="text" class="form-control filter-input" placeholder="Cari Presensi">
                </td>
            </tr>
           <!--  <tr>
                <td>
                    <select class="form-select">
                        <option class="form-control" value="" disabled="">Pilih Rombel</option>
                    </select>
                </td>
            </tr> -->
            
        </tfoot>
    </table>
				<!-- Akhir Datatable -->	

				</div>
				</div>
				</div>
				</div>
				

	</div>
</div>


<script type="text/javascript">
  $(function () {  
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('laporan.presensi.sholat') }}",
            data: function (d) {
                d.status = $('#presensi').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            // {data: 'id', name: 'id'},
            {data: 'rfid_id', name: 'rfid_id'},
            {data: 'date', name: 'date'},
            {data: 'created_at', name: 'created_at'},
            {data: 'presensi', name: 'presensi'},
            // {data: 'rombongan_belajar_id', name: 'rombongan_belajar_id'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#filter-input').keyup(function(){
        table.column( $(this).data('column'))
        .search( $(this).val())
        .draw;
    });

    $('.filter-select').change(function(){
        table.column( $(this).data('column'))
        .search( $(this).val())
        .draw;
    });
      
  });
</script>

<!-- <script>
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yyyy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yyyy-mm-dd"
            });
        });
        // Fetch records
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('laporan.presensi.sholat') }}",
                type: "GEt",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.students,
                        // responsive
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "rfid_id"
                            },
                            {
                                "data": "presensi"
                                
                            },
                            
                            {
                                "data": "date"
                            },
                            {
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('YYYY-MM-DD');
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Both date required");
            } else {
                $('#records').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch();
        });
</script>
 -->

@endsection