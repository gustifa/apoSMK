@extends('guru.guru_master')
@section('guru')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
<script src="{{asset('admin/assets/download/js/jquery.min.js')}}"></script> 

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
    						<div class="table-responsive">
                               
                				<table id="records" class="table table-striped table-bordered data-table ">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>PESERTA DIDIK</th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th width="105px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($anggota_rombel_walas as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->peserta_didik->nama}}</td>
                                            <td>{{$item->peserta_didik->no_induk}}</td>
                                            <td>{{$item->peserta_didik->nisn}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('laporan.walas.all', $item->peserta_didik_id)}}" target="_blank">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
    				            <!-- Akhir Datatable -->	

    				        </div>
    				    </div>
				    </div>
				</div>
				

	</div>
</div>




@endsection