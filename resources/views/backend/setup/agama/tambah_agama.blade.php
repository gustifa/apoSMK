@extends('admin.admin_master')
@section('admin')
@section('title')
   Tambah Agama
@endsection

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Agama</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form Agama</li>
							</ol>
						</nav>
					</div>


				</div>
				<!--end breadcrumb-->
	
						<div class="row">
					<div class="col-xl-12 mx-auto">
						<div class="card">
							<div class="card-body">
								<form method="post" action="{{ route('simpan.agama') }}">
	 	@csrf

									<div class="mb-3">
										<label class="form-label">Agama:</label>
										<input type="text" name="nama" class="form-control" placeholder="Inputkan Agama">
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