



@extends('layouts.organization')

@section('css')
    <link href="{{URL::asset('admin/assets/traffic/web-traffic.css')}}" rel="stylesheet" type="text/css">
    		<link href="{{URL::asset('admin/assets/css/daterangepicker.css')}}" rel="stylesheet" />
    		<link href="{{ tenantAsset().'admin/assets/plugins/fancyuploder/fancy_fileupload.css'}}" rel="stylesheet" />
<!-- INTERNAL File Uploads css-->
<link href="{{ tenantAsset().'admin/assets/plugins/fileupload/css/fileupload.css'}}" rel="stylesheet" type="text/css" />

		<!-- INTERNAl Data table css -->
		<link href="{{URL::asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
		<link href="{{URL::asset('admin/assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('admin/assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />

        <link href="{{URL::asset('admin/assets/plugins/tree/Treant.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('admin/assets/plugins/tree/basic-treant.css')}}" rel="stylesheet" />
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
									  <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/organization/users') }}">Users</a></li>
                                     <li class="breadcrumb-item active" aria-current="page"><a href="#">Add New User</a></li>
								</ol>
							</div>
						</div>
						<!--End Page header-->
						@endsection
						@section('content')

						<!--/app header-->
						<div class="main-proifle pt-0">
							<div class="profile-cover">
								<div class="wideget-user-tab">
									<div class="tab-menu-heading mt-0 p-0">
										<div class="tabs-menu1 px-3 pt-2 pb-2">
											<ul class="nav tabs">
												<li class='tab-links'><a href="#tab-1" class="active fs-14 tab-1" data-toggle="tab">User</a></li>
												<li class='tab-links next_to_map_roles_btn'><a href="#tab-2" data-toggle="tab" id="map_roles_tab" class=" next_to_map_roles_btn fs-14 tab-2 disabled">Role Mapping</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div><!-- /.profile-cover -->
						</div>


                    {{ Form::open(array('url' => "organization/user/save", 'id' => 'userForm', 'name' => 'userForm', 'class' => '','files'=>'true')) }}

						<!-- Row-1 -->
						<div class="row" id="brnchs">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="border-0">
									<div class="tab-content">
										@if(isset($user_details))
										{{ Form::hidden('id',$user_details->id,['id'=>'user_id'])}}
										@endif
										<div class="tab-pane active" id="tab-1">
											@include('organization.users.includes.create-user')
										</div>
										<div class="tab-pane" id="tab-2">
											@include('organization.users.includes.role-mapping')
										</div>
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
@endsection
@section('js')

<script src="{{URL::asset('admin/assets/js/custom.js')}}"></script>

<script src="{{URL::asset('admin/assets/plugins/morris/raphael-min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/morris/morris.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/morris.js')}}"></script>

<script src="{{URL::asset('admin/assets/js/datatable/tables/tags-datatable.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/datatable/tables/org/departments-datatable.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/datatable/tables/org/designations-datatable.js')}}"></script>

<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fileupload/js/dropify.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/filupload.js')}}"></script>

<script src="{{URL::asset('admin/assets/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/sweet-alert.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/tree/raphael.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/tree/Treant.js')}}"></script>
<!-- <script src="{{URL::asset('admin/assets/plugins/tree/basic-treant.js')}}"></script> -->


<!--INTERNAL ECharts js-->
<script src="{{URL::asset('admin/assets/plugins/echarts/echarts.js')}}"></script>






  <script type="text/javascript">

