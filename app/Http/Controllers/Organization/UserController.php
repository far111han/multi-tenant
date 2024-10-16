<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Organization\OrganizationUsers;
use App\Models\Organization\OrganizationDesignation;
use App\Models\Organization\OrganizationDepartment;
use App\Models\Organization\OrganizationBranch;
use DB;
use App\Models\Organization\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Rules\Name;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Organization\UsersImport;
use App\Exports\Organization\UsersExport;
use App\Http\Controllers\Organization\RealtimeNotificationAlert;
use App\Models\organization\OrganizationUserAddress;

class UserController extends Controller
{
	protected $redirectTo = RouteServiceProvider::HOME;

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request)
	{

	}


	public function create()
	{

		return view('organization.users.create');
	}

	public function validateuser(Request $request)
	{
		$post           =  (object)$request->post();
		$existName      =  $error = false;
		$rules          =   [
			//'first_name'         =>  ['required', 'string','max:100', new Name],
			//'last_name'          =>  ['required', 'string','max:100', new Name],
			//'designation'        =>  ['required', 'string','max:100'],

			'first_name'         =>  'required|string|max:100',
			'last_name'          =>  'required|string|max:100',
			'email'              =>  'required|string|email|max:100',
			'mobile-number'      =>  'required',

		];
		if (isset($post->id)) {
			$id = $post->id;
		} else {
			$rules          =   ['password' => 'required|string|min:6|regex:/^\S*$/u'];
			$id = '';
		}
		//$validator   =   Validator::make($request->post() ,$rules);
		$validator              =   Validator::make($post->user, $rules);
		$validEmail             =   OrganizationUsers::ValidateUnique('email', $post->user, $id);
		$validPhone             =   OrganizationUsers::ValidatePhone('phone', $post->user, $id);
		if ($validEmail) {
			$error['email']    =   $validEmail;
			if (!isset($error['tab'])) {
				$error['tab'] = 'tab-1';
			}
		}
		if ($validPhone) {
			$error['mobile-number']    =   $validPhone;
			if (!isset($error['tab'])) {
				$error['tab'] = 'tab-1';
			}
		}
		if ($validator->fails()) {
			foreach ($validator->messages()->getMessages() as $k => $row) {
				$error[$k] = $row[0];
			}
			if (!isset($error['tab'])) {
				$error['tab'] = 'tab-1';
			}
		}

		$rules = [
			/* @2023
                'branch_id'                 =>  ['required', 'string','max:200'],
                'department_id'             =>  ['required'],
                'designation_id'            =>  ['required'],
                */
			'user_type'                 =>  ['required'],
			'is_temporary'              =>  ['required'],
			'end_date'                 	=>  ['required_if:is_temporary,1'],

		];

		$validator              =   Validator::make($post->user, $rules);
		if ($validator->fails()) {
			foreach ($validator->messages()->getMessages() as $k => $row) {
				$error[$k] = $row[0];
			}
			if (!isset($error['tab'])) {
				$error['tab'] = 'tab-2';
			}
		}


		if ($error) {
			return $error;
		} else {
			return 'success';
		}
		return 'success';
	}

	public function saveuser(Request $request)
	{

		$post  = (object)$request->post();
		$input = $request->all();
		$user_details = [];
		$org_admin_add =[];
		$user_details['fname'] = $post->user['first_name'];
		$user_details['lname'] = $post->user['last_name'];
		$user_details['job_title'] = $post->user['designation'];
		$user_details['email'] = $post->user['email'];
		$user_details['is_active'] = $post->user['status'];

		if ($post->user['password'] != '')
			$user_details['password'] =  Hash::make($post->user['password']);	// Changed to use user password instead of post['password'] for the sake of org_user login

		$phone = explode(" ", $post->user['mobile-number']);

		$org_admin_add['address_1']=$post->orgadmin_add['address_1'];
        $org_admin_add['address_2']=$post->orgadmin_add['address_2'];
        $org_admin_add['country']=$post->orgadmin_add['country']??NULL;
        $org_admin_add['state']=$post->orgadmin_add['state']??NULL;
        $org_admin_add['city']=$post->orgadmin_add['cities']??NULL;
        $org_admin_add['pincode']=$post->orgadmin_add['pincode'];

		//	dd($post);
		$images                 =   $request->file('avatar');

		if ($images) {

			$imgName            =   'logo.' . $images->extension();
			$path               =   '/organization/user/avatar/' . date('Y-m-d-H-i-s');
			$destinationPath    =   storage_path($path);
			if (!file_exists($destinationPath)) {
				mkdir($destinationPath, 755, true);
			}
			$images->move($destinationPath, $imgName);

			$user_details['avatar']       =   $path . '/' . $imgName;
		}

		if (isset($post->id)) {
			$user_id = $post->id;
		} else {
			$user_id = "";
		}
		if ($user_id) {
			$userTypeValue = $post->user['user_type'];
			$addr_br_id = OrganizationUsers::where('id', $user_id)->update($user_details);
		} else {


			$user_id = OrganizationUsers::create($user_details)->id;
		}
		$org_admin_add['user_id']=$user_id;


		return 'success';
	}



	public function saveUserDelete(Request $request)
	{
		$input = $request->all();
		if ($input['id'] > 0) {
			$deleted =  OrganizationUsers::where('id', $input['id'])->update(array('is_deleted' => 1, 'is_active' => 0));
			return '1';
		} else {
			return '0';
		}
	}

}
