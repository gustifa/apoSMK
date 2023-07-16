@extends('admin.admin_master')
@section('admin')

@section('title')
   Agama
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Agama</button>
												
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
				<form action="{{ route('simpan.agama') }}" method="POST">
            @csrf

									<div class="mb-3">
										<label class="form-label">Agama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Agama">
										@error('nama')
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


<!-- 				<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
									<tr>
										<th style="width: 5px;">No</th>
										<th>Name</th>
										<th style="width: 130px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataAgama as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td>
											<a class="btn-info" href="{{ route('edit.agama',$item->id) }}"><i class='bx bx-edit mr-50'></i></a>
											<a class="btn-danger" href="{{ route('hapus.agama',$item->id) }}" id="delete"><i class='bx bx-x-circle mr-50'></i></a>

										</td>
									</tr>
									@endforeach
								</tbody>
								</table>
							</div>
				</div> -->



				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Name</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataAgama as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{ route('edit.agama',$item->agama_id) }}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{ route('hapus.agama',$item->agama_id) }}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>

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