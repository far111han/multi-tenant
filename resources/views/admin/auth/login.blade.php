@extends('layouts.master2')
@section('css')

<style> #adminLogin .error{ color: #fff; }</style>
@endsection
@section('content')
<div class="page">
    <div class="page-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo clearfix mb-3">
                                    <a href="">
                                        <img src="{{ URL::asset('admin/assets/images/logo.png')}}" alt="">
                                    </a>
                                 </div>
                                <h4 class="mb-6 text-center" style="color: #094d99;">Sign In to your account</h4>
                                <form method="POST" id="adminLogin" action="{{ url('admin/login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-9 d-block mx-auto">
                                            <div class="input-group mb-4">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-4">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            {{-- <div class="input-group mb-4">

                                             <div class="error tac fw" role="alert">
                                                    <strong>{{ Session::get('message')}}</strong>
                                                </div>

                                            </div> --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="remember" >
                                                    {{ __('Remember Me') }}
                                                    </label>
                                                    </label>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href="{{ url('/password/reset')}}" style="color: #094d99;">Forgot password?</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-secondary btn-block px-4">SIGN IN</button>
                                                </div>

                                            </div>
                                        </div>
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
@endsection
@section('js')
@endsection
