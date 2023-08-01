@extends('guru.guru_master')
@section('guru')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="{{asset('adminbackend/assets/download/jquery.min.js')}}"></script>

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{route('simpan.bobot.pelanggaran.siswa')}}" enctype="multipart/form-data">
	 							@csrf

	 								<!-- <div class="mb-3">
										<label class="form-label">Pilih Kelas:</label>
											<select name="rombongan_belajar_id" class="form-select" id="exampleFormControlSelect1">
											<select name="kelas_id" class="form-control" required="" >
                                                        <option selected="" disabled="">Select Jurusan</option>
                                                        @foreach($kelas as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div> -->

									<div class="mb-3">
										<label class="form-label">Pilih Kelas:</label>
											<!-- <select name="rombongan_belajar_id" class="form-select" id="exampleFormControlSelect1"> -->
											<select name="rombongan_belajar_id" class="form-control" required="" >
                                                        <option selected="" disabled="">Select Jurusan</option>
                                                        @foreach($anggota_rombel_walas as $item)
                                                        <option value="{{$item->rombongan_belajar_id}}">{{$item->kelas->nama}} {{$item->jurusan->kode}} {{$item->group->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									<div class="mb-3">
										<label class="form-label">Pilih Peserta Didik:</label>
											<!-- <select name="peserta_didik_id" class="form-select" id="exampleFormControlSelect1"> -->
											<select name="peserta_didik_id" class="form-control" required="" >
                                                        <option selected="" disabled="">Select Jurusan</option>
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>


									<div class="mb-3">
										<label class="form-label">Pelanggaran:</label>
											<select name="Group" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Pelanggaran</option>
                                                        @foreach($bobotPelanggaran as $item)
                                                        <option value="{{$item->bobot_pelanggaran_id}}">{{$item->jenis_pelanggaran}} - {{$item->nama_pelanggaran}} - {{$item->bobot}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Group')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									
									
									<div class="mb-3">
										<button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Simpan</button>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			



	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
        $('select[name="kelas_id"]').on('change', function(){
            var kelas_id = $(this).val();
            if(kelas_id) {
                $.ajax({
                    url: "{{  url('/guru/kelas/ajax') }}/"+kelas_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="rombongan_belajar_id"]').html('');
                       var d =$('select[name="rombongan_belajar_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="rombongan_belajar_id"]').append('<option value="'+ value.rombongan_belajar_id +'">' + value.nama + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
       });

</script>

<!-- <script type="text/javascript">
	$(document).ready(function() {
        $('select[name="jurusan_id"]').on('change', function(){
            var jurusan_id = $(this).val();
            if(jurusan_id) {
                $.ajax({
                    url: "{{  url('/guru/jurusan/ajax') }}/"+jurusan_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="rombongan_belajar_id"]').html('');
                       var d =$('select[name="rombongan_belajar_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="rombongan_belajar_id"]').append('<option value="'+ value.rombongan_belajar_id +'">' + value.nama + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
       });

</script> -->
<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="rombongan_belajar_id"]').on('click', function(){
            var rombongan_belajar_id = $(this).val();
            if(rombongan_belajar_id) {
                $.ajax({
                    url: "{{  url('/guru/anggota-rombel-belajar/ajax') }}/"+rombongan_belajar_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="peserta_didik_id"]').html('');
                       var d =$('select[name="peserta_didik_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="peserta_didik_id"]').append('<option value="'+ value.peserta_didik_id +'">' + value.peserta_didik_id + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
     });

</script>
@endsection