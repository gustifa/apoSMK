@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User RFID
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	
				<!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Hak Akses</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat User RFID</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->

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
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<!-- <th style="width: 8px;">No</th> -->
										<th>Nama</th>
										<th>RFID ID</th>

										<th style="width: 20px;">Action</th>
								</thead>
								<tbody>
									<!-- @php $no=1; @endphp -->
									@foreach($dataRfid as $key => $item)
									@if($item->rfid_id == !NULL)
									@php
									$a = 1;
									@endphp
									<tr>
										<!-- <td>{{$no}}</td> -->
										<td>{{$item->nama}}</td>
										<td>{{$item->rfid_id}}</td>
										
										<td style="width: 20px;">
											<a class="btn btn-info" href=""><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
										</td>
									</tr>
									@endif
									<!-- @php $no++; @endphp -->
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