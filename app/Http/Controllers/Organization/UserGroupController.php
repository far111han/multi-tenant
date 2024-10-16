<?php

namespace App\Http\Controllers\Organization;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Organization\OrganizationUserGroups;
use App\Models\Organization\OrganizationGroupUserLists;
use App\Models\Organization\OrganizationUsers;
use App\Models\Organization\OrganizationDesignation;
use App\Models\Organization\OrganizationDepartment;
use App\Models\Organization\OrganizationBranch;
use App\Models\Organization\OrganizationUserTrainingLevels;
use App\Rules\Name;
use Validator;

use Session;
use Redirect;
use DB;
class UserGroupController extends Controller
{
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
	public function index(Request $request){

    }
	public function create(){
	       return view('organization.user-groups.create');

	}
	public function validategroup(Request $request){
         $post           =  (object)$request->post();
         $existName      =  $error = false;
		 $rules          =   [
                'name'                 =>  ['required', 'string','max:100', new Name],
                // 'desc'                 =>  ['required', 'string','max:500'],
                'training_levels'      =>  ['required'],
                'status'               =>  ['required'],
                'zoom_licence'         =>  ['required', 'string','max:10']
            ];
			if(isset($post->id))
			{
				$id=$post->id;
			}
			else{
				$id='';
			}
			//$validator   =   Validator::make($request->post() ,$rules);
			$validator              =   Validator::make($post->group ,$rules);


			if ($validator->fails()) {
                   foreach($validator->messages()->getMessages() as $k=>$row){ $error[$k] = $row[0]; }
				  if(! isset($error['tab'])){ $error['tab'] = 'tab-1'; }
            }

                $validator              =   Validator::make($post->group ,$rules);
                if ($validator->fails()) {
                foreach($validator->messages()->getMessages() as $k=>$row){ $error[$k] = $row[0]; }
                if(! isset($error['tab'])){ $error['tab'] = 'tab-2'; }
                }


		if($error) { return $error; }else{ return 'success'; } return 'success';



    }

}
