@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
				<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{route('update.waktu.sholat')}}" enctype="multipart/form-data">
	 							@csrf
	 								
	 								<input type="hidden" name="id" value="{{$WaktuSholat->id}}">
									<div class="mb-3">
										<label class="form-label">Waktu Mulai:</label>
										<input type="time" name="waktu_mulai" value="{{$WaktuSholat->waktu_mulai}}" class="form-control">
											@error('Nis')
										 	<span class="text-danger">{{ $message }}</span>
										 	@enderror
									</div>

									<div class="mb-3">
										<label class="form-label">Waktu Selesai:</label>
										<input type="time" name="waktu_selesai" value="{{$WaktuSholat->waktu_selesai}}" class="form-control">
											@error('Nama')
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