@extends('admin.admin_master')
@section('admin')



<!--start page wrapper -->
<div class="page-wrapper">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>RFID_ID</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dataGuru as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td>{{$item->kelas_id}}</td>
										<td>{{$item->mapel_id}}</td>
										<td>{{$item->jurusan_id}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="">Edit</a>
											<a class="btn btn-danger" href="" id="delete">Hapus</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>RFID_ID</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
		</div>
		<!--end page wrapper -->
@endsection