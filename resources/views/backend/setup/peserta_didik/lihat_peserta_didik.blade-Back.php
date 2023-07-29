@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User Peserta Didik
@endsection
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="{{asset('adminbackend/assets/download/jquery.min.js')}}"></script>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	

				


				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										
										<th>nama</th>
									
										
									</tr>
								</thead>
								<tbody>

								</tbody>	
							</table>
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	

			</div>
		</div>
		<!--end page wrapper -->
<script type="text/javascript">
	$(document).ready (function () {
		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('get.peserta.didik')}}',
				columns: [
					{data: 'nama', name: 'nama'}
				
				]
		});
	});
</script>
@endsection



<!--  -->

@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User Peserta Didik
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	

				<!-- Awal Moodal Import-->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Import Peserta Didik</button>
												<ul class="dropdown-menu" style="margin: 0px;">
													<li><a class="dropdown-item" href="{{route('download.template.user.rfid')}}">Download Template</a>
													</li>
													<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Import </a>
													</li>

													
												</ul>
											</div>


										</div>	
										
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Upload Template Peserta Didik</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="{{ route('import.peserta_didik') }}" method="POST" enctype="multipart/form-data">
										            	@csrf

														<div class="mb-3">
															<!-- <label class="form-label">Agama:</label> -->
															<input type="file" name="file" class="form-control" placeholder="Inputkan Agama">
														</div>
													</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>	<!-- AKhir Moodal Import -->


				<hr/>


				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Nama Peserta Didik</th>
										<th>No Induk</th>
										<th>NIK</th>
										<th>NISN</th>
										<th>Akun RFID</th>
										<th>Aksi</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($dataPeserta_didik as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td>{{$item->no_induk}}</td>
										<td>{{$item->nik}}</td>
										<td>{{$item->nisn}}</td>
											@if($item->rfid_id == !NULL)
										<td>

										
												<i class='bx bx-check text-success'> Terdaftar</i>


										</td>
										@else
										<td>
										<i class='bx bx-x text-danger'> Belum Terdaftar</i>
										</td>
										@endif
								
								
									
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{route('edit.peserta.didik',$item->peserta_didik_id )}}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>	
							</table>
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	

			</div>
		</div>
		<!--end page wrapper -->
<script type="text/javascript">
	$(function () {
		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: 'penjualan/json',
				columns: [
					{data: 'id' , name: 'id'},
					{data: 'id' , name: 'id'},
					
				]
		});
	});
</script>
@endsection