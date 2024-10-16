<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Validator;
use DB;
use App\Models\Organization\OrganizationAdmin;
use App\Models\Organization\UserRole;
use App\Models\Organization\Modules;
use App\Models\Organization\OrganizationUserRoleAction;


class UserRoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:management,admin,organization');
    }
	public function userRole(){
		$data['pt_title']           =   'User Roles';
        $data['title']              =   'User Roles';
        $data['menuGroup']          =   'UserRole';
        $data['menu']               =   'user-roles';
        $data['userroles'] = UserRole::getUserRoles();


        return view('organization.user-roles.list',$data);
    }
	public function createRole(){
		$data['pt_title']           =   'User Roles';
        $data['menu']               =  'create-user-role';
        $data['modules']            =  Modules::getModules();

        return view('organization.user-roles.create',$data);
    }
	public function validateRole(Request $request){
         $post           =  (object)$request->post();
         $existName      =  $error = false;
		 $rules          =   [
            'role' => ['required', 'string', 'max:255'],
            'role_type' => ['required', 'string'],
			'desc' => ['required', 'string',  'max:1000'],
			'status'=>  ['required']
            ];
			if(isset($post->id))
			{
				$id=$post->id;
			}
			else{
				$id='';
			}
			//$validator   =   Validator::make($request->post() ,$rules);
			$validator              =   Validator::make($post->user ,$rules);
				if ($validator->fails()) {
                   foreach($validator->messages()->getMessages() as $k=>$row){ $error[$k] = $row[0]; }
				    if(! isset($error['tab'])){ $error['tab'] = 'tab-1'; }
                }
				if($error == false){
					$existName     =   UserRole::ValidateUnique($post->user['role'],$id);

                }
                if($existName){
					$error['role']    =   $existName;
					 if(! isset($error['tab'])){ $error['tab'] = 'tab-1'; }
                }

		if($error) { return $error; }else{ return 'success'; } return 'success';
    }
	function roleSave(Request $request){
        $post  = (object)$request->post();
		$input = $request->all();
        $tenant_id = tenant()->id;

        $tenant_id = tenant()->id;
		$role_details = [];
        $role_details['role'] = $post->user['role'];
        $role_details['role_type'] = $post->user['role_type'];
        $role_details['desc'] = $post->user['desc'];
        $role_details['is_active'] = $post->user['status'];
		// $role_details['role_type'] = "admin";
		if(isset($post->id)){
				$role_id=$post->id;
		}else{
			$role_id="";
		}

		if($role_id > 0)
		{

			$update =  UserRole::where('id',$role_id)->update($role_details);
			 if($input['module_changed'] ==1) {
				 		DB::table('org_usr_role_action')->where('usr_role_id',$input['id'])->delete();

				//DB::table('org_usr_role_action')->where('usr_role_id',$input['id'])->update(array('is_deleted'=>1,'is_active'=>0));
			foreach ($input['modules'] as $mk => $mv) {

			$actions = [];
			$actions['org_id'] =1;
			$actions['usr_role_id'] =$role_id;
			$actions['module_id'] =$mk;
			if(@$mv["'view'"] == 1) {$actions['view'] =1; }else { $actions['view'] =0; }
			if(@$mv["'edit'"] == 1) {$actions['edit'] =1; }else { $actions['edit'] =0; }
			if(@$mv["'delete'"] == 1) {$actions['delete'] =1; }else { $actions['delete'] =0; }
			$actions['is_active'] = 1;
			$actions['is_deleted'] = 0;
			DB::table('org_usr_role_action')->insert($actions);

			}

                foreach ($input['modules'] as $mk => $mv) {
                    $actions = [];
                    $actions['org_id'] =1;
                    $actions['usr_role_id'] =$role_id;
                    $actions['module_id'] =$mk;
                    if(@$mv["'view'"] == 1) {$actions['view'] =1; }else { $actions['view'] =0; }
                    if(@$mv["'edit'"] == 1) {$actions['edit'] =1; }else { $actions['edit'] =0; }
                    if(@$mv["'delete'"] == 1) {$actions['delete'] =1; }else { $actions['delete'] =0; }
                    $actions['is_active'] = 1;
                    $actions['is_deleted'] = 0;
                    DB::table('org_usr_role_action')->insert($actions);
                }

			 }
		}
		else{
        $role_id = UserRole::create($role_details)->id;
        if(isset($input['modules'])){
		foreach ($input['modules'] as $mk => $mv) {

			$actions = [];
			$actions['org_id'] =1;
			$actions['usr_role_id'] =$role_id;
			$actions['module_id'] =$mk;
			if(@$mv["'view'"] == 1) {$actions['view'] =1; }else { $actions['view'] =0; }
			if(@$mv["'edit'"] == 1) {$actions['edit'] =1; }else { $actions['edit'] =0; }
			if(@$mv["'delete'"] == 1) {$actions['delete'] =1; }else { $actions['delete'] =0; }
			$actions['is_active'] = 1;
			$actions['is_deleted'] = 0;
			DB::table('org_usr_role_action')->insert($actions);

			}
        }
		}

		return 'success';





    }
	public function saveUserRoleDelete(Request $request){
        $input = $request->all();
        if($input['id']>0) {
        $deleted =  UserRole::where('id',$input['id'])->update(array('is_deleted'=>1,'is_active'=>0));
        return '1';
        }else {
        return '0';
        }
	}

	public function editRole($role_id){
        $data['title']              =   'Edit User Role';
        $data['menu']               =   'edit-user-role';
        $data['userrole']           =   UserRole::where('id',$role_id)->first();
        //$data['actions']           =    DB::table('org_usr_role_action')->where('usr_role_id',$role_id)->get();
        $data['actions']            =  OrganizationUserRoleAction::getAllActions($role_id);
		$data['modules']            =  Modules::getModules();
        return view('organization.user-roles.create',$data);
    }

	public function roleStatus(Request $request){
        $input = $request->all();

        if($input['id']>0) {
        $deleted =  UserRole::where('id',$input['id'])->update(array('is_active'=>$input['status']));

        return '1';
        }else {

        return '0';
        }

        }

































}
