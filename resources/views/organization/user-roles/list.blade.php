@extends('layouts.organization')
@section('css')
    <link href="{{URL::asset('admin/assets/traffic/web-traffic.css')}}" rel="stylesheet" type="text/css">
    		<link href="{{URL::asset('admin/assets/css/daterangepicker.css')}}" rel="stylesheet" />
@endsection

   @section('page-header')
						<!--Page header-->
						<div class="page-header mt-0 pt-3 pb-4 pl-4" style="background: #fff;">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Hi! Welcome Back</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li> -->
									 <!-- <li class="breadcrumb-item"><a href="{{Route('organization.user-roles')}}">{{$pt_title}}</a></li> -->
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$pt_title}}</a></li>
								</ol>
							</div>
						</div>
						<!--End Page header-->
						@endsection
						@section('content')
<!-- Row -->
<div class="row ">
			{{-- <div class="col-md-12">
				<div class="btn btn-list float-right">
					<a href="{{ url('/organization/user-roles/create') }}"   class="btn btn-primary addmodule"><i class="fe fe-plus mr-1"></i> Add New</a>
				</div>
			</div> --}}
									<div class="col-12 mb-3">
										<div class="e-panel card">
											<div class="card-header justify-content-between">
												<div class="card-title">
													Users
												</div>
												<div>
													<div class="form-group m-0 addbtn">
														<a href="{{ url('/organization/user-roles/create') }}" type="button" data-id="0" class="btn-lg mt-2 btn-white">+ Add New</a>
													</div>
												</div>
											</div>

											<div class="card-body">
												<div class="e-table">
													<div class="dataTables_wrapper">
														<div class="table-responsive table-lg mt-3">
															<table class="table table-bordered table-striped text-nowrap userroles" id="userroles">
																<thead>
																	<tr>
																		<th class="align-top border-bottom-0 wd-5 notexport">Select</th>
																		<th class="border-bottom-0 w-20">User Role</th>
																		<th class="border-bottom-0 w-20">Role Type</th>
																		<th class="border-bottom-0 w-30">Role Description</th>
																		<th class="border-bottom-0 w-15">Created On</th>
																		<th class="border-bottom-0 w-15">Status</th>
																		<th class="border-bottom-0 w-10 notexport">Actions</th>
																	</tr>
																</thead>

																<tbody>

																	@if($userroles && count($userroles) > 0)
																	@foreach($userroles as $row)
																	<tr>
																		<td class="align-middle select-checkbox" id="moduleid" data-value="{{$row['id']}}">
																			
																				{{-- <input type="checkbox" name="">
																				<!--{{ $loop->iteration }}--> --}}
																			
																		</td>
																		<td class="align-middle" >
																			<div class="d-flex">
																				<!-- <h6 class=" font-weight-bold"><a href="{{ url('admin/user-roles/view/') }}/{{$row['id']}}"> {{$row['usr_role_name']}}</a></h6> -->
																				<h6 class=" font-weight-bold">{{$row['usr_role_name']}}</h6>

																			</div>
																		</td>
																		<td class="align-middle" >
																			<div class="d-flex">
																				<!-- <h6 class=" font-weight-bold"><a href="{{ url('admin/user-roles/view/') }}/{{$row['id']}}"> {{$row['usr_role_name']}}</a></h6> -->
																				<p>{{$row['usr_role_type']}}</p>

																			</div>
																		</td>
																		<td class="text-nowrap align-middle">
																			@php	$usr_role_desc = Str::of($row['usr_role_desc'])->limit(20); @endphp
																			<p>{{$usr_role_desc}}</p>
																		</td>
																		<td class="text-nowrap align-middle"><span>{{date('d M Y',strtotime($row['created_at']))}}</span></td>
																		<td class="text-nowrap align-middle" data-search="@if($row['is_active'] ==1){{ "Active" }}@else{{ "Inactive" }}@endif">


																			<div class="switch">
																			<input class="switch-input status-btn active_status" data-selid="{{$row['id']}}"  id="status-{{$row['id']}}"  type="checkbox" @if($row['id'] ==1) {{ "checked disabled" }}   @endif  @if($row['is_active'] ==1) {{ "checked" }} @endif >
																			<label class="switch-paddle" for="status-{{$row['id']}}">
																			<span class="switch-active" aria-hidden="true"></span>
																			<span class="switch-inactive" aria-hidden="true"></span>
																			</label>
																			</div>

																		</td>


																		<td class="align-middle">
																			<div class="btn-group align-top">

																			<a href="{{ url('organization/user-roles/edit/') }}/{{$row['id']}}" class="mr-2 btn btn-sm border-0"><i class="fe fe-edit text-green mr-1"></i></a>

																				<button  class="btn btn-sm deleteTP border-0" type="button" data-users="" onclick="deleterole({{$row['id']}});"><i class="fe fe-trash-2 text-red mr-1"></i></button>

																			</div>
																		</td>

																	</tr>
																		@endforeach
																		@endif

																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
<!-- End Row-->

@endsection
@section('js')

<script src="{{URL::asset('admin/assets/js/custom.js')}}"></script>

<script src="{{URL::asset('admin/assets/plugins/morris/raphael-min.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/morris/morris.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/morris.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/datatable/tables/user-roles-datatable.js')}}"></script>
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



  function deleterole(id){
        $('body').removeClass('timer-alert');
        swal({
        title: "Delete Confirmation",
        text: "Are you sure you want to delete this Department?",
        // type: "input",
        showCancelButton: true,
        closeOnConfirm: true,
        confirmButtonText: 'Yes'
        },function(inputValue){



        if (inputValue == true) {
        $.ajax({
        type: "POST",
        url: '{{url("/organization/user-roles/delete")}}',
        data: { "_token": "{{csrf_token()}}", id: id},
        success: function (data) {
        // alert(data);
        if(data ==1){
        toastr.success("User role deleted successfully.");
        }else{
         toastr.error("Failed to deleted.");
        }

        setTimeout(function() { var id = $("ul.tabs > li > a.active").attr("href");
        history.replaceState(null, null, ' ');
        window.location.replace(window.location.href + id);
        location.reload(); }, 1000);
        }
        });

        }
        });
        }

		$(".active_status").on("click", function(e){

        var selid = jQuery(this).data("selid");

        var astatus='0';
        if($(this).prop('checked') == true)
        {
        astatus='1';
        }

        $.ajax({
        type: "POST",
        url: '{{url("/organization/user-roles/status")}}',
        data: { "_token": "{{csrf_token()}}", id: selid,status:astatus},
        success: function (data) {
        // alert(data);
        if(data ==1) {

        if(astatus ==1) {
        	jQuery('#status-'+selid).closest("td").attr("data-search","Active");
              toastr.success("Role activated successfully.");
            }else {
            	jQuery('#status-'+selid).closest("td").attr("data-search","Inactive");
               toastr.success("Role deactivated successfully.");
            }
            var table = $.fn.dataTable.tables( { api: true } );
            table.rows().invalidate().draw();
        }else {
        toastr.error("Failed to update status.");
        }


        }
        });
        });

  </script>
  @endsection
