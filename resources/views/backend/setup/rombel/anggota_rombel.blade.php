@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat Rombel
@endsection
<script src="{{asset('adminbackend/assets/download/js/jquery.min.js')}}"></script>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="mt-2-3">
										<label class="form-label">Jurusan:</label>
											<select name="rombongan_belajar_id" class="form-select text-secondary" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Rombel</option>
                                                        @foreach($rombonganBelajar as $item)
                                                        <option value="{{$item->rombongan_belajar_id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
				



				<hr/>

				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Jurusan</th>
										<th>Nama Walas</th>
										<th>Nama Siswa</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								@foreach($anggotaRombel as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->rombongan_belajar->nama}}</td>
										<td>{{$item->rombongan_belajar->walas->nama}}</td>
										<td>{{$item->peserta_didik->nama}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href=""><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a>

										</td>
									</tr>
									@endforeach
								</tbody>	
							</table> -->
							<table id="rombel" class="table table-striped table-bordered" style="width:100%">
								<div class="mt-2 text-gray-800">
									<h4 class="form-label table-bordered text-secondary"><i class="bx bx-data"> Anggota Rombongan Belajar</i></h4>
								</div>
								
							</table>

							
						</div>
					</div>
				</div>
				<!-- Akhir Datatable	


				
			</div>
		</div>
		--end page wrapper -->

<script type="text/javascript">
       $(document).ready(function() {
        $('select[name="rombongan_belajar_id"]').on('change', function(){
            var rombongan_belajar_id = $(this).val();
            if(rombongan_belajar_id) {
                $.ajax({
                    url: "{{  url('/setup/anggota-rombel/ajax') }}/"+rombongan_belajar_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('#rombel').html('');
                       var d =$('#rombel').empty();
                          $.each(data, function(key, value){
                              $('#rombel').append(
                              	'<table class="table table-striped table-bordered" style="width:100%"><thead><tr><th>Nama Siswa</th><th>NISN</th></tr></thead><tbody><tr><td>'+value.peserta_didik_id +'</td><td>'+value.rombongan_belajar_id +'</td></tr></tbody></table>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
     });

</script>
@endsection