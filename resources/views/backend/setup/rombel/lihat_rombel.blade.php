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
								<li class="breadcrumb-item active" aria-current="page">Data Rombongan Belajar</li>
							</ol>
						</nav>
					</div>


				</div>
				<!--end breadcrumb-->
				<!-- <div class="col-lg-3 col-xl-2">
										<a href="{{route('tambah.rombel')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Rombel</a>

										
				</div> -->

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Rombel</button>
												<!-- <ul class="dropdown-menu" style="margin: 0px;">
													<li><a class="dropdown-item" href="{{route('template.excel.user_rfid')}}">Download Template</a>
													</li>
													<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{route('lihat.import.userrfid')}}">Import Siswa</a>
													</li>
												</ul> -->
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Form Tambah Rombel</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="{{ route('simpan.rombel') }}" method="POST">
            @csrf
									
									<!-- <div class="mb-3">
										<label class="form-label">Nama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Nama">
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
											<option value="{{$item->id}}">{{$item->nama}}</option>
											@endforeach
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


				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Name</th>
										<th>Wali Kelas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataRombel as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item['kelas']['nama'] }} {{$item['jurusan']['kode'] }}{{$item['group']['nama'] }}</td>
										<td>{{$item['walas']['nama']}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{ route('edit.rombel',$item->id) }}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{ route('hapus.rombel',$item->id) }}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>

										</td>
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
@endsection