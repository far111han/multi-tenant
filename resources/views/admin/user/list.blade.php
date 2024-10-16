@extends('layouts.admin') @section('css')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .rounded-full {
            border-radius: 9999px;
        }

        object-cover {
            object-fit: cover;
        }

        .w-16 {
            width: 8rem;
        }

        .h-16 {
            height: 8rem;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        .error {
            color: red;
            display: none;
        }
    </style>
    @endsection @section('page-header')
    <!--Page header-->
    <div class="page-header mt-0 pt-3 pb-4 pl-4" style="background: #fff;">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">Hi! Welcome Back</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="fe fe-home mr-2 fs-14"></i>Home </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">Users</a>
                </li>
            </ol>
        </div>
    </div>
    <!--End Page header-->
    @endsection @section('content')
    <!--/app header-->
    <div class="row">
        <div class="e-panel card">
            <div class="card-header justify-content-between">
                <div class="card-title"> Users </div>
                <div class="">
                    <button type="button" class="btn btn-primary" onclick="openSaveModal()">
                        <i class="fe fe-plus mr-1"></i>New </button>
                </div>
            </div>
            <div class="card-body">
                <div class="e-table">
                    <div class="dataTables_wrapper">
                        <div class="table-responsive table-lg mt-3">
                            <table class="table table-striped nowrap userlist user-table" id="userlist" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-top border-bottom-0 wd-5 notexport">Select</th>
                                        <th class="border-bottom-0 w-20">Name</th>
                                        <th class="border-bottom-0 w-20">Email</th>
                                        <th class="border-bottom-0 w-10">Phone</th>
                                        <th class="border-bottom-0 w-15">Created On</th>
                                        <th class="border-bottom-0 w-10">Status</th>
                                        <th class="border-bottom-0 w-10 notexport">Actions</th>
                                    </tr>
                                    <tbody id="listAdmin">
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Form Modal -->

    <div class="modal fade" id="user-form-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Create User</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" id="userForm" name="userForm" class="" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="user_ids" name="user_id" type="hidden">
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                                    src="https://picsum.photos/200/300" alt="Current profile photo" />
                            </div>
                            <label class="block mt-3">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" onchange="loadFile(event)" name="profile_picture" />
                            </label>
                        </div>
                        <div class="py-1">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class="text-red">*</span>
                                                </label>
                                                <input class="form-control" id="firstname" name="firstname" type="text"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name <span class="text-red">*</span>
                                                </label>
                                                <input class="form-control" id="lastname" required name="lastname"
                                                    type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gender </label>
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="0">Male</option>
                                                    <option value="1">Female</option>
                                                    <option value="1">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email <span class="text-red">*</span>
                                                </label>
                                                <input class="form-control" required name="email" type="email"
                                                    id="email" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Phone no</label>
                                                <input class="form-control" name="phoneno" id="phoneno" type="number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Role </label>
                                                <select class="form-control" id="role" name="role" required>
                                                    @foreach ($userRoles as $userRole)
                                                        <option value="{{ $userRole['id'] }}">
                                                            {{ $userRole['usr_role_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Status <span class="text-red">*</span>
                                                </label>
                                                <select class="form-control" required name="is_active" id="is_active"
                                                    required>
                                                    <option value="1" selected="selected">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Password <span class="text-red">*</span>
                                                </label>
                                                <input class="form-control" name="password" type="password"
                                                    id="password" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Confirm <span class="text-red">*</span>
                                                </label>
                                                <input class="form-control" name="confirmPassword" type="password"
                                                    id="confirmPassword">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                      <div class="col d-flex justify-content-end">
                          <input class="btn btn-primary" type="submit" id="frontval" value="Save Changes">
                      </div>
                  </div> --}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="frontval" value="Save Changes">Save
                        changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
      <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Create User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  
              </div>
          </div>
      </div>
    </div> --}}
    <!-- End Row-->
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
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/filupload.js') }}"></script>
    <!--INTERNAL ECharts js-->
    <script src="{{ URL::asset('admin/assets/plugins/echarts/echarts.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/datatable/tables/org/user-datatable.js') }}"></script>
    <script>
        var loadFile = function(event) {
            var input = event.target;
            var file = input.files[0];
            var type = file.type;
            var output = document.getElementById('preview_img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        $(document).ready(function() {
            loadAdmin();
            $('#userForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submit

                // Get password and confirm password values
                var password = $('#password').val();
                var confirmPassword = $('#confirmPassword').val();

                // Check if passwords match
                if (password !== confirmPassword) {
                    // alert('Passwords do not match. Please try again.');
                    $('.error').show();
                    $('.error').html('Passwords do not match. Please try again.');
                    return;
                }

                // If passwords match, proceed with AJAX request

                // Create FormData object
                var formData = new FormData(this);

                // Append profile_picture to FormData if a file is selected
                var fileInput = document.querySelector('input[name="profile_picture"]');
                if (fileInput.files.length > 0) {
                    formData.append('profile_picture', fileInput.files[0]);
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.user.save') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        const obj = JSON.parse(data);
                        console.log(data);

                        if (obj.status == 200) {
                            $('#user-form-modal').modal('hide');
                            Swal.fire({
                                title: "Success!",
                                text: obj.msg,
                                icon: "success"
                            });

                            loadAdmin();
                        } else {
                            $('#user-form-modal').modal('hide');
                            Swal.fire({
                                title: "Error!",
                                text: obj.msg,
                                icon: "error"
                            });
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });



        function openSaveModal() {

            $('#user_ids').val(0);
            $('#firstname').val('');
            $('#lastname').val('');
            $('#gender').val('');
            $('#email').val('');
            $('#phoneno').val('');
            $('#role').val('');
            $('#is_active').val('');
            $('#preview_img').val('');
            $('#user-form-modal').modal('show');
        }

        function editUser(parms) {
            $('#user_ids').val('');
            $('#firstname').val('');
            $('#lastname').val('');
            $('#gender').val('');
            $('#email').val('');
            $('#phoneno').val('');
            $('#role').val('');
            $('#is_active').val('');
            $('#preview_img').val('');
            $("#password").removeAttr("required");
            $("#confirmPassword").removeAttr("required");
            $('#user-form-modal').modal('show');
            $('#user_ids').val(parms[0]);
            $('#firstname').val(parms[1]);
            $('#lastname').val(parms[2]);
            $('#gender').val(parms[3]);
            $('#email').val(parms[4]);
            $('#phoneno').val(parms[5]);
            $('#role').val(parms[6]);
            $('#is_active').val(parms[7]);
            $('#preview_img').attr('src', parms[9]);
            $("#password").removeAttr("required");
            $("#confirmPassword").removeAttr("required");
            $('#user-form-modal').modal('show');

        }

        function loadAdmin() {
            $.ajax({
                url: '{{ route('admin.list.admin') }}', // Change this to the actual route for fetching user data
                type: 'GET',
                success: function(response) {
                    $('#listAdmin').html(response);
                    // Handle the response as needed
                },
                error: function(error) {
                    console.log(error);
                    // Handle the error as needed
                }
            });
        }

        function changeStatus(val) {
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: '{{ route('admin.status.change') }}', // Change this to the actual route for fetching user data
                type: 'POST',
                data: {
                    status: val[1],
                    userid: val[0],
                    _token: csrf
                },
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.data == "activate") {

                        loadAdmin();
                    } else {

                        loadAdmin();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function deleteUser(useriD) {
            var csrf = "{{ csrf_token() }}";
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.user.delete') }}',
                        type: 'POST',
                        data: {
                            userid: useriD,
                            _token: csrf
                        },
                        success: function(response) {
                            Swal.fire("Deleted!", "", "success");
                            loadAdmin();
                        },

                        error: function(error) {
                            console.log(error);
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }
    </script>
@endsection
