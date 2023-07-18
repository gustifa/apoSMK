@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{route('update.peserta_didik')}}" enctype="multipart/form-data">
	 	@csrf
	 								<input type="hidden" name="peserta_didik_id" value="{{$dataPeserta_didik->peserta_didik_id}}">
									<div class="mb-3">
										<label class="form-label">Nama Peserta Didik:</label>
										<input type="text" disabled="" value="{{$dataPeserta_didik->nama}}" class="form-control">
										
									</div>

									<div class="mb-3">
										<label class="form-label">NIS:</label>
										<input type="text" disabled="" value="{{$dataPeserta_didik->no_induk}}" class="form-control">
										
									</div>
									<div class="mb-3">
										<label class="form-label">NISN:</label>
										<input type="text" disabled="" value="{{$dataPeserta_didik->nisn}}" class="form-control">
										
									</div>
									
									<div class="mb-3">
										<label class="form-label">Jurusan:</label>
											<select name="rombongan_belajar_id" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Pilih Rombel</option>
                                                        @foreach($dataRombongan_belajar as $item)
                                                        <option value="{{$item->rombongan_belajar_id}}">{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>
									

									<div class="mb-3">
										<label class="form-label">RFID ID:</label>
										<input type="text" name="rfid_id" value="{{$dataPeserta_didik->rfid_id}}" class="form-control">
										@error('nama')
										<span class="text-danger">{{ $message }}</span>
										 @enderror
									</div>
									
									<div class="mb-3">
										<button type="submit" class="btn btn-primary px-5"><i class='bx bx-save mr-1'></i>Update</button>
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