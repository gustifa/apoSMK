@extends('guru.guru_master')
@section('guru')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

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
									@foreach($rombel as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->peserta_didik->nama}}</td>
										<td>{{$item->peserta_didik->nisn}}</td>
										<td>{{$item->peserta_didik->no_induk}}</td>
										@if($item->peserta_didik->jenis_kelamin == "P")
										<td>Perempuan</td>
										@else
										<td>Laki-Laki</td>
										@endif
										
										
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
@endsection