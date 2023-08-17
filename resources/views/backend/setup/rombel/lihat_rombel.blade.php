@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat Rombel
@endsection

@php
			$dataKelas = App\Models\Kelas::all();
        $dataJurusan = App\Models\Jurusan::all();
        $dataGroup = App\Models\Group::all();
        $dataGuru = App\Models\Guru::all();
        $userRfid = App\Models\userrfid::all();
@endphp

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Setting Rombel</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Rombel</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->
				

	<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Rombel</button>
												
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Tambah Rombongan Belajar</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form id="myForm" action="{{ route('simpan.rombel') }}" method="POST">
            @csrf

									<!-- <div class="mb-3">
										<label class="form-label">Nama Rombel:</label>
										<input type="text" name="nama" class="form-control" placeholder="Nama Kelas">
										@error('nama')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div> -->

                            
									
																		<div class="mb-3">
										<select name="kelas_id" class="form-select mb-3" aria-label="Default select example">
											<option value="" selected="" disabled="">Pilih Kelas</option>
											@foreach($dataKelas as $item)
											<option value="{{$item->id}}">{{$item->nama}}</option>
											@endforeach
										</select>
									</div>

									<div class="mb-3">
										<select name="jurusan_id" class="form-select mb-3" aria-label="Default select example">
											<option value="" selected="" disabled="">Pilih Jurusan</option>
											@foreach($dataJurusan as $item)
											<option value="{{$item->id}}">{{$item->kode}}</option>
											@endforeach
										</select>
									</div>

									<div class="mb-3">
										<select name="group_id" class="form-select mb-3" aria-label="Default select example">
											<option value="" selected="" disabled="">Pilih Group</option>
											@foreach($dataGroup as $item)
											<option value="{{$item->id}}">{{$item->nama}}</option>
											@endforeach
										</select>
									</div>

									<div class="mb-3">
										<select name="guru_id" class="form-select mb-3" aria-label="Default select example">
											<option value="" selected="" disabled="">Pilih Nama Guru</option>
											@foreach($dataGuru as $item)
											<option value="{{$item->guru_id}}">{{$item->nama}}</option>
											@endforeach
										</select>
									</div>
									<div class="mb-3">
										<select name="nama_kelas" class="form-select mb-3" aria-label="Default select example">
											
											
										</select>
									</div>

									<div class="mb-3">
										<select name="kode_jurusan" class="form-select mb-3" aria-label="Default select example">
											
											
										</select>
									</div>

									<div class="mb-3">
										<select id="group" name="nama_group" class="form-select mb-3" aria-label="Default select example">
											
											
										</select>
									</div>

									<div class="mb-3">
										<select name="nama_guru" class="form-select mb-3" aria-label="Default select example">
											
											
										</select>
									</div>
								

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
													</form>
												</div>
											</div>
										</div>	<!-- AKhir Moodal -->



				<hr/>

				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<!-- <th>Name</th> -->
										<th>Kelas</th>
										<th>Nama Walas</th>
										<!-- <th>Jumlah Peserta Didik</th> -->
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								@foreach($dataRombongan_belajar as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<!-- <td>{{$item->nama}}</td> -->
										<td>{{$item->kelas->nama}} {{$item->jurusan->kode}}{{$item->group->nama}}</td>
											<td>{{$item->walas->nama}}</td>
										<!-- <td>
											<span class="badge bg-success">12</span>
										</td> -->
										<td style="width: 20px;">
											<a class="btn btn-info" href=""><i class='bx bx-edit mr-1'></i></a>
											<!-- <a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a> -->

										</td>
										
									</tr>
									@endforeach
								</tbody>	
							</table>
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	


				
			</div>
		</div>
		<!--end page wrapper -->

<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="kelas_id"]').on('click', function(){
            var kelas_id = $(this).val();
            
                $.ajax({
                    url: "{{  url('/setting/kelas/ajax')}}/"+kelas_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="nama_kelas"]').html('');
                       var d =$('select[name="nama_kelas"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="nama_kelas"]').append('<option value="'+ value.nama +'">' + value.nama + '</option>');
                          });
                    },
                });
            
        });
     });

</script>

<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="jurusan_id"]').on('click', function(){
            var jurusan_id = $(this).val();
            
                $.ajax({
                    url: "{{  url('/setting/jurusan/ajax')}}/"+jurusan_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="kode_jurusan"]').html('');
                       var d =$('select[name="kode_jurusan"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="kode_jurusan"]').append('<option value="'+ value.kode +'">' + value.kode + '</option>');
                          });
                    },
                });
            
        });
     });

</script>

<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="group_id"]').on('click', function(){
            var group_id = $(this).val();
            
                $.ajax({
                    url: "{{  url('/setting/group/ajax')}}/"+group_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="nama_group"]').html('');
                       var d =$('select[name="nama_group"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="nama_group"]').append('<option value="'+ value.nama +'">' + value.nama + '</option>');
                          });
                    },
                });
            
        });
     });

</script>

<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="guru_id"]').on('click', function(){
            var guru_id = $(this).val();
            
                $.ajax({
                    url: "{{  url('/setting/guru/ajax')}}/"+guru_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="nama_guru"]').html('');
                       var d =$('select[name="nama_guru"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="nama_guru"]').append('<option value="'+ value.nama +'">' + value.nama + '</option>');
                          });
                    },
                });
            
        });
     });

</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                kelas_id: {
                    required : true,
                },

                jurusan_id: {
                    required : true,
                }, 

                group_id: {
                    required : true,
                }, 

                guru_id: {
                    required : true,
                },  


            },
            messages :{
                kelas_id: {
                    required : 'Silahkan Pilih Kelas',
                },

                jurusan_id: {
                    required : 'Silahkan Pilih Jurusan',
                },

                group_id: {
                    required : 'Silahkan Pilih Group',
                },

                guru_id: {
                    required : 'Silahkan Pilih Walas',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection