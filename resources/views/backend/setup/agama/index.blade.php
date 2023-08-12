@extends('admin.admin_master')
@section('admin')

@section('title')
   Lihat Agama
@endsection

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
               <div class="breadcrumb-title pe-3">Setup Agama</div>
               <div class="ps-3">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Agama</li>
                     </ol>
                  </nav>
               </div>


            </div>
            <!--end breadcrumb-->
				
			<!-- Awala Datatable -->
			<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 8px;">No</th>
										<th>Nama Agama</th>
										<th>Aksi</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($dataAgama as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->nama}}</td>
										<td style="width: 20px;">
											<a class="btn btn-info" href="{{route('edit.agama', $item->agama_id)}}"><i class='bx bx-edit mr-1'></i></a>
											<a class="btn btn-danger" href="" id="delete"><i class='bx bx-x-circle mr-1'></i></a>

										</td>
									</tr>
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