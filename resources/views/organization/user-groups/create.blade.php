@extends('layouts.organization')

@section('css')

<?php
session()->has('link') ? session('link') : [];
$currentLink = request()->path(); // Getting current URI like 'category/books/'
session()->forget('link');
Session::push('link', $currentLink);
?>
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
    <!-- INTERNAL Select2 css -->
    <link href="{{URL::asset('admin/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <!-- INTERNAL Mutipleselect css-->
    <link rel="stylesheet" href="{{URL::asset('admin/assets/plugins/multipleselect/multiple-select.css')}}">


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
                     <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/organization/user-groups') }}">Group</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Add New User Group</a></li>
                </ol>
            </div>
        </div>
        <!--End Page header-->
    @endsection
	@section('content')

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Add Group
                </div>
            </div>
            <div class="card-body">
                <!--/app header-->
                <div class="main-proifle pt-0 border-0">
                    <div class="profile-cover">
                        <div class="wideget-user-tab">
                            <div class="tab-menu-heading mt-0 p-0 border-0">
                                <div class="tabs-menu1 px-3 pt-2 pb-2">
                                    <ul class="nav tabs nav-tabs border-0 ml-1">
                                        <li><a href="#tab-1" class="active fs-14 tab-1" data-toggle="tab" id="tab1">Group Info</a></li>
                                       <li><a href="#tab-2" data-toggle="tab" class="fs-14 tab-2"  id="tab2">Group Mapping</a></li>
                                        <li><a href="#tab-3" data-toggle="tab" class="fs-14 tab-3"  id="tab3">Users</a></li>

