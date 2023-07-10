@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Presensi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Agama</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Name</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>RFID_ID</th>
										<!-- <th>Aksi</th> -->
									</tr>
								</thead>
								<tbody>
									@foreach($dataRfid as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->Nama}}</td>
										<td>{{$item->Kelas}}</td>
										<td>{{$item->Jurusan}}</td>
										<td>{{$item->RFID_ID}}</td>
										<!-- <td style="width: 20px;">
											<a class="btn btn-info" href="">Edit</a>
											<a class="btn btn-danger" href="" id="delete">Hapus</a>
										</td> -->
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