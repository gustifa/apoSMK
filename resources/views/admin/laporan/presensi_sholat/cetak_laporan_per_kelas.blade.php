@extends('admin.admin_master')
@section('admin')

@section('title')
   Laporan Presensi Sholat 
@endsection
<!-- <script src="{{asset('admin/assets/download/js/jquery-3.5.1.js')}}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                            <form id="myForm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-label">
                                            <label>Filter Kelas</label>
                                        </div>
                                        <div class="input-group mb-3">
                                        <select name="rombongan_belajar_id" id="rombongan_belajar_id" class="form-select form-control" >
                                            <option selected="" disabled="">Filter Kelas</option>
                                            @foreach($dataRombel as $item)
                                            <option value="{{$item->rombongan_belajar_id}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">
                                            <label>Tanggal Awal</label>
                                        </div>
                                        <div class="input-group mb-3">
                                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="Cari Nama Peserta Didik">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-label">
                                            <label>Tanggal Akhir</label>
                                        </div>
                                        <div class="input-group mb-3">
                                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" placeholder="Cari Tanggal Akhir">
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <a class="btn btn-primary form-control" href="" onclick="this.href='/laporan/cetak-per-kelas/'+document.getElementById('rombongan_belajar_id').value+ '/' +document.getElementById('tgl_awal').value+ '/' +document.getElementById('tgl_akhir').value" target="_blank">Cetak Per Tanggal</a>
                                        <!-- <button class="btn btn-primary form-control" type="submit">Cetak</button> -->
                                    </div>
                                </div>
                            </form>	
    				    </div>
				    </div>
				</div>
				<!-- </div> -->
				

	</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                presensi: {
                    required : true,
                },

                date: {
                    required : true,
                },  


            },
            messages :{
                presensi: {
                    required : 'Silahkan Filter Presensi',
                },

                date: {
                    required : 'Pilih Tanggal',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


@endsection