@extends('layouts.organization')

@section('css')
    <link href="{{ URL::asset('admin/assets/traffic/web-traffic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('admin/assets/css/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ tenantAsset() . 'admin/assets/plugins/fancyuploder/fancy_fileupload.css' }}" rel="stylesheet" />
    <!-- INTERNAL File Uploads css-->
    <link href="{{ tenantAsset() . 'admin/assets/plugins/fileupload/css/fileupload.css' }}" rel="stylesheet" type="text/css" />

    <!-- INTERNAl Data table css -->
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />

    <link href="{{ URL::asset('admin/assets/plugins/tree/Treant.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/plugins/tree/basic-treant.css') }}" rel="stylesheet" />
    <style type="text/css">
        h4.pl-4 {
            padding: 8px;
            font-size: 18px;
            font-weight: 600;
        }

        #permissions .sub-title.module {
            padding-left: 45px;
        }

        #permissions .title {
            padding: 12px 15px;
            background: #fff;
            color: #000;
            border-bottom: 1px solid #705ec8;
        }

        #permissions .sub-title {
            padding: 7px 15px;
            border-bottom: 1px solid #705ec8;
        }

        #permissions .sub-title.odd {
            background: #e7e4f5;
        }

        #permissions .sub-title.even {
            background: #fff;
    </style>
@endsection

@section('page-header')
    <!--Page header-->
    <div class="page-header mt-0 pt-3 pb-4 pl-4" style="background: #fff;">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Hi! Welcome Back</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="{{ route('organization.user-roles') }}">User Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add New User Roles</a></li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
@endsection
@section('content')
    <div class="card">

        <div class="card-header">
            <div class="card-title">
                Training Program
            </div>
        </div>

        <div class="card-body">

            <!--/app header-->
            <div class="main-proifle p-0 border-0">
                <div class="profile-cover">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading mt-0 p-0 border-0">
                            <div class="tabs-menu1 px-3 pt-2 pb-2">
                                <ul class="nav tabs nav-tabs border-0 ml-5" id="myTabs">
                                    <li class="active"><a href="#tab-1" class="active fs-14 tab-1" data-toggle="tab">User
                                            Role</a></li>
                                    <li><a href="#tab-2" data-toggle="tab" class="fs-14 tab-2">Role Mapping</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /.profile-cover -->
            </div>


            {{ Form::open(['url' => 'organization/user-roles/save', 'id' => 'userRoleForm', 'name' => 'userRoleForm', 'class' => '', 'files' => 'true']) }}

            <!-- Row-1 -->
            <div class="row" id="brnchs">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="border-0">
                        <div class="tab-content">
                            @if (isset($userrole))
                                {{ Form::hidden('id', $userrole->id, ['id' => 'role_id']) }}
                            @endif
                            <div class="tab-pane active" id="tab-1">
                                @include('organization.user-roles.includes.role')
                                <div class="col-md-12">
                                    <div class="btn btn-list float-right">
                                        <a class="btn btn-primary continue">Continue</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab-2">
                                @include('organization.user-roles.includes.role-mapping')
                                <div class="col-md-12">
                                    <div class="btn btn-list float-right">
                                        <button type="button" class="btn btn-warning"
                                            onclick="showPrevTab();">Previous</button>
                                        <button id="save_btn" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{ Form::close() }}

        </div>

    </div>


    </div>
    </div>
    <!-- End app-content-->
    </div>
    <style type="text/css">
        .chart {
            width: 900px;
            height: 400px;
            margin: auto;
            display: block;

        }
    </style>
