@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<a href="{{route('guru.generate')}}"><button type="button" class="btn btn-dark" aria-expanded="false"><i class="fadeIn animated bx bx-cloud-download"></i> Generate Guru</button></a>
												
											</div>
										</div>
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Import</button>
												<ul class="dropdown-menu" style="margin: 0px;">
													<li><a class="dropdown-item" href="{{route('template.excel.guru')}}">Download Template</a>
													</li>
													<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Import Guru</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<a href=""><button type="button" class="btn btn-dark" aria-expanded="false"><i class="fadeIn animated bx bx-cloud-download"></i> Download</button></a>
												
											</div>
										</div>

										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<a href="" id="delete"><button type="button" class="btn btn-dark" aria-expanded="false"><i class="fadeIn animated bx bx-cloud-download"></i> Kosongkan Table</button></a>
												
											</div>
										</div>



										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Upload Template Guru</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data">
            @csrf

									<div class="mb-3">
										<!-- <label class="form-label">Agama:</label> -->
										<input type="file" name="file" class="form-control" placeholder="Inputkan Agama">
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

								<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Email</th>
										<th>Password</th>
										<th style="width: 130px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataGuru as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->username}}</td>
										<td>{{$item->email}}</td>
										<td>{{$item->username}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" href=""><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{route('hapus.user.guru', $item->id)}}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
											<a class="btn btn-danger" href=""><i class='bx bx-x-circle mr-1'></i>Print</a>

										</td>
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div>




<!-- 				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Mata Pelajaran</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataGuru as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td>{{$item->mapel_id}}</td>
										<td>{{$item->kelas_id}}</td>
										<td>{{$item->jurusan_id}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="">Edit</a>
											<a class="btn btn-danger" href="" id="delete">Hapus</a>
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