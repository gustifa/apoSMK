@extends('guru.guru_master')
@section('guru')

@section('title')
   Dashboard Guru
@endsection

@php
	
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    $status = $user->status;
@endphp
<div class="page-wrapper">
			<div class="page-content">
			<!-- Awal Row -->
			@if($status === 'active')
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="card border-primary">
						<div class="card-body">
							<h5 class="mb-0"><i class="fadeIn animated bx bx-home"> Selamat Datang </i></h5>
							<hr>
							<div class="col-12 col-lg-12 col-xl-12 d-flex">

								
							<h5>Pengguna <b>{{$user->name}}</b> Anda <span class="text-success">Aktif</span> dan 
								@if($dataRombongan_belajar == !NULL)
							Walas {{$kelas_nama}} {{$jurusan_kode}}{{$group_nama}}</h5>
								@else
								Bukan Walas
								@endif
								
							
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Row -->

			<!-- Awal Row -->
			<div class="row">
				<div class="col-lg-9 col-xl-9">
					<div class="card border-primary">
						<div class="card-body">
							<h5 class="mb-0"><i class="fadeIn animated bx bx-volume-full"> Pengumuman</i></h5>
							<hr>
							<div class="col-12 col-lg-12 col-xl-12 d-flex">
								<div class="container py-2">
								<!-- <h2 class="font-weight-light text-center text-muted py-3">Timeline Example 1</h2> -->
								<!-- timeline item 1 -->
								@if( $implodeupdate == !NULL)
								@foreach($pengumuman_updated as $item)
							<div class="row">
								<!-- timeline item 1 left dot -->
								<div class="col-auto text-center flex-column d-none d-sm-flex">
									<div class="row h-50">
										<div class="col">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
									<h5 class="m-2">
									<span class="badge rounded-pill bg-light border">&nbsp;</span>
								</h5>
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
								</div>
								<!-- timeline item 1 event content -->
								<div class="col py-2">
									
										
											<div class="float-end text-muted">{{$item->created_at}}</div>
											<h5 class="card-title text-muted">{{$item->judul}}</h5>
											<p class="card-text">{{$item->isi_pengumuman}}.</p>
												<hr class="border border-transparent" />
										</div>
									
								
							</div>

							@endforeach
							@endif
							<!--/row-->
								
								<!-- timeline item 2 -->
								@if( $implodePengumuman == !NULL)
								@foreach($pengumuman_select as $item)
								<div class="row">
									<div class="col-auto text-center flex-column d-none d-sm-flex">
										<div class="row h-50">
											<div class="col border-end">&nbsp;</div>
											<div class="col">&nbsp;</div>
										</div>
										<h5 class="m-2">
										<span class="badge rounded-pill bg-primary">&nbsp;</span>
									</h5>
										<div class="row h-50">
											<div class="col border-end">&nbsp;</div>
											<div class="col">&nbsp;</div>
										</div>
									</div>
									<div class="col py-2">

												<div class="float-end text-primary">{{$item->created_at}}</div>
												<h5 class="card-title text-primary">{{$item->judul}}</h5>
												<p class="card-text">{{$item->isi_pengumuman}}.</p>
													<hr class="border border-transparent" />
												<!-- <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-target="#t2_details" data-bs-toggle="collapse">Show Details ▼</button>
												<div class="collapse border" id="t2_details">
													<div class="p-2 text-monospace">
														<div>08:30 - 09:00 Breakfast in CR 2A</div>
														<div>09:00 - 10:30 Live sessions in CR 3</div>
														<div>10:30 - 10:45 Break</div>
														<div>10:45 - 12:00 Live sessions in CR 3</div>
													</div>
											
												</div> -->
									</div>
								</div>
								@endforeach
								@endif
								<!--/row-->
								
								<!-- timeline item 4 -->
								@if($pengumuman == !NULL)
								@foreach($pengumuman as $item)
								<div class="row">
									<div class="col-auto text-center flex-column d-none d-sm-flex">
										<div class="row h-50">
											<div class="col border-end">&nbsp;</div>
											<div class="col">&nbsp;</div>
										</div>
										<h5 class="m-2">
										<span class="badge rounded-pill bg-light border">&nbsp;</span>
									</h5>
										<div class="row h-50">
											<div class="col">&nbsp;</div>
											<div class="col">&nbsp;</div>
										</div>
									</div>
									<div class="col py-2">
										
												<div class="float-end text-muted">{{$item->created_at}}</div>
												<h5 class="card-title">{{$item->judul}}</h5>
												<p>{{$item->isi_pengumuman}}.</p>
													<hr class="border border-transparent" />
											</div>
										
								</div>
								@endforeach
								@endif
								<!--/row-->
							</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Akhir Col -->
				<div class="col-lg-3 col-xl-3">
					<div class="row">
						<!-- awal col -->
						<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">

										<h5 class="mb-0"><i class="fadeIn animated bx bx-user"> Total Siswa</i></h5>
										<!-- <div class="card radius-10 overflow-hidden"> -->
										   	<div class="card-body">
														 <!-- <p>Website Sessions</p> -->
														 <a href="{{route('lihat.anggota.rombel.walas')}}"><h3>{{$countSiswa}}</h3></a>
														 <!-- <p class="mb-0">Detail <span class="float-end">500k</span></p> -->
											   </div>
												<!-- <div class="progress-wrapper">
														<div class="progress" style="height: 7px;">
														  <div class="progress-bar" role="progressbar" style="width: 75%"></div>
														</div>
												</div> -->
										<!-- </div> -->
										
									</div>
								</div>
						<!-- Akhir Col -->

						<!-- awal col -->
						<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">
										<h6 class="mb-0">Total Sholat Zuhur</h6>
										<!-- <div class="card radius-10 overflow-hidden"> -->
										   	<div class="card-body">
														 <!-- <p>Website Sessions</p> -->
														 
														 <h3>{{$countZuhur}}</h3>
														 
														 <p class="mb-0">{{$persenZuhur}}% <span class="float-end"> {{$countZuhur}}</span></p>
											   </div>
													<div class="progress-wrapper">
														<div class="progress" style="height: 7px;">
														  <div class="progress-bar" role="progressbar" style="width: {{$persenZuhur}}%"></div>
														</div>
												</div>
										<!-- </div> -->
										
									</div>
								</div>
						<!-- Akhir Col -->
						<!-- awal col -->
						<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">
										<h6 class="mb-0">Total Sholat Ashar</h6>
										<!-- <div class="card radius-10 overflow-hidden"> -->
										   	<div class="card-body">
														 <!-- <p>Website Sessions</p> -->
														 
														 <h3>{{$countAshar}}</h3>
														 
														 <p class="mb-0">{{$persenAshar}}% <span class="float-end"> {{$countAshar}}</span></p>
											   </div>
													<div class="progress-wrapper">
														<div class="progress" style="height: 7px;">
														  <div class="progress-bar" role="progressbar" style="width: {{$persenAshar}}%"></div>
														</div>
												</div>
										<!-- </div> -->
										
									</div>
								</div>
						<!-- Akhir Col -->
						<!-- awal col -->
						<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">
										<h6 class="mb-0">Catatan Kasus</h6>
										<!-- <div class="card radius-10 overflow-hidden"> -->
										   	<div class="card-body">
														 <!-- <p>Website Sessions</p> -->
														 <h3>652.9K</h3>
														 <p class="mb-0">72% <span class="float-end">500k</span></p>
											   </div>
													<div class="progress-wrapper">
														<div class="progress" style="height: 7px;">
														  <div class="progress-bar" role="progressbar" style="width: 75%"></div>
														</div>
												</div>
										<!-- </div> -->
										
									</div>
								</div>
						<!-- Akhir Col -->
							<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">
											<div class="card-body text-center px-0">
												 <h6 class="text-uppercase">JUMLAH SISWA</h6>
												 <div class="chart-container-10 d-flex align-items-center justify-content-center">
												   <div id="total-visitors"></div>
												</div>
											   </div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-xl-12" >
								<div class="card border-primary">
									<div class="card-body">
										<h6 class="mb-0">Catatan Kasus</h6>
										<!-- <div class="card radius-10 overflow-hidden"> -->
										   	<div class="card-body">
														 <!-- <p>Website Sessions</p> -->
														 <h3>652.9K</h3>
														 <p class="mb-0">72% <span class="float-end">500k</span></p>
											   </div>
													<div class="progress-wrapper">
														<div class="progress" style="height: 7px;">
														  <div class="progress-bar" role="progressbar" style="width: 75%"></div>
														</div>
												</div>
										<!-- </div> -->
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>


			</div>
			<!-- Akhir Row -->

			<!-- Awal Row -->
			@else
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="card border-primary">
						<div class="card-body">
							<h5 class="mb-0"><i class="fadeIn animated bx bx-home"> Selamat Datang </i></h5>
							<hr>

							<div class="col-12 col-lg-12 col-xl-12 d-flex">
								
							<h5>Penguna {{$user->name}} <span class="text-danger">Tidak Aktif</span> Silahkan Hubungi Admin untuk diaktifkan</h5>
							
							

							
							</div>

							
				
			</div>


		</div>

			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="card border-primary">
						<div class="card-body">

							<div class="col-lg-12 col-xs-12">
					
					<table class="table table-condensed">
						<tbody>

						
						
						<tr>
							<td rowspan="2">Admin / Tim Helpdesk</td>
							<td>: <a class="btn btn-sm btn-block btn-social btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=6285274817886&amp;text=NPSN:10308183"><i class="fa fa-whatsapp"></i> Gustifa Fauzan [085274817886]</a>
								
							</td>
						</tr>
						<tr>

							<td>: <a class="btn btn-sm btn-block btn-social btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=085264931363&amp;text=NPSN:10308183"><i class="fa fa-whatsapp"></i> Hidayat Putra [085264931363]</a>
								
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

			
		</div>
				</div>
			</div>
			@endif
			<!-- Akhir Row -->
	

	



					

			</div>
		</div>
@endsection