@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{route('user.rfid.update')}}" enctype="multipart/form-data">
	 							@csrf
	 								<!-- <div class="mb-3">
										<label class="form-label">Id:</label>
										<input type="text" disabled="" name="id" value="{{$userRfid->id}}" class="form-control">
											@error('Nis')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror
									</div> -->

									<div class="mb-3">
										<label class="form-label">Nis:</label>
										<input type="text" name="Nis" value="{{$userRfid->Nis}}" class="form-control">
											@error('Nis')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror
									</div>

									<div class="mb-3">
										<label class="form-label">Nama:</label>
										<input type="text" name="Nama" value="{{$userRfid->Nama}}" class="form-control">
											@error('Nama')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror
									</div>

									<div class="mb-3">
										<label class="form-label">Kelas:</label>
											<select name="Kelas" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Kelas</option>
                                                        @foreach($kelas as $item)
                                                        <option value="{{$item->id}}"{{$item->id == $userRfid->Kelas ? 'selected' : ''}}>{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Kelas')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									<div class="mb-3">
										<label class="form-label">Jurusan:</label>
											<select name="Jurusan" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Jurusan</option>
                                                        @foreach($jurusan as $item)
                                                        <option value="{{$item->id}}"{{$item->id == $userRfid->Jurusan ? 'selected' : ''}}>{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Jurusan')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									<div class="mb-3">
										<label class="form-label">Group:</label>
											<select name="Group" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Group</option>
                                                        @foreach($group as $item)
                                                        <option value="{{$item->id}}"{{$item->id == $userRfid->Group ? 'selected' : ''}}>{{$item->nama}}</option>
													@endforeach
                                                       
                                                    </select>
											@error('Group')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror

									</div>

									<div class="mb-3">
										<label class="form-label">RFID ID:</label>
										<input type="text" name="RFID_ID" value="{{$userRfid->RFID_ID}}" class="form-control">
											@error('RFID_ID')
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