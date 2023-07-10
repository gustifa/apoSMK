@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Rombongan Belajar</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form Rombongan Belajar</li>
							</ol>
						</nav>
					</div>


				</div>
				<!--end breadcrumb-->
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('simpan.rombel') }}">
	 	@csrf

									<div class="mb-3">
										<label class="form-label">Nama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Nama">
									</div>

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
											<option value="{{$item->id}}">{{$item->nama}}</option>
											@endforeach
										</select>
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
		<!--end page wrapper -->
@endsection