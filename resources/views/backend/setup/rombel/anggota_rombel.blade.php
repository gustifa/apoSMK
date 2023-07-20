@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat Rombel
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="mb-3">
										<label class="form-label">Jurusan:</label>
											<select name="rombongan_belajar_id" class="form-select" id="exampleFormControlSelect1">
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
							<table id="example" class="table table-striped table-bordered" style="width:100%">
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
							</table>
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	


				
			</div>
		</div>
		<!--end page wrapper -->
@endsection