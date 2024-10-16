<?php
if(isset($user_details)){
$role_id            = $user_details->role_id;
$is_temporary       = $user_details->is_temporary;
$branch_head        = $user_details->branch_head;
$department_head    = $user_details->department_head;
$end_date           = date('Y-m-d',strtotime($user_details->end_date));

} else {

$is_temporary = "1";
$branch_head = "0";
$department_head = "0";
$end_date = "";
$designations=[];
$departments=[];
}

?>
<div class="row container">

<h4 class="pl-4"></h4>
<span class="dept_error" style="color:red;"></span>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				{{Form::label('branch_id','Branch Name',['class'=>''])}} <span class="text-red">*</span>
				<select id="branch_id" class="form-control chosen-select" name="user[branch_id]" required="required">
					<option value="">Branch</option>
					@foreach($branches as $branch)
						<option value="{{$branch->id}}" @if($branch->id == $branch_id) selected @endif data-head="{{$branch->branch_head}}">{{$branch->branch_name}}</option>
					@endforeach
				</select>
				<span class="error"></span>
				</div>
			</div>
			 <div class="col-lg-6 fl">
			<div class="form-group">
				{{Form::label('department_id','Department',['class'=>''])}} <span class="text-red">*</span>
				 <!-- {{Form::select('user[department_id]',$departments,$department_id,['id'=>'department_id','class'=>'form-control chosen-select', 'placeholder'=>'Department'])}} -->
				 <select id="department_id" class="form-control chosen-select" name="user[department_id]" required="required">
					<option value="">Department</option>
					@foreach($departments as $dept)
						<option value="{{$dept->id}}" @if($dept->id == $department_id) selected @endif data-head="{{$dept->head}}">{{$dept->name}}</option>
					@endforeach
				</select>
				<span class="error"></span>
			</div>
		</div>
		<div class="col-md-6">
				<div class="form-group">
					<div class="form-group">
						{{Form::label('user[branch_head]','Branch Head',['class'=>''])}} <span class="text-red">*</span>
						<div class="col-12">
							<label class="custom-control custom-radio custom-control-sm w-auto mr-4">
								<input type="radio" name="user[branch_head]" class='custom-control-input cus_radio' required="required"  {{ ($branch_head=="1")? "checked" : "" }} value="1" >
								<span class="custom-control-label custom-control-label-sm"> Yes </span>
							</label>
							<label class="custom-control custom-radio custom-control-sm w-auto">
								<input type="radio" name="user[branch_head]" class='custom-control-input cus_radio' required="required" {{ ($branch_head=="0")? "checked" : "" }} value="0" >
								<span class="custom-control-label custom-control-label-sm">No</span>
							</label>
						</div>
					<div class="clr"></div>
					</div>
				<span class="error"></span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<div class="form-group">
						{{Form::label('user[department_head]','Department Head',['class'=>''])}} <span class="text-red">*</span>
						<div class="col-12">
							<label class="custom-control custom-radio custom-control-sm w-auto mr-4">
								<input type="radio" name="user[department_head]" class='custom-control-input cus_radio' required="required"  {{ ($department_head=="1")? "checked" : "" }} value="1" >
								<span class="custom-control-label custom-control-label-sm"> Yes </span>
							</label>
							<label class="custom-control custom-radio custom-control-sm w-auto">
								<input type="radio" name="user[department_head]" class='custom-control-input cus_radio' required="required" {{ ($department_head=="0")? "checked" : "" }} value="0" >
								<span class="custom-control-label custom-control-label-sm">No</span>
							</label>
						</div>
					<div class="clr"></div>
					</div>
				<span class="error"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{{Form::label('designation_id','Designation',['class'=>''])}} <span class="text-red">*</span>
				 {{Form::select('user[designation_id]',$designations,$designation,['id'=>'designation_id','class'=>'form-control chosen-select ', 'required' =>'required', 'placeholder'=>'Designation'])}}
				<span class="error"></span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				{{Form::label('user_type','User Role',['class'=>''])}} <span class="text-red">*</span>
				 {{Form::select('user[user_type]',$userroles,$role_id,['id'=>'user_type','class'=>'form-control chosen-select ', 'required' =>'required', 'placeholder'=>'User Role'])}}
				<span class="error"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="form-group">
						{{Form::label('user[is_temporary]','Role Whether Temporary',['class'=>''])}} <span class="text-red">*</span>
						<div class="col-12">
							<label class="custom-control custom-radio custom-control-sm w-auto mr-4">
								<input type="radio" name="user[is_temporary]" class='custom-control-input cus_radio' required="required" {{ ($is_temporary== "1")? "checked" : "" }} value="1" >
								<span class="custom-control-label custom-control-label-sm"> Yes </span>
							</label>
							<label class="custom-control custom-radio custom-control-sm w-auto">
								<input type="radio" name="user[is_temporary]" class='custom-control-input cus_radio' required="required" {{ ($is_temporary== "0")? "checked" : "" }} value="0" >
								<span class="custom-control-label custom-control-label-sm">No</span>
							</label>
						</div>
					<div class="clr"></div>
					</div>
				<span class="error"></span>
				</div>
			</div>
			<div class="col-6 fl">
				<div class="page-filters" id="ending_date" >
					<?php if(isset($user_details)) { ?>
						{{Form::label('end_date','Privilage ends On',['class'=>''])}}
						{{-- Form::date('user[end_date]',$end_date,['id'=>'end_date','class'=>'form-control'])--}}
						{{Form::text('user[end_date]',$end_date,['id'=>'user_end_date','class'=>'form-control'])}}
					<?php } else{ ?>
					 {{Form::label('end_date','User Privilage ends On',['class'=>''])}}
						{{Form::text('user[end_date]',$end_date,['id'=>'user_end_date','class'=>'form-control'])}}
					<?php } ?>
					<span class="error"></span>
				</div>
			</div>
		</div>
	</div>
    <div class="col-md-12">
        <div class="btn btn-list float-right">
            <button  id="back_btn" type="button" class="btn btn-secondary">Back</button>
            <button  id="save_btn" type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

<!-- Modal form for  Brand Head Already Exist -->
<div class="modal" tabindex="-1" role="dialog" id="branchHeadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Branch Head</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Selected Branch already have branch head assigned. Click Save to continue and update branch head.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary branch-modal-save">Save</button>
        <button type="button" class="btn btn-secondary model-close" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal warning for department head exist -->
<div class="modal" tabindex="-1" role="dialog" id="departmentHeadModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Department Head</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Selected Department already have department head assigned. Click Save to continue and update department head.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary department-modal-save">Save</button>
        <button type="button" class="btn btn-secondary model-close" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
