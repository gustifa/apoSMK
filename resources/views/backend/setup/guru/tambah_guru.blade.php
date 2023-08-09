@extends('admin.admin_master')
@section('admin')

@section('title')
   Tambah Guru
@endsection

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('simpan.guru') }}">
	 	@csrf
	 								<div class="row">
	 									<div class="col-xl-4">
	 										<div class="mb-3">
											<label class="form-label">Nama:</label>
											<input type="text" name="nama" class="form-control" placeholder="Inputkan Nama">
											</div>
										</div>
										<div class="col-xl-4">
											<div class="mb-3">
												<label class="form-label">NIK:</label>
												<input type="text" name="nik" class="form-control" placeholder="Inputkan Nik">
											</div>
	 									</div>
	 									<div class="col-xl-4">
											<div class="mb-3">
												<label class="form-label">Email:</label>
												<input type="email" name="email" class="form-control" placeholder="Inputkan Email">
											</div>
	 									</div>
	 								</div>
	 								<div class="row">
	 									<div class="col-xl-6">
	 										<div class="mb-3">
												<label class="form-label">NUPTK:</label>
												<input type="text" name="nuptk" class="form-control" placeholder="Inputkan NUPTK">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="mb-3">
												<label class="form-label">Tempat Lahir:</label>
												<input type="text" name="tempat_lahir" class="form-control" placeholder="Inputkan Tempat Lahir">
											</div>
	 									</div>
	 								</div>
	 								<div class="row">
	 									<div class="col-xl-6">
	 										<div class="mb-3">
												<label class="form-label">Tanggal Lahir:</label>
												<input type="date" name="tanggal_lahir" class="form-control" placeholder="Inputkan Tanggal Lahir">
											</div>
	 									</div>
	 									<div class="col-xl-6">
	 										<div class="form-group mb-3">
												<label class="form-label">Jenis Kelamin:</label>

													<select name="jenis_kelamin" class="form-select form-control" id="exampleFormControlSelect1">
		                                                        <option selected="" disabled="">Pilih Jenis Kelamin</option>
		                                                        
		                                                        <option value="L">Laki-Laki</option>
		                                                        <option value="P">Perempuan</option>        
		                                 </select>
											</div>
	 									</div>
	 								</div>
	 								
	 								<div class="row">	 									
	 									<div class="col-xl-12">
	 										<div class="form-group mb-3">
												<label class="form-label">Agama:</label>

													<select name="agama_id" class="form-select form-control" id="exampleFormControlSelect1">
		                                                        <option selected="" disabled="">Pilih Agama</option>
		                                                        @foreach($agama as $item)
		                                                        <option value="{{$item->agama_id}}">{{$item->nama}}</option>
															@endforeach
		                                                       
		                                                    </select>
													@error('rombongan_belajar_id')
												 	<span class="text-danger">{{ $message }}</span>
												 	@enderror

											</div>
										</div>
	 									
	 								</div>

	 								
	 									
									
									<div class="mb-3">
										<button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Simpan</button>
									</div>
	 								</div>
									
								</form>
							</div>
						</div>

					</div>
				</div>
			



	</div>
</div>
		<!--end page wrapper -->
@endsection