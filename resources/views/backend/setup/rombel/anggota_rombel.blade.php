@extends('admin.admin_master')
@section('admin')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
<script src="{{asset('admin/assets/download/js/jquery.min.js')}}"></script> 

@section('title')
   Lihat Rombongan Belajar 
@endsection


<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
				<div class="mt-2-3">
					<div class="card">
					<div class="card-body">
					<!-- 	<div class="row">
							<div class="col-xl-12">
								<form action="" method="POST">
								<div class="mb-3">
									
										<label class="form-label">Filter Jurusan:</label>
											<select name="rombongan_belajar_id" class="form-select text-secondary" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Rombel</option>
                                                        @foreach($dataRombongan_belajar as $item)
                                                        <option value="{{$item->rombongan_belajar_id}}">{{$item->kelas->nama}} {{$item->jurusan->kode}} {{$item->group->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Group')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
									<div class="mb-3">
												<button class="btn btn-primary form-control" type="submit">Cari</button>

									</div>
									</form>
							</div>
						</div>
						
							<hr /> -->
						<div class="table-responsive">
				<table class="table table-striped table-bordered data-table ">
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Nama Siswa</th>
                <th>No Induk</th>
                <th>NISN</th>
                <th>WALAS</th>
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

<!-- <script type="text/javascript">
       $(document).ready(function() {
        $('select[name="rombongan_belajar_id"]').on('change', function(){
            var rombongan_belajar_id = $(this).val();
            if(rombongan_belajar_id) {
                var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('lihat.anggota.rombel') }}",
        columns: [
            // {data: 'no', name: 'no'},
            {data: 'peserta_didik_id', name: 'peserta_didik_id'},
            {data: 'rombongan_belajar_id', name: 'rombongan_belajar_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
            } else {
                alert('danger');
            }
        });
     });
</script> -->

<script type="text/javascript">
  $(function () {  
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('lihat.anggota.rombel') }}",
        columns: [
            // {data: 'no', name: 'no'},
            {data: 'peserta_didik_id', name: 'peserta_didik_id'},
            {data: 'no_induk', name: 'no_induk'},
            {data: 'nisn', name: 'nisn'},
            {data: 'walas', name: 'walas'},
            {data: 'rombongan_belajar_id', name: 'rombongan_belajar_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  });
</script>


@endsection