    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Neo Bench') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="no">

    @php

    $tenant_url = "//".getTenantDomain()."/";

    @endphp


    <!--Favicon -->
		<link rel="icon" href="{{tenantAsset().'admin/assets/images/brand/favicon.ico'}}" type="image/x-icon"/>

		<!--Bootstrap css -->
		{{-- <link href="{{tenantAsset().'admin/assets/plugins/bootstrap/css/bootstrap.min.css'}}" rel="stylesheet"> --}}
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
		<!-- Style css -->
		<link href="{{tenantAsset().'admin/assets/css/style.css'}}" rel="stylesheet" />
		<link href="{{tenantAsset().'admin/assets/iconfonts/feather/feather.css'}}" rel="stylesheet" />
		<link href="{{tenantAsset().'admin/assets/iconfonts/font-awesome/css/font-awesome.min.css'}}" rel="stylesheet" />
		<link href="{{tenantAsset().'admin/assets/css/dark.css'}}" rel="stylesheet" />
		<link href="{{tenantAsset().'admin/assets/css/skin-modes.css'}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{tenantAsset().'admin/assets/css/animated.css'}}" rel="stylesheet" />

		<!--Sidemenu css -->
       <link href="{{tenantAsset().'admin/assets/css/sidemenu.css'}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{tenantAsset().'admin/assets/plugins/p-scrollbar/p-scrollbar.css'}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ $tenant_url.'admin/assets/css/icons.css' }}" rel="stylesheet" />
		@yield('css')
	@include('includes.config-styles')
		<!-- Simplebar css -->
		<link rel="stylesheet" href="{{tenantAsset().'admin/assets/plugins/simplebar/css/simplebar.css'}}">

	    <!-- Color Skin css -->
		<link id="theme" href="{{tenantAsset().'admin/assets/colors/color1.css'}}" rel="stylesheet" type="text/css"/>


                <link rel="stylesheet" href="{{tenantAsset().'admin/assets/css/toastr.min.css'}}" />


                <!--  Datatable -->
                <link href="{{tenantAsset().'admin/assets/js/datatable/datatables.min.css'}}" rel="stylesheet" />
            <!-- Custom css -->
		<link id="theme" href="{{tenantAsset().'admin/assets/css/custom.css'}}" rel="stylesheet" type="text/css"/>

		<!--Switch css-->

		<link href="{{URL::asset('admin/assets/css/switch.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('admin/assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
		<!-- INTERNAL Mutipleselect css-->
		<link rel="stylesheet" href="{{URL::asset('admin/assets/plugins/multipleselect/multiple-select.css')}}">
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('admin/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
		<!-- INTERNAL telephoneinput css-->
        <link rel="stylesheet" href="{{URL::asset('admin/assets/plugins/telephoneinput/telephoneinput.css')}}">
        <!-- Datatable fix for the rotating rows -->
        <style type="text/css">
            table.dataTable tr.parent {
            animation: none !important;
            }
        </style>
        <!-- Rotating row fix ends here -->

		<link rel="stylesheet" href="{{URL::asset('admin/assets/custom.css')}}">

