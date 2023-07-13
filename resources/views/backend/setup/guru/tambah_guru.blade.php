@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('simpan.guru') }}">
	 	@csrf

									<div class="mb-3">
										<label class="form-label">Nama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Jurusan">
									</div>

									<div class="mb-3">
										<label class="form-label">NIK:</label>
										<input type="text" name="nik" class="form-control" placeholder="Inputkan Kode">
									</div>

									<div class="mb-3">
										<label class="form-label">NUPTK:</label>
										<input type="text" name="nuptk" class="form-control" placeholder="Inputkan Kode">
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