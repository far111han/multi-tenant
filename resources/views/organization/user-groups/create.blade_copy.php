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
    </style>
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
						<div class="main-proifle pt-0">
							<div class="profile-cover">
								<div class="wideget-user-tab">
									<div class="tab-menu-heading mt-0 p-0">
										<div class="tabs-menu1 px-3 pt-2 pb-2">
											<ul class="nav tabs">
												<li><a href="#tab-1" class="active fs-14 tab-1" data-toggle="tab">Group Info</a></li>
												<li><a href="#tab-2" data-toggle="tab" class="fs-14 tab-2">Group Mapping</a></li>

												<li><a href="#tab-3" data-toggle="tab" class="fs-14 tab-3">Users</a></li>

											</ul>
										</div>
									</div>
								</div>
							</div><!-- /.profile-cover -->
						</div>


						{{ Form::open(array('url' => "organization/user-group/save", 'id' => 'groupForm', 'name' => 'groupForm', 'class' => '','files'=>'true')) }}

						<!-- Row-1 -->
						<div class="row" id="brnchs ">
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
											@include('organization.user-groups.includes.users')
										</div>




									</div>
								</div>
							</div>
						</div>

<div class="col-md-12">
<div class="btn btn-list float-right">
<button id="cancel_btn" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button id="save_btn" type="submit" class="btn btn-primary">Save</button>
</div>
</div>

{{Form::close()}}


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






  <script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $(document).ready(function() {
   $('.myselect').select2();

   $('#dep_users').on('change', function (e) {
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
	   $('#group-user-list').DataTable({
		"ajax": {
     "url": "/organization/assign-users",
     "type": "POST",
	 "dataType": "json",
	 "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
     "data": post_var,
		},

	 columns: [

            { data: "id" },
            { data: "name" },
            { data: "designation" },

        ],
		columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
		}],
		pageLength: 10,
        rowReorder: false,
        colReorder: true,
        paging: true,
        pagingType: "simple_numbers",
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        fixedHeader: true,
        orderCellsTop: false,
        keys: false,
        responsive: true,
        processing: true,
        scrollX: false,
        scrollCollapse: true,
        serverSide: true,
        bServerSide: false,
		stateSave: true,
		"bDestroy": true,
		orderMulti: false,
        dom: "Blfrtip",
        stateSave: false,
        order: [[0, "asc"]],
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [
            {
                extend: "selectAll",
                text: '<i class="fa fa-check"></i>All',
                titleAttr: "Select All"
            },
            {
                extend: "selectNone",
                text: '<i class="fa fa-times"></i>None',
                titleAttr: "Deselect All"
            },

            {
                extend: "excelHtml5",
                text: '<i class="fa fa-file-excel-o"></i>Excel',
                title: "Departments",
                titleAttr: "Export to Excel",
                filename: "Assigned_users",
                exportOptions: {
                    columns: ":visible :not(.notexport)",
                    search: "applied",
                    order: "applied",
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "colvis",
                text: '<i class="fa fa-filter"></i>Filter',
                titleAttr: "Filter Columns"
            },
//            {
//                extend: 'print',
//                footer: false
//            }
        ],
        columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
		}],
        select: {
            style: "multi",
            selector: "td:first-child"
        },
        language: {
            decimal: "",
            emptyTable: "No users found",
            info: "Showing _START_ to _END_ of _TOTAL_ Departments",
            infoEmpty: "Showing 0 to 0 of 0 Departments",
            infoFiltered: "(filtered from _MAX_ total Departments)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Show _MENU_ Departments",
            loadingRecords: "Loading...",
            processing: "Processing...",
            search: "Search:",
            zeroRecords: "No matching Departments found",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            },
            aria: {
                sortAscending: ": activate to sort column ascending",
                sortDescending: ": activate to sort column descending"
            },
            buttons: {
                copyTitle: 'Copied to clipboard',
                copySuccess: {
                    _: "%d rows copied",
                    1: "1 row copied"
                }
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
              toastr.success(msg);  return false;
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
        });
        $('body').on('change','#department_id',function(){
            $.ajax({
                type: "POST",
                url: '{{url("/organization/department_user/getDropdown")}}',
                data: {table: 'org_users',field: 'department_id', value:this.value, label:'id',selected: '<?php echo json_encode($userIds); ?>', placeholder:'Select Users','_token': '{{ csrf_token()}}'},
                success: function (data) {
                    $('#dep_users').html(data);

$("#dep_users").multipleSelect();
                }
            });
        });


		$(document).ready(function() {
  var table = $('#group-user-list').DataTable();

  $('#group-user-list tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  } );

  $('#rmv_btn').click( function (e) {
    e.preventDefault();
    var selectedRowInputs = $('.selected input');

    //use the serialized version of selectedRowInputs as the data
    //to be sent to the AJAX request
let newDataSet = [];
  table.rows( '.selected' ).remove().draw();
  table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
    let row = this;
    newDataSet.push(row.data());
  });
  dataSet = newDataSet;
   $("#users_changed").val("1")
    console.log('serlialized inputs: ',selectedRowInputs.serialize());
    /*
      $.ajax({
        type: "POST",
        url: "/entershowoptions",
        data: selectedRowInputs.serialize()
      });
    */
  });
});

  </script>
@endsection





















