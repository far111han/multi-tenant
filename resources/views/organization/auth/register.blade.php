@extends('layouts.master2')
@section('css')
@endsection
@section('content')
<div class="page">
			<div class="login-4">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="">
								<div class="logo clearfix">
									<div class="d-flex justify-content-center">
										<a href="">
											<img src="{{tenantAsset().'admin/assets/images/logo.png'}}" alt="{{tenantAsset()}}">
										</a>
									</div>
								</div>
								<h4 class="mb-7 text-center">Register Account</h4>
								<div class="row">
									<div class="col-9 d-block mx-auto">
										<div class="row login-inner-form">
											<div class="col-md-12">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Username">
													<span class="input-group-text labl">neobench.com</span>
												</div>
											</div>
										</div>
										<div class="row login-inner-form">
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Job Title">
												</div>
											</div>
										</div>
										<div class="row login-inner-form">
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Organization Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-box">
													{{-- <input type="text" class="form-control" placeholder="Country"> --}}
													<select class="form-control form-select" aria-label="Default select example">
														<option selected>Open this select menu</option>
														<option value="1">One</option>
														<option value="2">Two</option>
														<option value="3">Three</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row login-inner-form">
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Email">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Country Code">
												</div>
											</div>
										</div>
										<div class="row login-inner-form">
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Password">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-box">
													<input type="text" class="form-control" placeholder="Confirm Password">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" />
												<span class="custom-control-label">
													<a href="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">I Agree the Terms and policy</a>
												</span>
												
												{{-- <span class="custom-control-label">
													<a href="{{url('/' . $page='terms')}}" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">I Agree the Terms and policy</a>
												</span> --}}
											</label>
										</div>
										<div class="row login-inner-form">
											<div class="col-12">
												<div class="d-flex justify-content-center">
													<button type="button" class="btn-md btn-theme">Create New Account</button>
												</div>
											</div>
											{{-- <div class="col-12 text-center">
												<a href="{{url('/' . $page='forgot-password-2')}}" class="btn btn-link box-shadow-0 px-0 text-white-80">Forgot password?</a>
											</div> --}}
										</div>
									</div>
								</div>
								<div class="text-center pt-4">
									<div class="font-weight-normal fs-16">You Already have an account ? <a class="btn-link font-weight-normal" style="color: #094d99;" href="{{url('/seller/login')}}">Login Here</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>


		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				...
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			</div>
		</div>
@endsection
@section('js')
@endsection