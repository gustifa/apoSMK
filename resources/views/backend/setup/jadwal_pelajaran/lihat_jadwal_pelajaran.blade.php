@extends('admin.admin_master')
@section('admin')
@section('title')
   Lihat Jurusan
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Jadwal PBM</button>
												
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Pelajaran</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="{{ route('simpan.jadwal.pelajaran') }}" method="POST">
            @csrf

									<div class="mb-3">
										<label class="form-label">Nama Jadwal:</label>
										<input type="text" name="nama_jadwal" class="form-control" placeholder="Nama Jadwal>
										@error('nama_jadwal')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div>

                                    <div class="mb-3">
										<label class="form-label">Jadwal:</label>
										<input type="time" name="jadwal" class="form-control" ">
										@error('jadwal')
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
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
                                        <th>Nama Jadwal</th>
										<th>Jadwal</th>
										

										<th>Aksi</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($jadwalpelajaran as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama_jadwal}}</td>
                                        <td>{{$item->jadwal}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{ route('edit.jadwal.pelajaran',$item->id) }}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{ route('hapus.jadwal.pelajaran',$item->id) }}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
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
@endsection