@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User Peserta Didik
@endsection

<script src="{{asset('adminbackend/assets/download/js/jquery.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	

				


				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										
										<th>nama</th>
										<th>No. Induk</th>
										<th>nisn</th>
									
										
									</tr>
								</thead>
								<tbody>

								</tbody>	
							</table>
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	

			</div>
		</div>
		<!--end page wrapper -->
<<!-- script type="text/javascript">
	$(document).ready (function () {
		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{route('get.peserta.didik')}}",
				columns: [
					{data: 'nama', name: 'nama'},
				
				]
		});
	});
</script> -->

<script type="text/javascript">
  $(document).ready (function () {
    	var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get.peserta.didik') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'no_induk', name: 'no_induk'},
            {data: 'nisn', name: 'nisn'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    	});
  	});
</script>
@endsection