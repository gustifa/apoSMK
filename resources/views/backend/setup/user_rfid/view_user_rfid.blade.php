@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User RFID
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	

				<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Import</button>
												<ul class="dropdown-menu" style="margin: 0px;">
													<li><a class="dropdown-item" href="{{route('download.template.user.rfid')}}">Download Template</a>
													</li>
													<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Import Siswa</a>
													</li>

													
												</ul>
											</div>


										</div>	
										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<a href="{{route('export.userrfid')}}"><button type="button" class="btn btn-primary" aria-expanded="false"><i class="fadeIn animated bx bx-cloud-download"></i> Download</button></a>
												
											</div>

											
										</div>

										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<a href="{{route('all.delete.user.rfid')}}" id="delete"><button type="button" class="btn btn-danger" aria-expanded="false"><i class="fadeIn animated bx bx-x-circle mr-1"></i> Kosongkan Table</button></a>
												
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
														<form action="{{ route('import.user.rfid') }}" method="POST" enctype="multipart/form-data">
										            	@csrf

														<div class="mb-3">
															<!-- <label class="form-label">Agama:</label> -->
															<input type="file" name="file" class="form-control" placeholder="Inputkan Agama">
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
									<th style="width: 8px;">No</th>
										<th>Nama</th>
										<th>NIS</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Group</th>
										<th>RFID_ID</th>
										<th>Walas</th>
										<td style="width: 20px;">
								</thead>
								<tbody>

									@foreach($dataRfid as $key => $item)

									@if($item->Walas_id == NULL)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->Nama}}</td>
										<td>{{$item->Nis}}</td>
										<td>{{$item->kelas->nama}}</td>
										<td>{{$item->jurusan->kode}}</td>
										<td>{{$item->group->nama}}</td>
										<td>{{$item->RFID_ID}}</td>
										<td>Belum ditentukan</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{route('user.rfid.edit', $item->id)}}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{route('user.rfid.delete',$item->id )}}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
										</td>
									</tr>
									@else
										<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->Nama}}</td>
										<td>{{$item->Nis}}</td>
										<td>{{$item->kelas->nama}}</td>
										<td>{{$item->jurusan->kode}}</td>
										<td>{{$item->group->nama}}</td>
										<td>{{$item->RFID_ID}}</td>
										<td>{{$item->walas->nama}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{route('user.rfid.edit', $item->id)}}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="{{route('user.rfid.delete',$item->id )}}" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
										</td>
									</tr>
									@endif
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