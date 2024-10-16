@extends('layouts.organization')

    @section('css')
        <link href="{{tenantAsset().'admin/assets/traffic/web-traffic.css'}}" rel="stylesheet" type="text/css">
        <link href="{{tenantAsset().'admin/assets/css/daterangepicker.css'}}" rel="stylesheet" />
        <link href="{{ tenantAsset().'admin/assets/plugins/fancyuploder/fancy_fileupload.css'}}" rel="stylesheet" />
        <!-- INTERNAL File Uploads css-->
        <link href="{{ tenantAsset().'admin/assets/plugins/fileupload/css/fileupload.css'}}" rel="stylesheet" type="text/css" />
        <!-- INTERNAl Data table css -->
        <link href="{{tenantAsset().'admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css'}}" rel="stylesheet" />
        <link href="{{tenantAsset().'admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css'}}"  rel="stylesheet">
        <link href="{{tenantAsset().'admin/assets/plugins/datatable/responsive.bootstrap4.min.css'}}" rel="stylesheet" />
        <link href="{{tenantAsset().'admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.css'}}" rel="stylesheet" />
        <link href="{{tenantAsset().'admin/assets/plugins/sweet-alert/sweetalert.css'}}" rel="stylesheet" />
        <style type="text/css">
        .ficons i {
            font-size: 15px;
        }
        </style>
    @endsection

   @section('page-header')
        <!--Page header-->
        <div class="page-header mt-0 pt-3 pb-4 pl-4" style="background: #fff;">
            <div class="page-leftheader">
                <h4 class="page-title mb-0">Hi! Welcome Back</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <!--End Page header-->
    @endsection


    @section('content')

            {{ Form::open(array('url' => "organization/user-profile/save", 'id' => 'OrgBasicForm', 'name' => 'OrgBasicForm', 'class' => '','files'=>'true', 'novalidate')) }}

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Profile
                    </div>
                </div>

                <div class="card-body">
                    <!--/app header-->
                    <div class="main-proifle p-0 border-0">
                        <div class="profile-cover">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading mt-0 p-0 border-0">
                                    <div class="tabs-menu1 px-3 pt-2 pb-2">
                                        <ul class="nav tabs border-0 ml-5">
                                            <li><a href="#tab-1" class="active fs-14 tab-1" data-toggle="tab">Basic Info</a></li>
                                            <li><a href="#tab-2" data-toggle="tab" class="fs-14 tab-2">Skills</a></li>
                                            <li><a href="#tab-3" data-toggle="tab" class="fs-14 tab-3">Experience</a></li>
                                            <li><a href="#tab-4" data-toggle="tab" class="fs-14 tab-4">Qualification</a></li>
                                            <li><a href="#tab-5" data-toggle="tab" class="fs-14 tab-5">Certifications</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.profile-cover -->
                    </div>

                    <!-- Row-1 -->
                    <div class="row" id="brnch">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="border-0">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab-1">
                                        @include('organization.profile.admin')
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        @include('organization.profile.skills')
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        @include('organization.profile.experience')
                                    </div>
                                    <div class="tab-pane" id="tab-4">
                                        @include('organization.profile.qualification')
                                    </div>
                                    <div class="tab-pane" id="tab-5">
                                        @include('organization.profile.certification')
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="btn btn-list float-right">
                            <button id="cancel_btn" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button id="save_btn" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            {{Form::close()}}

                </div>
            </div>
                <!-- End app-content-->
            </div>
            <style type="text/css">
                .chart {
                        width:900px;
                        height:400px;
                        margin: auto;
                        display: block;
                        }
            </style>


            <!-- modals -->
            <div id="exp_modal">
                @include('organization.profile.modal-experience')
            </div>
            <div id="qual_modal">
                @include('organization.profile.modal-qualification')
            </div>
            <div id="cert_modal">
                @include('organization.profile.modal-certification')
            </div>



    @endsection


@section('js')

<script src="{{tenantAsset().'admin/assets/js/custom.js'}}"></script>

<script src="{{tenantAsset().'admin/assets/plugins/morris/raphael-min.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/morris/morris.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/js/morris.js'}}"></script>

<script src="{{tenantAsset().'admin/assets/js/datatable/tables/org/skills-datatable.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/js/datatable/tables/org/experience-datatable.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/js/datatable/tables/org/qualification-datatable.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/js/datatable/tables/org/certification-datatable.js'}}"></script>

<script src="{{tenantAsset().'admin/assets/plugins/fancyuploder/jquery.ui.widget.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/fancyuploder/jquery.fileupload.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/fancyuploder/jquery.iframe-transport.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/fancyuploder/fancy-uploader.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/plugins/fileupload/js/dropify.js'}}"></script>
<script src="{{tenantAsset().'admin/assets/js/filupload.js'}}"></script>

<!--INTERNAL ECharts js-->
<script src="{{tenantAsset().'admin/assets/plugins/echarts/echarts.js'}}"></script>






  <script type="text/javascript">

var hash = window.location.hash;
$('.nav.tabs a[href="' + hash + '"]').tab('show');

$(document).ready(function(){

	    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $(".org_image").dropify();

  </script>
@endsection
