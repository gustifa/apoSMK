@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Jurusan</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Jurusan</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->


				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Jurusan</button>
												
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Upload Template User</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="{{ route('simpan.jurusan') }}" method="POST">
            @csrf

									<div class="mb-3">
										<label class="form-label">Nama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Nama Jurusan">
										@error('nama')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div>

									<div class="mb-3">
										<label class="form-label">Kode:</label>
										<input type="text" name="kode" class="form-control" placeholder="Inputkan Kode Jurusan">
										@error('kode')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
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
										<th>Kode</th>
										<th>id</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataJurusan as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td>{{$item->kode}}</td>
										<td>{{$item->id}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{ route('edit.jurusan',$item->id) }}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{ route('hapus.jurusan',$item->id) }}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
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