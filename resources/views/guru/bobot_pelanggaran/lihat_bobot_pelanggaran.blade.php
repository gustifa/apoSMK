@extends('guru.guru_master')
@section('guru')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			@if($implode_rombel == !NULL)
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive">
							
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Nama Siswa</th>
										<th>NISN</th>
										<th>Nomor Induk</th>
										<th>JK</th>
										
										
										
										

										
									</tr>
								</thead>
								<tbody>
									@foreach($kasusPelanggaran as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->bobot_pelanggaran_id}}</td>
										<td>{{$item->guru_id}}</td>
										<td>{{$item->peserta_didik_id}}</td>
										
										<td>{{$item->keterangan}}</td>
										
										
										
									</tr>
									@endforeach
								</tbody>
								
							</table>
							
						</div>
						
					</div>
				</div>
				@endif
			</div>
		</div>
		<!--end page wrapper -->
@endsection