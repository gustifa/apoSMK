@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat User Peserta Didik
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">	
				<!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Setting Peserta Didik</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Peserta Didik</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->

				<!-- Awal Moodal Import-->
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Import Data</button>
												<ul class="dropdown-menu" style="margin: 0px;">
													<li><a class="dropdown-item" href="{{route('download.template.peserta_didik')}}">Download Template</a>
													</li>
													<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Import </a>
													</li>

													
												</ul>
											</div>


										</div>	
										
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Upload Template Peserta Didik</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="{{ route('import.peserta_didik') }}" method="POST" enctype="multipart/form-data">
										            	@csrf

														<div class="mb-3">
															<!-- <label class="form-label">Agama:</label> -->
															<input type="file" name="file" class="form-control" placeholder="Inputkan Agama">
														</div>
													</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</form>
												</div>
											</div>
										</div>	<!-- AKhir Moodal Import -->


				<hr/>


				<!-- Awala Datatable -->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							 {{ $dataTable->table() }}
						</div>
					</div>
				</div>
				<!-- Akhir Datatable -->	

			</div>
		</div>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection

