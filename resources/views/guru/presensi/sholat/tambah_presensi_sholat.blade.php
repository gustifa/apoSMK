@extends('guru.guru_master')
@section('guru')

@section('title')
   Tambah Presensi Sholat Oleh Walas
@endsection

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		@if($implode_rombel == !NULL)
				<div class="card radius-10">
					<div class="card-body">
						<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">
										@if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur)
									WAKTU PRESENSI SHOLAT 
									@else
									 <h4 class="form-label">TIDAK JADWAL SHOLAT</h4>
									 @endif
									</h5>
								</div>
								<div class="font-22 ms-auto"> <i id="jam" class="bx bx-time"></i>
								</div>
							</div>
							<hr>

							<form action="{{route('simpan.presensi.sholat.manual')}}" method="post">
								@csrf
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>No</th>
											<th>Nama Siswa</th>
											<th>No Induk</th>
											
											<th>Presensi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($anggota_rombel as $key => $item)
										<input type="hidden" name="peserta_didik_id[]" value="{{$item->peserta_didik_id}}">
										<tr>
											<td>{{$key+1}}</td>
											<td>
												
													
													<div class="ms-0">
														<h6 class="mb-1 font-14">{{$item->peserta_didik->nama}}</h6>
													</div>
												
											</td>
											<td>{{$item->peserta_didik->no_induk}}</td>
											<td>
												@if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur)

												<select name="presensi[]" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
													<option disabled="" selected="">Presensi Sholat Zuhur</option>
													<option value="1">Tidak Sholat</option>
													<option value="2">Sholat Zuhur</option>
													<option value="3">Non Muslim</option>
													<option value="4">Alfa</option>
												</select>
												@elseif($time >= $selectedTimeAshar && $time <= $endTimeAshar)
												<select name="presensi[]" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
													<option disabled="" selected="">Presensi Sholat Ashar</option>
													<option value="11">Tidak Sholat</option>
													<option value="22">Sholat Ashar</option>
													<option value="3">Non Muslim</option>
													<!-- <option value="4">Alfa</option> -->
												</select>
												@else

												<p><code>Belum Jadwal Sholat</code></p>
												@endif
											</td>

											
										</tr>
										@endforeach
									</tbody>
							</table>
							@if($time >= $selectedTimeZuhur && $time <= $endTimeZuhur)
							<div class="col-xl-12">
									<div class="mb-10">
										
										<input type="submit" class="form-control btn btn-outline-primary" value="Simpan">
									</div>
								
							</div>
							
							@endif

						</div>
						</form>
					</div>
				</div>
				@else
				<div class="row">
					<h2 class="font-semibold">Tidak diizinkan</h2>
				</div>

			
				@endif


	</div>
</div>
		<!--end page wrapper -->
<!-- <script type="text/javascript">
    window.onload = function() { jam(); }
   
    function jam() {
     var e = document.getElementById('jam'),
     d = new Date(), h, m, s;
     h = d.getHours();
     m = set(d.getMinutes());
     s = set(d.getSeconds());
   
     e.innerHTML = h +':'+ m +':'+ s;
   
     setTimeout('jam()', 1000);
    }
   
    function set(e) {
     e = e < 10 ? '0'+ e : e;
     return e;
    }
   </script> -->
@endsection