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
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Orders Summary</h5>
									<!-- <div class="row">
										<div class="col-lg-12">
											<div class="col-lg-6">
													<div class="mb-3">
														<input type="datetime-local" class="form-control">
													</div>
												
											</div>

											<div class="col-lg-6">
												
												<div class="mb-3">
													<input type="submit" class="form-control btn btn-primary" value="Cari">
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="col-lg-6">
												
												<div class="mb-3">
													<input type="submit" class="form-control btn btn-primary" value="Cari">
												</div>
											</div>
										</div>
									</div> -->
									
									
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>No</th>
											<th>Nama Siswa</th>
											<th>Customer</th>
											<th>Date</th>
											<th>Price</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($anggota_rombel as $key => $item)
										<tr>
											<td>{{$key+1}}</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="assets/images/icons/chair.png" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$item->peserta_didik->nama}}</h6>
													</div>
												</div>
											</td>
											<td>Brooklyn Zeo</td>
											<td>12 Jul 2020</td>
											<td>$64.00</td>
											<td>
												<div class="badge rounded-pill bg-light-info text-info w-100">In Progress</div>
											</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
													<a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

			</div>
				<!-- Awal table -->

					<!-- <div class="table-responsive">
								<table class="table align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th>No</th>
											<th>Nama Siswa</th>
											<th>Sholat</th>
											<th>Tidak Sholat</th>
											<th>Price</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($anggota_rombel as $key => $item)
										<tr>
											<td>
											<div class="ms-0">{{$key+1}} </div>
											</td>
											<td>
												
													
													<div class="ms-0">
														<h6 class="mb-1 font-14">{{$item->peserta_didik->nama}}</h6>
													</div>
											
											</td>
											<td>Brooklyn Zeo</td>
											<td>12 Jul 2020</td>
											<td>$64.00</td>
											<td>
												<div class="badge rounded-pill bg-light-info text-info w-100">In Progress</div>
											</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
													<a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
												</div>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
							</div>
						</div> -->

						<!-- Akhir Table -->
			



	</div>
</div>
		<!--end page wrapper -->
@endsection