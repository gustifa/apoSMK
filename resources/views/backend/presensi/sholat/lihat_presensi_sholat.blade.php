@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

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