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
<h5>Penguna {{$user->name}} <span class="text-success">Aktif</span></h5>
	<hr />
	
@else
<h4>Pengguna {{$user->name}} <span class="text-danger">Tidak Aktif</span></h4>
<p class="text-danger"> Silahkan Tunggu Admin untuk mengaktifkan</p>

@endif
<h4>Anda Walas {{$dataRombongan_belajar}}</h4> jumlah siswa {{$countSiswa}}


					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						
						
						

					</div><!--end row-->


		



					

			</div>
		</div>
@endsection