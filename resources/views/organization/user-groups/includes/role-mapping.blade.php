<?php 
if(isset($group_details)){

$branch_id = $group_details->departmentInfo->branch_id;
$department_id = $group_details->department_id;


}else {
$branch_id = "";
$department_id = "";

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
			 {{Form::select('group[branch_id]',$branches,$branch_id,['id'=>'branch_id','class'=>'form-control chosen-select', 'placeholder'=>'Branch'])}}
			<span class="error"></span>
			</div>
		</div>
		<div class="col-lg-6 fl">
        <div class="form-group">
            {{Form::label('department_id','Department',['class'=>''])}} <span class="text-red">*</span>
			 {{Form::select('group[department_id]',$departments,$department_id,['id'=>'department_id','class'=>'form-control chosen-select', 'placeholder'=>'Department'])}}
            <span class="error"></span>
        </div>
    </div> 
	<div class="col-md-6">
		<div class="form-group">
		{{Form::label('users','Select Users',['class'=>''])}} <span class="text-red">*</span>
		 {{Form::select('group[branch_id]',$branches,$branch_id,['id'=>'branch_id','class'=>'form-control chosen-select', 'placeholder'=>'Branch'])}}
		<span class="error"></span>
		</div>
	</div>

  </div>
	
</div>


</div>
