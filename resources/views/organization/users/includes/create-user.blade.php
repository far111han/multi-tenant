<?php
if (isset($user_details)) {
    // dd($organization);
    $firstName = $user_details->fname;
    $lastName = $user_details->lname;
    $job_title = $user_details->job_title;
    $email = $user_details->email;
    $isd = $user_details->isd_code;
    $phone = $isd . ' ' . $user_details->phone;
    $status = $user_details->is_active;
    $gender = $user_details->gender;
    $avatar = $user_details->avatar;
    $userType = $user_details->role_id;
    $dob = $end_date = date('Y-m-d', strtotime($user_details->dob));
} else {
    $firstName = '';
    $lastName = '';
    $job_title = '';
    $email = '';
    $isd = '';
    $phone = '';
    $status = '1';
    $gender = '1';
    $avatar = '';
    $userType = '';
	$dob ='';
}

?>

<div class="row container">

    <h4 class="pl-4"></h4>
    <span class="dept_error" style="color:red;"></span>
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 fl">
                <div class="admin-profile-img float-right">
                    @if ($avatar)
                        <img src="{{ url('storage/tenant_' . tenant()->id . $avatar) }}" alt="{{ $firstName }}"
                            width="90px">
                    @else
                        <img src="{{ tenantAsset() . 'admin/assets/images/admin_default.png' }}" alt="default avatar"
                            width="100px">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('first_name', 'First Name', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::text('user[first_name]', $firstName, ['id' => 'first_name', 'class' => 'form-control ', 'placeholder' => 'First Name', 'required' => 'required']) }}
                    <span class="error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('last_name', 'Last Name', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::text('user[last_name]', $lastName, ['id' => 'last_name', 'class' => 'form-control ', 'placeholder' => 'Last Name', 'required' => 'required']) }}
                    <span class="error"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('designation', 'Job Title', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::text('user[designation]', $job_title, ['id' => 'designation', 'class' => 'form-control ', 'placeholder' => 'Job Title', 'required' => 'required']) }}
                    <span class="error"></span>
                </div>
            </div>




            <div class="col-lg-6 fl">
                <div class="form-group">
                    {{ Form::label('email', 'Email ID', ['class' => '']) }} <span class="text-red">*</span>
                    {{ Form::text('user[email]', $email, ['id' => 'email', 'class' => 'form-control ', 'placeholder' => 'Email ID', 'required' => 'required']) }}
                    <span class="error"></span>
                </div>
            </div>
            <div class="col-lg-6 fl">
                <div class="form-group ">
                    <label for="mobile-number" id="">Phone </label> <span class="text-red">*</span>

                    <input type="tel" id="mobile-number" style="width:100%" name="user[mobile-number]"
                        class="form-control" value="{{ $phone }}" placeholder="e.g. +1 702 123 4567">
                    <span class="error"></span>

                </div>

            </div>



            <div class="col-lg-6 fl">
                <div class="form-group">
                    {{ Form::label('password', 'Password', ['class' => '']) }}
                    <input type="password" name="user[password]" id="password" class="form-control" autocomplete="off"
                        placeholder="Password" aria-label="Password">
                    <span class="error"></span>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <label for="avatar">Avatar</label>
                {{ Form::file('avatar', ['id' => 'avatar', 'class' => 'form-control', 'accept' => 'image/*']) }}
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                        {{ Form::label('status', 'Status', ['class' => '']) }} <span class="text-red">*</span>
                        <div class="col-12">
                            <label class="custom-control custom-radio custom-control-sm w-auto mr-4">
                                <input type="radio" name="user[status]" class='custom-control-input cus_radio'
                                    value="1" @if ($status == 1) checked @endif>
                                <span class="custom-control-label custom-control-label-sm"> Active </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-sm w-auto">
                                <input type="radio" name="user[status]" class='custom-control-input cus_radio'
                                    value="0" @if ($status == 0) checked @endif>
                                <span class="custom-control-label custom-control-label-sm">Inactive</span>
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
                        {{ Form::label('gender', 'Gender', ['class' => '']) }} <span class="text-red">*</span>
                        <div class="col-12">
                            <label class="custom-control custom-radio custom-control-sm w-auto mr-4">
                                <input type="radio" name="user[gender]" class='custom-control-input cus_radio'
                                    value="1" @if ($gender == 1) checked @endif>
                                <span class="custom-control-label custom-control-label-sm"> Male </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-sm w-auto">
                                <input type="radio" name="user[gender]" class='custom-control-input cus_radio'
                                    value="0" @if ($gender == 0) checked @endif>
                                <span class="custom-control-label custom-control-label-sm">Female</span>
                            </label>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <span class="error"></span>
                </div>

            </div>
            <div class="col-lg-6 fl">
                <div class="form-group">
                    {{ Form::label('dob', 'DOB', ['class' => '']) }}
                    <input type="date" name="user[dob]" id="dob" class="form-control" autocomplete="off"
                        placeholder="Password" aria-label="Password" value="{{ $dob }}">
                    <span class="error"></span>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-12">
        <div class="btn btn-list float-right">
            <a href="#" id="next_to_map_roles_btn" class="btn btn-secondary next_to_map_roles_btn"> Next to Map
                Roles </a>
        </div>
    </div>

</div>