$(document).ready(function(){
 // Get current date and time
var date = new Date();

var day = ("0" + date.getDate()).slice(-2);
var month = ("0" + (date.getMonth() + 1)).slice(-2);

var today = date.getFullYear() + "/" + (month) + "/" + (day);

  $('#user_end_date').val(today);
  //document.getElementById("end_date").value = datetime;

    /**Back button on Role mapping tab. Pointing back to first tab on click */
    $('#back_btn').on('click', function(e) {

        $('#map_roles_tab').addClass('disabled');
        $('.tab-links a[href="#tab-1"]').tab('show');
    });

    /**Next button on first tab (user). Validate the form feilds on that tab
     * and will proceed to role mapping tab on click
     * */
    $('.next_to_map_roles_btn').on('click', function(e) {
        e.preventDefault();
        var valid = true;
        var fieldNum = /^[a-z ]+$/i;
        if($("#first_name").val() == ""){
            valid = false;
            $('#first_name').addClass('is-invalid');
            $('#first_name').closest('.form-group ').find('.error').html("First Name is required.");
        } else {
            var first_name = $("#first_name").val();
            if (!(first_name.match(fieldNum))) {

                valid = false;
                $('#first_name').addClass('is-invalid');
                $('#first_name').closest('.form-group ').find('.error').html("First Name should be alphabetic characters.");
            } else {
                $("#first_name").removeClass('is-invalid');
                $("#first_name").addClass('is-success');
                $('#first_name').closest('.form-group ').find('.error').html('');
            }
        }


        if($("#last_name").val() == ""){
            valid = false;
            $('#last_name').addClass('is-invalid');
            $('#last_name').closest('.form-group ').find('.error').html("Last Name is required.");
        }
        else {
            var last_name = $("#last_name").val();
            if (!(last_name.match(fieldNum))) {
                valid = false;
                $('#last_name').addClass('is-invalid');
                $('#last_name').closest('.form-group ').find('.error').html("Last Name should be alphabetic characters.");
            }
            else {
                $("#last_name").removeClass('is-invalid');
                $("#last_name").addClass('is-success');
                 $('#last_name').closest('.form-group ').find('.error').html('');
            }
        }


        if($("#designation").val() == ""){
            valid = false;
            $('#designation').addClass('is-invalid');
            $('#designation').closest('.form-group ').find('.error').html("Job Title is required.");
        }
        else {
            var designation = $("#designation").val();
            if (!(designation.match(fieldNum))) {

                valid = false;
                $('#designation').addClass('is-invalid');
                $('#designation').closest('.form-group ').find('.error').html("Job Title should be alphabetic characters.");
            }
            else {
                $("#designation").removeClass('is-invalid');
                $("#designation").addClass('is-success');
                 $('#designation').closest('.form-group ').find('.error').html('');
            }
        }


        if($("#email").val() == ""){
            valid = false;
            $('#email').addClass('is-invalid');
            $('#email').closest('.form-group ').find('.error').html("Email Address is required.");
        } else {
            var validEmail = true;
            // Regular expression for basic email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            validEmail = emailRegex.test($("#email").val());

            if(validEmail == false){
                valid = validEmail;
                $('#email').addClass('is-invalid');
                $('#email').closest('.form-group ').find('.error').html("Please provide a valid email address.");
            }
            $("#email").removeClass('is-invalid');
            $("#email").addClass('is-success');
            $('#email').closest('.form-group ').find('.error').html('');
        }

        if($("#mobile-number").val() == ""){
            valid = false;
            $('#mobile-number').addClass('is-invalid');
            $('#mobile-number').closest('.form-group ').find('.error').html("Mobile Number is required.");
        } else {
            var validPhone = true;
            var phoneRegex = /^\+\d{1,3}\s?\d+$/;
            validPhone =  phoneRegex.test($("#mobile-number").val());

            if(validPhone == false){
                valid = validPhone;
                $('#mobile-number').addClass('is-invalid');
                $('#mobile-number').closest('.form-group ').find('.error').html("Please provide a valid phone number.");
            }
            $("#mobile-number").removeClass('is-invalid');
            $("#mobile-number").addClass('is-success');
             $('#mobile-number').closest('.form-group ').find('.error').html('');
        }


        if(valid === true) {
            $('.error').empty();
            $('#map_roles_tab').removeClass('disabled');
            $('.tab-links a[href="#tab-2"]').tab('show');
        }
    });

	var is_temporary=$('input[type="radio"][name="user[is_temporary]"]:checked').val();
	if (is_temporary == '1') {
        $('#ending_date').show();
    }
    else if (is_temporary == '0') {
         $('#ending_date').hide();
    }
var hash = window.location.hash;
$('.nav.tabs a[href="' + hash + '"]').tab('show');

 $('body').on('submit','#userForm',function(e){
        $('#userForm .error').html('');
            e.preventDefault();
            var formData = new FormData(this);
            $('#userForm #save_btn').attr('disabled',true);
            $('#userForm #save_btn').text('Validating...');
            $.ajax({
                type: "POST",
                url: '{{url("/organization/user/validate")}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if(data == 'success') {

                        if($('#branch_id').val() != '' && $('input[name="user[branch_head]"]:checked').val() == '1' && $('#branch_id option:selected').data('head') != 0 && $('#user_id').val() != $('#branch_id option:selected').data('head'))
                        {
                            $('#branchHeadModal').modal('show');
                            return false;
                        }

                        if($('#department_id').val() != '' && $('input[name="user[department_head]"]:checked').val() == '1' && $('#department_id option:selected').data('head') != 0 && $('#user_id').val() != $('#department_id option:selected').data('head'))
                        {
                            $('#departmentHeadModal').modal('show');
                            return false;
                        }

                        $('#userForm #save_btn').text('Saving...');
                        $('#userForm #back_btn').trigger('click');
                        submitForm(formData,'userForm','save_btn');
                        return false;
                    } else {
                        var errKey = '';
                        var n = 0;

                        $.each(data, function(key,value) {
                            if(n == 0) {
                                errKey = key;
                                n++;
                            }
                            if(key == "user") {
                                $(".image.error").html(value);
                            } else {
                                $('#userForm #'+key).closest('.form-group ').find('.error').html(value);
                                $('#userForm #'+key).focus();
                            }
                            if(key =="tab") {
                                $("."+value).click();
                            }
                        });

                        $('#userForm #'+errKey).focus();
                        $('#userForm #save_btn').attr('disabled',false);
                        $('#userForm #save_btn').text('Save');
                        return false;
                    }
                    return false;
                }
            });



      return false;
    });




    $('.model-close').click(function() {
        $('#userForm #save_btn').attr('disabled',false);
        $('#userForm #save_btn').text('Save');
        $('#branchHeadModal').modal('hide');
        $('#departmentHeadModal').modal('hide');
    });

    $('.branch-modal-save').click(function() {
        $('#branchHeadModal').modal('hide');

        if($('#department_id').val() != '' && $('input[name="user[department_head]"]:checked').val() == '1' && $('#department_id option:selected').data('head') != 0 && $('#user_id').val() != $('#department_id option:selected').data('head'))
        {
            $('#departmentHeadModal').modal('show');
            return false;
        }

        var formData = new FormData(document.getElementById('userForm'));
        submitForm(formData,'userForm','save_btn');
    });

    $('.department-modal-save').click(function() {
        $('#departmentHeadModal').modal('hide');
        var formData = new FormData(document.getElementById('userForm'));
        submitForm(formData,'userForm','save_btn');
    });

   function submitForm(postValues,form,button){
        $.ajax({
            type: "POST",
            url: '{{url("organization/user/save")}}',
            data: postValues,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
              $('#'+form+' #'+button).attr('disabled',false); $('#'+form+' #'+button).text('Save');
              var msg = 'Successfully Updated!';
              toastr.success(msg);
              setTimeout(function(){ window.location.href='{{url("organization/users")}}' }, 1000);
              return false;
            }
        });
    }

	$('input[type=radio][name="user[is_temporary]"]').change(function() {
    if (this.value == '1') {
        $('#ending_date').show();
    }
    else if (this.value == '0') {
         $('#ending_date').hide();
    }
});


  });

  $('body').on('change','#branch_id',function(){
            $.ajax({
                type: "POST",
                url: '{{url("/organization/user/getDropdown")}}',
                data: {table: 'org_branch_departments',field: 'branch_id', value:this.value, label:'name',selected: '', placeholder:'Select Department','_token': '{{ csrf_token()}}'},
                success: function (data) {
                    $('#department_id').html(data);
                }
            });
        });
        $('body').on('change','#department_id',function(){
            $.ajax({
                type: "POST",
                url: '{{route("getDepartmentwiseBranchDesignations")}}',
                data: {table: 'org_branch_designations',field: 'department', value:this.value, label:'designation',selected: '', placeholder:'Select Designation','_token': '{{ csrf_token()}}'},
                success: function (data) {
                    $('#designation_id').html(data);
                }
            });
        });



let validateStr = (stringToValidate) => {
  var pattern = /[a-zA-Z]+[(@!#\$%\^\&*\)\(+=._-]{1,}/;
  if ( stringToValidate && stringToValidate.length > 2 && pattern.test(stringToValidate)) {
    console.log('dd');
    return true;
  } else {
    console.log('ddf');
    return false;
  }
};

  </script>
@endsection
