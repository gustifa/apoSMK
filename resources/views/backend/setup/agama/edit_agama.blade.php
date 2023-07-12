@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('update.agama',$editAgama->id) }}">
	 	@csrf

									<div class="mb-3">
										<label class="form-label">Agama:</label>
										<input type="text" name="nama" value="{{$editAgama->nama}}" class="form-control">
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