@extends('admin.admin_master')
@section('admin')

@section('title')
   Laporan Presensi Sholat 
@endsection


<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
        <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Laporan</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Laporan Presensi</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->
				<div class="mt-2-3">
					<div class="card">
					<div class="card-body">
                    <div class="input-group mb-3">
                        <select name="presensi" id="presensi" class="form-select">
                            <option disabled="" selected="">Filter Presensi</option>
                            <option value="2">Zhuhur</option>
                            <option value="22">Ashar</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="Cari Nama Peserta Didik">
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="Cari Tanggal Akhir">
                    </div>
                    <div class="input-group mb-3">
                        <a class="btn btn-primary form-control" href="" onclick="this.href='/laporan/cetak-per-tanggal/'+document.getElementById('presensi').value+ '/' +document.getElementById('tgl_awal').value+ '/' +document.getElementById('tgl_akhir').value" target="_blank">Cetak Per Tanggal</a>
                        <!-- <button class="btn btn-primary form-control" type="submit">Cetak</button> -->
                    </div>
                    
                
						
				</div>
				</div>
				</div>
				</div>
				

	</div>
</div>


@endsection