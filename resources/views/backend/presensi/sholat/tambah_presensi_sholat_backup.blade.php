@extends('guru.guru_master')
@section('guru')

@section('title')
   Tambah Presensi Sholat
@endsection

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
	
				<div class="card radius-10">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-4">
									<div class="mb-3">
										<label class="form-label">Date:</label>
										<input type="date" class="form-control">
									</div>
								
							</div>
							<div class="col-xl-1">
									<div class="mb-3">
										<label class="form-label"></label>
									</div>
								
							</div>
							<div class="col-xl-4">
									<div class="mb-3">
										<label class="form-label">Date:</label>
										<input type="date" class="form-control">
									</div>
								
							</div>
							<div class="col-xl-3">
									<div class="mb-3">
										<label class="form-label"></label>
										<input type="submit" class="form-control btn btn-primary" value="Cari">
									</div>
								
							</div>
						</div>
							
							<hr>
							<form>
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>No</th>
											<th>Nama Siswa</th>
											<th>NISN</th>
											<th>No Induk</th>
											
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($anggota_rombel as $key => $item)
										<tr>
											<td>{{$key+1}}</td>
											<td>
												
													
													<div class="ms-0">
														<h6 class="mb-1 font-14">{{$item->peserta_didik->nama}}</h6>
													</div>
												
											</td>
											<td>{{$item->peserta_didik->nisn}}</td>
											<td>{{$item->peserta_didik->no_induk}}</td>
											<td>

												<select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
													<option disabled="" selected="">Presensi Sholat</option>
													<option value="1">Tidak Sholat</option>
													<option value="2">Sholat</option>
													<option value="3">Non Muslim</option>
												</select>
											</td>

											
										</tr>
										@endforeach
									</tbody>
							</table>
							<div class="col-xl-12">
									<div class="mb-10">
										
										<input type="submit" class="form-control btn btn-outline-primary" value="Simpan">
									</div>
								
							</div>
						</div>
						</form>
					</div>
				</div>

			
				

	</div>
</div>
		<!--end page wrapper -->
@endsection