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
			@if($status === 'active')
<h5>Penguna {{$user->name}} <span class="text-success">Aktif</span> Anda Walas {{$dataRombongan_belajar}}</h5>
	<hr />
	
@else
<h4>Pengguna {{$user->name}} <span class="text-danger">Tidak Aktif</span></h4>
<p class="text-danger"> Silahkan Tunggu Admin untuk mengaktifkan</p>

@endif



					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Jumlah Siswa {{$dataRombongan_belajar}} </p>
										<h4 class="my-1">{{$countSiswa}}</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>Total Siswa</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-wallet'></i>
									</div>
								</div>
								<div id="chart1"></div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Jumlah Prestasi</p>
										<h4 class="my-1">8.4K</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
								<div id="chart2"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Kasus</p>
										<h4 class="my-1">59K</h4>
										<!-- <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p> -->
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
									</div>
								</div>
								<div id="chart3"></div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			


		



					

			</div>
		</div>
@endsection