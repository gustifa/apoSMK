@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  

@section('title')
   Lihat Rombel
@endsection


<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
				<div class="mt-2-3">
					<div class="card">
					<div class="card-body">
						<div class="table-responsive">
				<table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jurusan</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
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
        ajax: "{{ route('lihat.anggota.rombel') }}",
        columns: [
            {data: 'anggota_rombel_id', name: 'anggota_rombel_id'},
            {data: 'peserta_didik_id', name: 'peserta_didik_id'},
            {data: 'rombongan_belajar_id', name: 'rombongan_belajar_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  });
</script>


@endsection