{{--                                        <li><a <?php if(isset($group_details)){ ?> href="#tab-3"<?php } else { ?>   <?php } ?>  data-toggle="tab" class="fs-14 tab-3"  id="tab3" >Users</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.profile-cover -->
                </div>

                {{ Form::open(array('url' => "organization/user-group/save", 'id' => 'groupForm', 'name' => 'groupForm', 'class' => '','files'=>'true')) }}

                    <!-- Row-1 -->
                    <div class="row" id="brnchs">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="border-0">
                                <div class="tab-content">
                                    @if(isset($group_details))
                                    {{ Form::hidden('id',$group_details->id,['id'=>'group_id'])}}
                                    @endif
                                    <div class="tab-pane active" id="tab-1">
                                        @include('organization.user-groups.includes.create-user-groups')
                                    </div>
                                     <div class="tab-pane " id="tab-2">
                                        @include('organization.user-groups.includes.role-mapping')
                                    </div>
                                    <div class="tab-pane " id="tab-3">
                                        {{-- @include('organization.user-groups.includes.role-mapping') --}}
                                        @include('organization.user-groups.includes.users')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="btn btn-list float-right">
                            <a class="btn btn-secondary" href="#"  data-toggle="tab" id="back" onclick="change_tab()">Back</a>
                            <!-- <a class="btn btn-secondary" href="{{ route('groups.all') }}"   id="back2">Back</a> -->
                            <button id="save_btn" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                {{Form::close()}}
            </div>
        </div>

            </div>
        </div>
        <!-- End app-content-->
    </div>

    <!-- BASIC MODAL -->
    <?php if(isset($group_details)){
        $userIds=$userIds;
        }else {
        $userIds=[];
        }
    ?>

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
<script src="{{URL::asset('admin/assets/js/datatable/tables/org/group-user-list.js')}}"></script>
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
<!-- INTERNAL Multipleselect js -->
		<script src="{{URL::asset('admin/assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('admin/assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{URL::asset('admin/assets/plugins/multipleselect/multi-select.js')}}"></script>

//@huk 12-01-2024
<script type="text/javascript">


    function change_tab()
    {

 $tab1_active_check=$('#tab1').hasClass('active');
 $tab2_active_check=$('#tab2').hasClass('active');
 $tab3_active_check=$('#tab3').hasClass('active');
 if($tab1_active_check==true)
 {
$('#back').removeAttr('data-toggle');

$("#back").attr('href', '{{ route('groups.all')}}');
 $('#back').hide();
 $('#back2').show();

 }
 else
 if($tab2_active_check==true)
 {

 $("#back").attr("data-toggle", "tab");
 $("#tab1").addClass("active");
 $("#tab3").removeClass("active");
 $("#tab2").removeClass("active");
 $("#back").attr('href', '#tab-1');

 }
 else
 if($tab3_active_check==true)
 {

 $("#back").attr("data-toggle", "tab");
 $("#tab2").addClass("active");
 $("#tab3").removeClass("active");
 $("#tab1").removeClass("active");
 $("#back").attr('href', '#tab-2');
 }


}


</script>




  <script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $(document).ready(function() {


	 $('.continue').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
   $('.myselect').select2();
   var table = $('#group-user-list').DataTable();
   $('#dep_users').on('change', function (e) {

	});

	$('#rmv_btn').click( function () {



		var selectedRowInputs = $('.selected input');
        table.rows('.selected').remove().draw( false );
	 $("#users_changed").val("1")


});
 });
$(document).ready(function(){
	$('#filtersec .active_filters').on('change',function(){
            var branch_id  =   $('#filtersec #branch_id').val();
			var dep_id  =   $('#filtersec #dep_id').val();

            $(".userlist").DataTable(
			).ajax.url("{{url('/organization/users')}}?branch_id="+branch_id+"&dep_id="+dep_id).load();
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

$('body').on('submit','#userAssignForm',function(e){
        $('#userAssignForm .error').html('');

            e.preventDefault();
            var formData = new FormData(this);
            $('#userAssignForm #save_btn1').attr('disabled',true); $('#userAssignForm #save_btn1').text('Validating...');
            $.ajax({
                type: "POST",
                url: '{{url("/organization/assign-users/validate")}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == 'success'){

                        $('#userAssignForm #save_btn1').text('Saving...'); $('#groupForm #cancel_btn').trigger('click');
                        getUserassigntable();

					                        $('#userAssignForm #save_btn1').attr('disabled',false);
											$('#userAssignForm #save_btn1').text('Save');
 $("#modaldemo1").modal("hide");

return false;
												//document.groupForm.submit();
                        //submitUserAssignForm(formData,'userAssignForm','save_btn1'); return false;
                         return false;
                    }else{
                        var errKey = ''; var n = 0;
                        $.each(data, function(key,value) { if(n == 0){ errKey = key; n++; }



                        	 	 if(key == "user") { $(".image.error").html(value); }else{
                        	 	 	$('#userAssignForm #'+key).closest('div').find('.error').html(value);
                        	 	 }

                                 if(key =="tab") { $("."+value).click(); }


                        });
                        $('#userAssignForm #'+errKey).focus();
                        $('#userAssignForm #save_btn1').attr('disabled',false); $('#userAssignForm #save_btn1').text('Save'); return false;
                    }
                    return false;
                }
            });



      return false;
    });

    function getUserassigntable(){
		var data = $("#userAssignForm :input").serializeArray();
	 post_var = {'data': data };
        $.ajax({
            type: "POST",
            url: '{{url("/organization/assign-users")}}',
            data: data,
            cache: false,

            async: false,
            contentType: false,
            processData: false,
            success: function (r) {
              if (r.d > 0) {
                        table.row.add([r.d, name, country, "<input type='button' id='btnDelete' value='Delete' class='btn btn-danger' />"]).draw();
                    }
            }
        });
    }



	   function submitUserAssignForm(postValues,form,button){
        $.ajax({
            type: "POST",
            url: '{{url("organization/assign-users/save")}}',
            data: postValues,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
              $('#'+form+' #'+button).attr('disabled',false); $('#'+form+' #'+button).text('Save');
              var msg = 'Successfully Updated!';
              toastr.success(msg);  return false;
            }
        });
    }










 $('body').on('submit','#groupForm',function(e){
        $('#groupForm .error').html('');

            e.preventDefault();
            var formData = new FormData(this);
            $('#groupForm #save_btn').attr('disabled',true); $('#groupForm #save_btn').text('Validating...');
            $.ajax({
                type: "POST",
                url: '{{url("/organization/user-group/validate")}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == 'success'){

                        $('#groupForm #save_btn').text('Saving...'); $('#groupForm #cancel_btn').trigger('click');
                        //document.groupForm.submit();
                        submitForm(formData,'groupForm','save_btn'); return false;
                         return false;
                    }else{
                        var errKey = ''; var n = 0;
                        $.each(data, function(key,value) { if(n == 0){ errKey = key; n++; }



                        	 	 if(key == "user") { $(".image.error").html(value); }else{
                        	 	 	$('#groupForm #'+key).closest('div').find('.error').html(value);
                        	 	 }

                                 if(key =="tab") { $("."+value).click(); }


                        });
                        $('#groupForm #'+errKey).focus();
                        $('#groupForm #save_btn').attr('disabled',false); $('#groupForm #save_btn').text('Save'); return false;
                    }
                    return false;
                }
            });



      return false;
    });

   function submitForm(postValues,form,button){
        $.ajax({
            type: "POST",
            url: '{{url("organization/user-group/save")}}',
            data: postValues,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
              $('#'+form+' #'+button).attr('disabled',false); $('#'+form+' #'+button).text('Save');
              var msg = 'Successfully Updated!';
              toastr.success(msg);
			  window.location.href = '{{url("organization/user-group/edit/")}}'+'/'+data;			  return false;
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
			$('#group-user-list').DataTable().rows().remove().draw();
        });
        $('body').on('change','#department_id',function(){
			var id=this.value;
            $("#assign_btn").attr("href", "/organization/assign-users/"+id)

			$('#group-user-list').DataTable().rows().remove().draw();
	   });




  </script>
@endsection





















