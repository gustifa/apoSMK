@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('simpan.presensi.sholat') }}">
	 	@csrf

								
									<div class="mb-3">
										<label class="form-label">Kelas:</label>
											<select name="Jurusan" class="form-select" id="exampleFormControlSelect1">
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
										<label class="form-label">Group:</label>
											<select name="Jurusan" class="form-select" id="exampleFormControlSelect1">
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
										<label class="form-label">Jurusan:</label>
											<select name="Jurusan" class="form-select" id="exampleFormControlSelect1">
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
										<label class="form-label">Nama Siswa:</label>
											<select name="Jurusan" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Siswa</option>
                                                        @foreach($userRfid as $item)
                                                        <option value="{{$item->id}}">{{$item->Nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									

									

									
									
									<div class="mb-3">
										<button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Simpan</button>
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