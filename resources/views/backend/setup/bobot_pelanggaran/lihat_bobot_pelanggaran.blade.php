@extends('admin.admin_master')
@section('admin')
@section('title')
   Lihat Bobot Pelanggaran
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Bobot Pelanggaran</button>
												
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Pelanggaran</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="{{ route('simpan.bobot.pelanggaran') }}" method="POST">
            @csrf

									<div class="mb-3">
										<label class="form-label">Nama Pelanggaran:</label>
										<input type="text" name="nama_pelanggaran" class="form-control"> placeholder="Nama Jadwal>
										@error('nama_pelanggaran')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div>

                                    <div class="mb-3">
										<label class="form-label">Bobot:</label>
										<input type="number" name="bobot" class="form-control">
										@error('bobot')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div>
									
									<!-- <div class="mb-3">
										<button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Simpan</button>
									</div> -->
								

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
				<!-- <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 10px;">No</th>
                              <th style="width: 15px;">Jenis Pelanggaran</th>
                              <th style="width: 40px;">Nama Pelanggaran</th>
										<th style="width: 20%;">Bobot</th>
										

										<th style="width: 20%;">Aksi</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($bobotPelanggaran as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td style="width: 20%;">{{$item->jenis_pelanggaran}}</td>
										<td style="width: 20%;">{{$item->nama_pelanggaran}}</td>
                                        <td>{{$item->bobot}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{ route('edit.bobot.pelanggaran',$item->id) }}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{ route('hapus.bobot.pelanggaran',$item->id) }}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div> -->
				<!-- Akhir Datatable -->

				<div class="row">
					<div class="col-xl-12 mx-auto">
						
						<div class="card">
							<div class="card-body">
								@foreach($bobotPelanggaran as $key => $item)
								<div class="row">
									<div class="col-xl-1">
										<label class="form-label">No:</label>
										<input disabled="" class="form-control form-control-lg mb-3" type="text" value="{{$key+1}}" aria-label=".form-control-lg example">
									</div>
									<div class="col-xl-2">
										<label class="form-label">Jenis Pelanggaran:</label>
										<input disabled="" class="form-control form-control-lg mb-3" type="text" value="{{$item->jenis_pelanggaran}}" aria-label=".form-control-lg example">
									</div>
									<div class="col-xl-8">
										<label class="form-label">Nama Pelanggaran:</label>
										<input class="form-control form-control-lg mb-3" type="text" value="{{$item->nama_pelanggaran}}" aria-label=".form-control-lg example">

									</div>
									<div class="col-xl-1">
										<label class="form-label">Bobot:</label>
										<input class="form-control form-control-lg mb-3" type="text" value="{{$item->bobot}}" aria-label=".form-control-lg example">
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<!--end row-->	

				
			</div>
		</div>
		<!--end page wrapper -->
@endsection