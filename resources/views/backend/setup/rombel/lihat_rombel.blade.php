@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat Rombel
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				

	<!-- Awal Moodal -->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-plus-square'></i> Rombel</button>
												
											</div>
										</div>

										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Tambah Rombongan Belajar</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
				<form action="{{ route('simpan.rombel') }}" method="POST">
            @csrf

									<div class="mb-3">
										<label class="form-label">Nama Rombel:</label>
										<input type="text" name="nama" class="form-control" placeholder="Nama Kelas">
										@error('nama')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
									</div>

                                   
									
									<div class="mb-3">
										<label class="form-label">Kelas:</label>
											<select name="kelas_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Kelas</option>
                                                        @foreach($kelas as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Kelas')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
									<div class="mb-3">
										<label class="form-label">Jurusan:</label>
											<select name="jurusan_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Jurusan</option>
                                                        @foreach($jurusan as $item)
                                                        <option value="{{$item->id}}">{{$item->kode}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
									<div class="mb-3">
										<label class="form-label">Group:</label>
											<select name="group_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Group</option>
                                                        @foreach($group as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Group')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									<div class="mb-3">
										<label class="form-label">Walas:</label>
											<select name="guru_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Walas</option>
                                                        @foreach($dataGuru as $item)
                                                        <option value="{{$item->guru_id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Group')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
								

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
													</form>
												</div>
											</div>
										</div>	<!-- AKhir Moodal -->



				<hr/>

				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<!-- <th>Name</th> -->
										<th>Kelas</th>
										<th>Nama Walas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									
								@foreach($dataRombongan_belajar as $key => $item)
								@if($item->walas->nama == NULL)
									<tr>
										<td colspan="3">Data Kosong</td>
										
									</tr>
									@else
									<tr>
										<td>{{$key+1}}</td>
										<!-- <td>{{$item->nama}}</td> -->
										<td>{{$item->kelas->nama}} {{$item->jurusan->kode}} {{$item->group->nama}}</td>
											<td>{{$item->walas->nama}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href=""><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a>

										</td>
									</tr>
									@endif
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