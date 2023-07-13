@extends('guru.guru_master')
@section('guru')
<div class="page-wrapper">
			<div class="page-content">

					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">

										@if(count($adminData) > 0)
										{{$adminData->count()}}
										@else
										0
										@endif

									</h5>
									<div class="ms-auto">
                                        <i class='bx bx-user fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<!-- <div class="progress-bar bg-white" role="progressbar" style="width: {{$adminData->count()}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> -->
								</div>
								<a href="{{route('lihat.user')}}">
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total User </p>

								</div>
								</a>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-orange">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">

										@if(count($dataUserRfid) > 0)
										{{$dataUserRfid->count()}}
										@else
										0
										@endif
										


									</h5>
									<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<!-- <div class="progress-bar bg-white" role="progressbar" style="width: %" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> -->
								</div>
								<a href="{{route('lihat.user')}}">
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total User RFID</p>
								</div>
								</a>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-ohhappiness">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">
										@if(count($tabelsholat) > 0)
										{{$tabelsholat->count()}}
										@else
										0
										@endif

										

									</h5>
									<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total Siswa</p>
									
								</div>
							</div>
						</div>
						</div>
						
						

					</div><!--end row-->
				



					  <div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">
									Real Time Presensi <span id="time">
									@php
										$mytime = Carbon\Carbon::now();
										$mytime->setTimezone('+7:00');

									@endphp
									{{$mytime}}
									</span>
								</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Name</th>
										<th>Zuhur</th>
										<th>Ashar</th>
										<th>Status</th>
										<th>Ket</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tabelsholat as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->siswa_id}}</td>
										<td>{{$item->Zuhur}}</td>
										<td>{{$item->Ashar}}</td>
										<td>Waktu</td>
										<td>Status</td>
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
@endsection