@endsection
@section('js')
    <script src="{{ URL::asset('admin/assets/js/custom.js') }}"></script>

    <script src="{{ URL::asset('admin/assets/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/morris.js') }}"></script>

    <script src="{{ URL::asset('admin/assets/js/datatable/tables/tags-datatable.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/datatable/tables/org/departments-datatable.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/datatable/tables/org/designations-datatable.js') }}"></script>

    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/filupload.js') }}"></script>

    <script src="{{ URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/sweet-alert.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/tree/raphael.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/tree/Treant.js') }}"></script>
    <!-- <script src="{{ URL::asset('admin/assets/plugins/tree/basic-treant.js') }}"></script> -->


    <!--INTERNAL ECharts js-->
    <script src="{{ URL::asset('admin/assets/plugins/echarts/echarts.js') }}"></script>






    <script type="text/javascript">
        function showPrevTab() {
            var $activeTab = $('.tab-content .tab-pane.active');
            var $prevTab = $activeTab.prev('.tab-pane');
            $prevTab.addClass('active');
            $activeTab.removeClass('active');
            $('#myTabs a[href="#' + $prevTab.attr('id') + '"]').tab('show');
        }

        $(document).ready(function() {

            $('.continue').click(function() {
                $role = $('#role').val();
                $role_type = $('#role_type').val();
                $desc = $('#desc').val();

                //alert($role);
                if ($role == '') {
                    $('#userRoleForm  .role').html('The role field is required.');
                } else if ($role_type == '') {
                    $('#userRoleForm  .role').html('');
                    $('#userRoleForm .role_type').html('The role type field is required. ');
                } else if ($desc == '') {
                    $('#userRoleForm  .role').html('');
                    $('#userRoleForm  .role_type').html('');
                    $('#userRoleForm .desc1').html('The desc field is required. ');
                } else {
                    $('#userRoleForm  .desc1').html('');
                    $('.nav-tabs > .active').next('li').find('a').trigger('click');
                }


            });

            $('.previous').click(function() {
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                $('tab-1').removeClass('active');
                $('tab-2').addClass('active');
            });



            var hash = window.location.hash;
            //$('.nav.tabs a[href="' + hash + '"]').tab('show');
            $(".ser_status").change(function() {
                $("#module_changed").val(1);
            });
            $('body').on('submit', '#userRoleForm', function(e) {
                $('#userRoleForm .error').html('');

                e.preventDefault();
                var formData = new FormData(this);
                $('#userRoleForm #save_btn').attr('disabled', true);
                $('#userRoleForm #save_btn').text('Validating...');
                $.ajax({
                    type: "POST",
                    url: '{{ url('/organization/user-roles/validate') }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'success') {

                            $('#userRoleForm #save_btn').text('Saving...');
                            $('#userRoleForm #cancel_btn').trigger('click');
                            //document.userRoleForm.submit();
                            submitForm(formData, 'userRoleForm', 'save_btn');
                            return false;
                            return false;
                        } else {
                            var errKey = '';
                            var n = 0;
                            $.each(data, function(key, value) {
                                if (n == 0) {
                                    errKey = key;
                                    n++;
                                }

                                if (key == "user") {
                                    $(".image.error").html(value);
                                } else {
                                    $('#userRoleForm #' + key).closest('div').find(
                                        '.error').html(value);
                                }

                                if (key == "tab") {
                                    $("." + value).click();
                                }
                            });
                            $('#userRoleForm #' + errKey).focus();
                            $('#userRoleForm #save_btn').attr('disabled', false);
                            $('#userRoleForm #save_btn').text('Save');
                            return false;
                        }
                        return false;
                    }
                });



                return false;
            });

            function submitForm(postValues, form, button) {
                $.ajax({
                    type: "POST",
                    url: '{{ url('organization/user-roles/save') }}',
                    data: postValues,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#' + form + ' #' + button).attr('disabled', false);
                        $('#' + form + ' #' + button).text('Save');
                        var msg = 'Successfully Updated!';
                        toastr.success(msg);
                        setTimeout(function() {
                            window.location.href = '{{ url('organization/user-roles') }}'
                        }, 1000);
                        return false;
                    }
                });
            }

        });


        $("#view-all").click(function() {

            if ($(this).is(':checked')) {

                $('.viewbox .status-btn').prop('checked', true);
            } else {

                $('.viewbox .status-btn').prop('checked', false);
            }
            $(".ser_status").trigger("change");
        });
        $("#edit-all").click(function() {

            if ($(this).is(':checked')) {
                $('.editbox .status-btn').prop('checked', true);
            } else {
                $('.editbox .status-btn').prop('checked', false);
            }
            $(".ser_status").trigger("change");
        });
        $("#delete-all").click(function() {

            if ($(this).is(':checked')) {
                $('.deletebox .status-btn').prop('checked', true);
            } else {
                $('.deletebox .status-btn').prop('checked', false);
            }
            $(".ser_status").trigger("change");
        });
        
        $('.viewbox .status-btn').change(function() {
            checkViewAllchecked()
        })
        $('.editbox .status-btn').change(function() {
            checkEditAllchecked()
        })
        $('.deletebox .status-btn').change(function() {
            checkDeleteAllchecked()
        })

        function checkViewAllchecked() {
            if ($(".viewbox .status-btn").length == $(".viewbox .status-btn:checked").length) {
                $("#view-all").prop("checked", true);
            } else {
                $("#view-all").prop("checked", false);
            }
        }
        function checkEditAllchecked() {
            if ($(".editbox .status-btn").length == $(".editbox .status-btn:checked").length) {
                $("#edit-all").prop("checked", true);
            } else {
                $("#edit-all").prop("checked", false);
            }
        }
        function checkDeleteAllchecked() {
            if ($(".deletebox .status-btn").length == $(".deletebox .status-btn:checked").length) {
                $("#delete-all").prop("checked", true);
            } else {
                $("#delete-all").prop("checked", false);
            }
        }
        checkViewAllchecked();
        checkEditAllchecked();
        checkDeleteAllchecked();
    </script>
@endsection
