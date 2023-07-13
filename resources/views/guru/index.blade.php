@extends('guru.guru_master')
@section('guru')

@php
	
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    $status = $user->status;
@endphp
<div class="page-wrapper">
			<div class="page-content">
			@if($status === 'active')
<h4>Penguna {{$user->name}} <span class="text-success">Aktif</span></h4>
	<hr />
<h5>Selamat Datang Aplikasi Presensi  </h5>
@else
<h4>Pengguna {{$user->name}} <span class="text-danger">Tidak Aktif</span></h4>
<p class="text-danger"> Silahkan Tunggu Admin untuk mengaktifkan</p>
@endif

					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">

										@if(count($guruData) > 0)
										{{$guruData->count()}}
										@else
										0
										@endif

									</h5>
									<div class="ms-auto">
                                        <i class='bx bx-user fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<!-- <div class="progress-bar bg-white" role="progressbar" style="width: {{$guruData->count()}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> -->
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


		<div class="row"> <!--Awal row-->
				<div class="col-lg-6 col-xs-12">
					<div class="box-header with-border">
						<h5 class="box-title"><strong>Identitas Sekolah</strong></h5>
					</div>
										<table class="table table-condensed">
						<tbody><tr>
							<td width="30%">Nama Sekolah</td>
							<td width="70%">: SMK N 1 KINALI</td>
						</tr>
					<tr>
						<td>NPSN</td>
						<td>: 10308183</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: Jln. TEUKU UMAR KM.1 KAPUNDUANG</td>
					</tr>
					<tr>
						<td>Kodepos</td>
						<td>: 26367</td>
					</tr>
					<tr>
						<td>Desa/Kelurahan</td>
						<td>: KINALI</td>
					</tr>
					<tr>
						<td>Kecamatan</td>
						<td>: Kec. Kinali</td>
					</tr>
					<tr>
						<td>Kabupaten/Kota</td>
						<td>: Kab. Pasaman Barat</td>
					</tr>
					<tr>
						<td>Provinsi</td>
						<td>: Prov. Sumatera Barat</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: smkn1_kinali@yahoo.com</td>
					</tr>
					<tr>
						<td>Website</td>
						<td>: http://www.smkn1kinali.sch.id</td>
					</tr>
					<tr>
											<td>Kepala Sekolah</td>
						<td>: SYAHRUL, M.Pd.</td>
					</tr>
				</tbody></table>
			</div>
			<div class="col-lg-6 col-xs-12">
				<div class="box-header with-border">
					<h5 class="box-title"><strong>Informasi Aplikasi</strong></h5>
				</div>
						<table class="table table-condensed">
					<tbody><tr>
						<td width="30%">Nama Aplikasi</td>
						<td width="70%">: e-lspSMK</td>
					</tr>
					<tr>
						<td>Versi Aplikasi</td>
						<td>: 1.0.0</td>
					</tr>
					<tr>
						<td>Versi Database</td>
						<td>: 4.0.5</td>
					</tr>
					<tr>
						<td>Status Penilaian</td>
						<td>: <div class="btn-group" id="status" data-toggle="buttons">
							<label class="btn btn-default btn-on btn-sm">
							<input class="status" type="radio" value="1" name="status">AKTIF</label>
							<label class="btn btn-default btn-off btn-sm active">
							<input class="status" type="radio" value="0" name="status" checked="">Non AKtif</label>
						  </div>
						</td>
					</tr>
					<tr>
						<td>Group Diskusi</td>
						<td>: <a href="" target="_blank" class="btn btn-sm btn-social btn-facebook"><i class="fa fa-facebook"></i>FB Group</a> <a href="" target="_blank" class="btn btn-sm btn-social btn-info"><i class="fa fa-paper-plane"></i>Telegram</a></td>
					</tr>
					<tr>
						<td>Tim Helpdesk</td>
						<td>
							<a class="btn btn-sm btn-block btn-social btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=6285274817886&amp;text=NPSN:10308183"><i class="fa fa-whatsapp"></i> Gustifa Fauzan [085274817886]</a>
							
						</td>
					</tr>
				</tbody></table>
			</div>
		</div> <!--Akhir row-->
				



					 <!--  <div class="card radius-10">
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
					</div> -->

			</div>
		</div>
@endsection