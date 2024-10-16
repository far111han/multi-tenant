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


						<!--/app header-->
					
<div class="row ">

<div class="col-md-12">

            
                <div class="row">
                    <div class="col-md-8 col-md-offset-1" id="err_msg">
                    </div>
					
                </div>
              
 
              

              

	
</div>

			
					

										<div class="e-panel card">
											<div class="card-body">
											{{ Form::open(array('url' => "organization/assign-users", 'id' => 'userAssignForm', 'name' => 'userAssignForm', 'class' => '','files'=>'true')) }}
												<div class="e-table">
													<div class="table-responsive table-lg mt-3">
																<table class="table table-bordered table-striped text-nowrap " >
															<thead>
																<tr>
																	<th class="align-top border-bottom-0 wd-5 notexport">Select</th>
																	<th class="border-bottom-0 w-20">Name</th>
																	
																	
																	<th class="border-bottom-0 w-15">Designation</th>
																	
																	
																	
																	
																</tr>
															</thead>

															<tbody>

																@if($users && count($users) > 0)
                    											@foreach($users as $row)
																<tr>
																	<td class="align-middle select-checkbox" id="moduleid" data-value="{{$row['id']}}">
																		<label class="custom-control custom-checkbox">
																		@if(in_array($row->id, $existing_users))
																			<input type="checkbox" name="user_id[]" checked value="{{$row->id}}">
														
														@else
<input type="checkbox" name="user_id[]" value="{{$row->id}}">														@endif 
																			
																			<!--{{ $loop->iteration }}-->
																		</label>
																	</td>
																	<td class="align-middle" >
																		<div class="d-flex">
																			
																			
																				<h6 class=" font-weight-bold"> {{$row->fname." ".$row->lname}} </h6>
																				
																			
																		</div>
																	</td>
																	<td class="text-nowrap align-middle">
																	    
																		<p>{{ @$row->designationInfo->designation}}</p>
																	</td>
																	
																	
																	
																</tr>
																     @endforeach
                @endif
																
																
																
																
															</tbody>
														</table>
													</div>
												</div>
												<button type="submit" id="save_btn1" class="btn btn-primary mt-4 mb-0">Add Users </button>
											{{Form::close()}}
											</div>
										</div>
									
</div>

<!-- End Row-->
						

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

<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<script src="{{URL::asset('admin/assets/plugins/fileupload/js/dropify.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/filupload.js')}}"></script>

<!--INTERNAL ECharts js-->
<script src="{{URL::asset('admin/assets/plugins/echarts/echarts.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/datatable/tables/org/user-group.js')}}"></script>
<script type="text/javascript">


		
	

  </script>
@endsection