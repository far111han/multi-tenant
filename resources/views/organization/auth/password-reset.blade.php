@extends('layouts.master2')
@section('css')
@endsection
@section('content')
<div class="page">
			<div class="login-4">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-5 col-lg-5 col-md-12 bg-color-10">
							<div class="form-section">
								<div class="logo clearfix">
									<a href="">
										<img src="{{tenantAsset().'admin/assets/images/logo.png'}}" alt="{{tenantAsset()}}">
									</a>
								</div>
								<h3>Reset your Password</h3>
								<div class="login-inner-form">
									{{-- <div class="card-body"> --}}
										@if (session('status'))
					                        <div class="alert alert-success" role="alert">
					                            {{ session('status') }}
					                        </div>
					                    @endif
										@if (session('success'))
					                        <div class="alert alert-success" role="alert">
					                            {{ session('success') }}
					                        </div>
					                    @endif
										{{-- <h2 class="display-4 mb-2 font-weight-bold error-text text-center"><strong>Forgot Password?</strong></h2> --}}
										<!-- <h4 class="text-white-80 mb-7 text-center">Forgot Password Page</h4> -->
										<form method="POST" action="{{ url('organization/forgot/password') }}">
											@csrf
											<div class="form-group form-box">
												<input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Create Password" aria-label="Create Password" autofocus>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group form-box">
												<input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Confirm Password" aria-label="Confirm Password" autofocus>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">
												<button type="submit" class="btn-md btn-theme w-45 mr-4">Cancel</button>
												<button type="submit" class="btn-md btn-theme w-45">Submit</button>
											</div>
											{{-- <div class="row">
												<div class="col-9 d-block mx-auto">
													<div class="input-group mb-4">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<i class="fa fa-envelope"></i>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" />
															<span class="custom-control-label"><a href="{{url('/' . $page='terms')}}" class="text-white-80">Agree the terms and policy</a></span>
														</label>
													</div> 
												</div>
											</div> --}}
										</form>
										{{-- <div class="pt-4 text-center text-danger">
											<div class="font-weight-normal fs-16"><a class="btn-link font-weight-normal" href="{{ url('organization/login')}}">Back to login page</a></div>
										</div> --}}
									{{-- </div> --}}
									<!-- <div class="custom-btns text-center">
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-facebook-f"></i></span></button>
										<button class="btn btn-icon" type="button"><span class="btn-inner-icon"><i class="fa fa-google"></i></span></button>
									</div> -->
								</div>
							</div>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-12 bg-img none-992">
							<div class="info">
								<h1><span>Welcome to</span> Mailo</span></h1>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  make a type specimen book.  make a type specimen book.</p>
							 </div>
						</div>
					</div>
				</div>
			</div>
        </div>
@endsection
@section('js')
@endsection
