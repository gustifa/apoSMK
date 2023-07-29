@extends('guru.guru_master')
@section('guru')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Name</th>
										<th>Jurusan</th>
										<th>Walas</th>
										
										<th>Presensi</th>
										<th>Waktu Presensi</th>
										

										
									</tr>
								</thead>
								<tbody>
									@foreach($dataPresensi as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{($item->presensiSholat->Nama)}}</td>
										<td>{{$item->presensiSholat->kelas->nama}} {{$item->presensiSholat->jurusan->kode}} {{$item->presensiSholat->group->nama}}</td>
										<td>{{$item->presensiSholat->walas->nama}} {{$item->presensiSholat->jurusan->kode}} {{$item->presensiSholat->group->nama}}</td>
										
										@if($item->presensi == 0)
										<td>Tidak Hadir</td>
										@elseif($item->presensi == 1)
										<td>Sholat Zhuhur</td>
										@elseif($item->presensi == 2)
										<td>Sholat Ashar</td>
										@elseif($item->presensi == 3)
										<td>Non Muslim</td>
										@elseif($item->presensi == 4)
										<td>Tidak Hadir</td>
										@elseif($item->presensi == 5)
										<td>Izin</td>
										@elseif($item->presensi == 10)
										<td>Tidak Sholat Zhuhur</td>
										@elseif($item->presensi == 10)
										<td>Tidak Sholat Ashar</td>
										@endif
										<td>{{$item->created_at}}</td>
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