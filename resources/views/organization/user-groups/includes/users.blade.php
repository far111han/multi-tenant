<?php
if (isset($group_details)) {
    Session::push("group_id", $group_details->id);
}
if (isset($group_users)) {
    $group_users = $group_users;
} else {
    $group_users = [];
}
?>
	<!--/app header-->

<div class="row ">

<div class="col-md-12">


                <div class="row">
                    <div class="col-md-8 col-md-offset-1" id="err_msg">



                    </div>

                </div>





	<div class="row ">

	<div class=" col-md-12  d-flex justify-content-end  ">
	       <input type="hidden" name="users_changed" id="users_changed"  value="{{ session()->has('users') ? '1' : '0' }}"  >
		<div class="col-md-3 d-flex justify-content-end" >

			<div class="mb-5">
			{{-- <?php if (isset($group_details)) { ?>
			<a href="/organization/assign-users/{{ $group_details->department_id }}"  class="btn btn-primary" id="assign_btn"><i class="fe fe-plus mr-1"></i> Add New</a>
			<?php } else { ?>
						<a href=""  class="btn btn-primary" id="assign_btn"><i class="fe fe-plus mr-1"></i> Add New</a>
			<?php } ?> --}}
			<!--<a data-target="#modaldemo1" data-toggle="modal" class="btn btn-primary"><i class="fe fe-plus mr-1"></i> Add New</a>-->
			<button type="button" class="btn btn-primary" id="rmv_btn"><i class="fe fe-minus mr-1"></i> Remove</button>

			</div>
			</div>


	</div>
	</div>

</div>

	<div class="e-panel">
		
			<div class="e-table">
				<div class="table-responsive table-lg mt-3">
					<table class="table table-striped text-nowrap" id="group-user-list" style="width:100%" >
						<thead>
							<tr>
								<th class="align-top border-bottom-0 wd-5 notexport">Select</th>
								<th class="border-bottom-0 w-20">Name</th>
								<th class="border-bottom-0 w-15">Designation</th>
							</tr>
						</thead>
						<tbody id="assigned_users">
							<!--hemanth-->
							{{-- @for($i = 0; $i < 100; $i++)
							<tr>
								<td class="align-middle select-checkbox" id="moduleid" data-value="">xx</td>
									<td class="align-middle "  data-value="">ddd</td>
									<td class="align-middle "  data-value="">ss</td>
							</tr>
							@endfor --}}
							<!--hemanth-->
							@if(session()->has('users'))
							@foreach (Session::get('users') as $arrKey => $arrVal)

								@foreach(Session::get('users')[$arrKey] as $key=>$value)

								<tr>
									<td class="align-middle select-checkbox" id="moduleid" data-value="">
										<label class="custom-control custom-checkbox">

										</label>
										<input type="hidden" name="user_id[]" value="{{ Session::get('users')[$arrKey][$key]['id']	}}">
									</td>


									<td class="align-middle " id="moduleid" data-value="">
										{{ Session::get('users')[$arrKey][$key]['name']	}}
									</td>
									<td class="align-middle " id="moduleid" data-value="">
										{{ Session::get('users')[$arrKey][$key]['designation']	}}
									</td>
									@endforeach
								</tr>

								@endforeach
								@else

									@foreach($group_users as $user)
								<tr>
									<td class="align-middle select-checkbox" id="moduleid" data-value="">
										<label class="custom-control custom-checkbox">

										</label>
										<input type="hidden" name="user_id[]" value="{{ $user->id		}}">
									</td>
									<td class="align-middle " id="moduleid" data-value="">
										{{ $user->userInfo->fname	}}
									</td>
									<td class="align-middle " id="moduleid" data-value="">
										{{ @$user->userInfo->designationInfo->designation	}}
									</td>
									@endforeach
								</tr>

							@endif

						</tbody>



					</table>
				</div>
			</div>
		
	</div>

</div>

<!-- End Row-->
