<?php
if (isset($userrole)) {
    $role = $userrole->role;
    $desc = $userrole->desc;
    $is_active = $userrole->is_active;
} else {
    $role = '';
    $desc = '';
    $is_active = '1';
}
?>


<style type="text/css">
    #departmentlist {
        width: auto !important;
    }
</style>

<div class="row">

    {{-- <h4 class="pl-4"></h4> --}}
    <span class="dept_error" style="color:red;"></span>
    {{ Form::open(['url' => 'branch/details/save', 'id' => 'BranchBasicForm', 'name' => 'BranchBasicForm', 'class' => '', 'files' => 'true']) }}

    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                    {{ Form::label('User Role', 'User Role', ['class' => '']) }} <span class="text-red">*</span>
                    <input type="text" id="role" name="user[role]" value="{{ $role }}"
                        class="form-control" placeholder="Role">
                    <span class="error role"></span>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                    {{ Form::label('Role Type', 'Role Type', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::select('user[role_type]', ['learner' => 'Learner', 'training_admin' => 'Training Administrator', 'trainer' => 'Trainer', 'management' => 'Management', 'organization_admin' => 'Organization Admin', 'branch_admin' => 'Branch Admin'], @$userrole->role_type, ['class' => 'form-control']) }}
                    <span class="error role_type"></span>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="form-group">
                    {{ Form::label('description', 'Role Description', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::textarea('user[desc]', $desc, ['id' => 'desc', 'class' => 'form-control', 'placeholder' => 'Role Description', 'rows' => 1]) }}
                    <span class="error desc1"></span>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="form-group">
                    {{ Form::label('Status', 'Status', ['class' => '']) }} <span class="text-red">*</span>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-2 pl-0">
                                <input type="radio" id="option1" name="user[status]" value="1"
                                    {{ $is_active == '1' ? 'checked' : '' }}>Active</label>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 pl-0">
                                <input type="radio" id="option2" name="user[status]" value="0"
                                    {{ $is_active == '0' ? 'checked' : '' }}>Inactive</label>
                            </div>
                            <span class="error"></span>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>






</div>
