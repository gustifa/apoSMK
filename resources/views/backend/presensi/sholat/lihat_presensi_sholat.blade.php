@extends('guru.guru_master')
@section('guru')

@section('title')
   Lihat Presensi Sholat
@endsection

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
										
										
										<th>Presensi</th>
										<th>Waktu Presensi</th>

										
									</tr>
								</thead>
								<tbody>
									@foreach($dataPresensi as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->peserta_didik->nama}}</td>
									
										
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
										@elseif($item->presensi == 20)
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