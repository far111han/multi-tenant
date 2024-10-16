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
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Groups</a></li>
                </ol>
            </div>
        </div>
        <!--End Page header-->
   @endsection

   @section('content')	

        <!--/app header-->
                        
        <div class="row">

            <div class="e-panel card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        User Groups
                    </div>
                    <div>
                        <div class="form-group m-0 addbtn">
                            <a href="{{ url('/organization/user-groups/create') }}" class="btn btn-primary"><i class="fe fe-plus mr-1"></i> Add New</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-1" id="err_msg">
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-md-8 col-md-offset-1" id="err_msg">
                        </div>
        
                        <div class="col-md-12">
                            <div id="filters" class="">
                                <div class="row" id="filterrow">
                                    <div class="plus-minus-toggle collapsed"><p>Filters</p></div>
                                </div>
        
                                <div class="row no-disp mb-4" id="filtersec">
                                    <div class="col-3">
                                        <div class="page-filters">
                                            {{Form::label('branch_id','Branch',['class'=>''])}}
                                            {{Form::select('branch_id',$branches,'',['id'=>'branch_id','class'=>'form-control mr-4 active_filters','placeholder'=>'All Branches'])}}
                                        </div>
                                    </div>
        
                                    <div class="col-3">
                                        <div class="page-filters">
                                            {{Form::label('dep_id','Department',['class'=>''])}}
                                            {{Form::select('dep_id',$department,'',['id'=>'dep_id','class'=>'form-control mr-4 active_filters','placeholder'=>'All Departments'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-1">
                                <button class="btn whit-btn" style="width: 100%;" type="button" id="show-filter"><i class="fa fa-filter" aria-hidden="true"></i>
                                    Filter</button>
                            </div>
                        </div>

                        <div class="course-filter px-3 mt-4" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row" id="filtersec">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="page-filters">
                                                    {{-- {{Form::label('branch_id','Branch',['class'=>''])}} --}}
                                                    {{Form::select('branch_id',$branches,'',['id'=>'branch_id','class'=>'form-control mr-4 active_filters','placeholder'=>'All Branches'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="page-filters">
                                                    {{-- {{Form::label('dep_id','Department',['class'=>''])}} --}}
                                                    {{Form::select('dep_id',$department,'',['id'=>'dep_id','class'=>'form-control mr-4 active_filters','placeholder'=>'All Departments'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group float-right">
                                                <button type="submit" class="btn whit-btn" id="searchButton">Search</button>
                                                <a href="{{ route('organization.my_training_programs.index') }}" class="btn whit-btn" style="color: #e71440 !important;"
                                                    id="resetButton">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="e-table">
                        <div class="table-responsive table-lg mt-3">
                            <table class="table table-striped text-nowrap usergroups" style= "width:100%!important">
                                <thead>
                                    <tr>
                                        <th class="align-top border-bottom-0 wd-5 notexport">Select</th>
                                        <th class="border-bottom-0 w-20">Group Name</th>
                                        <th class="border-bottom-0 w-35">Description</th>
                                        <th class="border-bottom-0 w-35">Users</th>
                                        <th class="border-bottom-0 w-15">Created On</th>
                                        <th class="border-bottom-0 w-10">Status</th>								
                                        <th class="border-bottom-0 w-15 notexport">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<script>
    $(document).ready(function(){
        $('#show-filter').click(function() {
          $('.course-filter').toggle("slow");
        });
    });
</script>
<script type="text/javascript">

 $('body').on('change','#branch_id',function(){
            $.ajax({
                type: "POST",
                url: '{{url("/organization/user/getDropdown")}}',
                data: {table: 'org_branch_departments',field: 'branch_id', value:this.value, label:'name',selected: '', placeholder:'Select Department','_token': '{{ csrf_token()}}'},
                success: function (data) {
                    $('#dep_id').html(data);
                }
            });
        });
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); 
    
    $(document).ready(function(){ 
       // $('.plus-minus-toggle').on('click', function(){ $(this).toggleClass('collapsed'); $('#filtersec').toggle('slow'); }); 
        $('#filtersec .active_filters').on('change',function(){ 
            var branch_id  =   $('#filtersec #branch_id').val();
			var dep_id  =   $('#filtersec #dep_id').val();
			
            $(".usergroups").DataTable(
			).ajax.url("{{url('/organization/user-groups')}}?branch_id="+branch_id+"&dep_id="+dep_id).load();
        });
            @if(Session::has('message'))
            @if(session('message')['type'] =="success")
            
            toastr.success("{{session('message')['text']}}"); 
            @else
            toastr.error("{{session('message')['text']}}"); 
            @endif
            @endif
            
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.error("{{$error}}"); 
            
            @endforeach
            @endif
    });
    </script>




<script type="text/javascript">



$(document).ready(function(){

	    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 

  $(".org_image").dropify();





 $('body').on('submit','#OrgBasicForm',function(e){ 
        $('#OrgBasicForm .error').html('');
      
            e.preventDefault();    
            var formData = new FormData(this);
            $('#OrgBasicForm #save_btn').attr('disabled',true); $('#OrgBasicForm #save_btn').text('Validating...'); 
            $.ajax({
                type: "POST",
                url: '{{url("/organization/details/validate")}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == 'success'){ 
                        $('#OrgBasicForm #save_btn').text('Saving...'); $('#OrgBasicForm #cancel_btn').trigger('click'); 
                        // document.register.submit(); 
                        submitForm(formData,'OrgBasicForm','save_btn'); return false;
                         return false;
                    }else{
                        var errKey = ''; var n = 0;
                        $.each(data, function(key,value) { if(n == 0){ errKey = key; n++; }

                       
                        	 	 
                        	 	 if(key == "org_image") { $(".image.error").html(value); }else{
                        	 	 	$('#OrgBasicForm #'+key).parents('.form-group').find('.error').html(value);
                        	 	 }

                                   if(key =="tab") { $("."+value).click(); }
                        	 
                           
                        }); 
                        $('#OrgBasicForm #'+errKey).focus();
                        $('#OrgBasicForm #save_btn').attr('disabled',false); $('#OrgBasicForm #save_btn').text('Save'); return false;
                    }
                    return false;
                }
            });


        
      return false; 
    });

 


  
  function submitForm(postValues,form,button){
        $.ajax({
            type: "POST",
            url: '{{url("organization/details/save")}}',
            data: postValues,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) { 
              $('#'+form+' #'+button).attr('disabled',false); $('#'+form+' #'+button).text('Save');
              var msg = 'Details updated successfully!'; 
              toastr.success(msg);  return false;
            } 
        });
    }

  });
 
      $(function() {
    $('body').on('change', '.active_status', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var selid = this.id.replace('status-','');

        $.ajax({
            type: "POST",
            url: '{{url("/organization/user-group/status")}}',
            data: { "_token": "{{csrf_token()}}", id: selid,status: status},
            success: function (data) {
            $(".userlist").DataTable().ajax.reload();
                console.log(data.success)
            }
        });
        
        if(status ==1) {
              toastr.success("Group activated successfully.");   
            }else {
               toastr.success("Group deactivated successfully.");  
            }
    });
	});
		  function deleteGroup(id){
        $('body').removeClass('timer-alert');
        swal({
        title: "Delete Confirmation",
        text: "Are you sure you want to delete this Group?",
        // type: "input",
        showCancelButton: true,
        closeOnConfirm: true,
        confirmButtonText: 'Yes'
        },function(inputValue){



        if (inputValue == true) {
        $.ajax({
        type: "POST",
        url: '{{url("/organization/user-group/delete")}}',
        data: { "_token": "{{csrf_token()}}", id: id},
        success: function (data) {
        // alert(data);
        if(data ==1){
        toastr.success("Group deleted successfully."); 
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
		
		
	

  </script>
@endsection