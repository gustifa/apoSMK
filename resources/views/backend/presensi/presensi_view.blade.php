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
								<li class="breadcrumb-item active" aria-current="page">Data Presensi Sholat</li>
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
										<th>RFID_ID</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Status</th>
										<th>Ket</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($dataPresensi as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item['presensi']['Nama']}}</td>
										<td>{{$item['presensi']['RFID_ID']}}</td>
										<td>{{$item['presensi']['Kelas']}}</td>
										<td>{{$item['presensi']['Jurusan']}}</td>
										<td>{{$item->id_peserta_didik}}</td>
										@if ($item->Zuhur === $item->Zuhur )
										<td>{{$item->Zuhur}}</td>
										@else
										<td>{{$item->Ashar}}</td>
										@endif
										
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