<?php
if(isset($group_details)){

 //dd($group_details);
    $groupname      = $group_details->name;
    $description    = $group_details->desc;
    $zoom_licence   = $group_details->zoom_licence;
    $traininglevel  = unserialize($group_details->training_levels);
    $status         = $group_details->is_active;
}else {
    $groupname = "";
    $description = "";
    $traininglevel="";
    $status="1";
    $zoom_licence=null;
}

?>

<div class="row container">

    <span class="dept_error" style="color:red;"></span>

    <div class="col-md-12">
        
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('name','Group Name',['class'=>''])}} <span class="text-red">*</span>
                        {{Form::text('group[name]',$groupname,['id'=>'name','class'=>'form-control ', 'placeholder'=>'Group Name'])}}
                        <span class="error name"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('training_levels','Training Level',['class'=>''])}} <span class="text-red">*</span>
                        {{Form::select('group[training_levels][]',$traininglevels,$traininglevel,['id'=>'training_levels','class'=>'form-control chosen-select myselect ', 'multiple'=>'multiple'])}}
                        <span class="error training_levels"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('zoom_licence','Zoom Licence',['class'=>''])}} <span class="text-red">*</span>
                        {{Form::text('group[zoom_licence]',$zoom_licence,['id'=>'zoom_licence','class'=>'form-control', 'maxlength'=>'10', 'placeholder'=>'Zoom Licence'])}}
                        <span class="error zoom_licence"></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('desc','Description',['class'=>''])}}
                        {{Form::textarea('group[desc]',$description,['id'=>'desc', 'class'=>'form-control','placeholder'=>'Description','rows'=>2])}}
                        <span class="error "></span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                            {{Form::label('status','Status',['class'=>''])}} <span class="text-red">*</span>
                            <div class="col-12">
                                <div class="row">
                                    <label class="custom-control custom-radio custom-control-sm w-auto float-left col-2">
                                        <input type="radio" name="group[status]" class='custom-control-input cus_radio' {{ ($status=="1")? "checked" : "" }} value="1" >
                                        <span class="custom-control-label custom-control-label-sm"> <div class="pl-1">Yes</div> </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-sm w-auto float-left col-2">
                                        <input type="radio" name="group[status]" class='custom-control-input cus_radio' value="0" {{ ($status=="0")? "checked" : "" }} >
                                        <span class="custom-control-label custom-control-label-sm"> <div class="pl-1">No</div> </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <span class="error"></span>
                    </div>
                </div>

            </div>

    </div>

</div>
