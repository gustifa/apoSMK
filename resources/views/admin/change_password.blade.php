@extends('admin.admin_master')
@section('admin')
@section('title')
   Ganti Password
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-wrapper">
			<div class="page-content"> 

				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									<form method="post" action="{{route('update.password')}}" enctype="multipart/form-data">
										@csrf
										@if(session('status'))
										<div class="alert alert-success" role="alert">
											{{session('status')}}
										</div>
										@elseif(session('error'))
										<div class="alert alert-danger" role="alert">
											{{session('error')}}
										</div>
										@endif
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Old Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Old Password" />

												@error('old_password')
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="New Password" />

												@error('new_password')
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Confirm New Password </h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" placeholder="new_password_confirmation" />

												
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes">
											</div>
										</form>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		})

	});

</script>

@endsection