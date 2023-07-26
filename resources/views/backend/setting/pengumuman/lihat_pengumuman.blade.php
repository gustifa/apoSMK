@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User Peserta Didik
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	

				<!-- Awal Moodal Import-->
				<!-- AKhir Moodal Import -->


				<hr/>


				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Judul</th>
										<th>Isi Pengumuman</th>
										<
										<th>Aksi</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($pengumuman as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->judul}}</td>
										<td>{{$item->isi_pengumuman}}</td>
										
								
									
										<td style="width: 20px;">
											<a class="btn btn-info" href=""><i class='bx bx-edit mr-1'></i></a>
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
@endsection