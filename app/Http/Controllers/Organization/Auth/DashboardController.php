<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization\TrainingProgram;
use App\Models\Organization\BusinessSettings;
use App\Models\Organization\LearnerContentActivity;

use App\Models\Organization\TrainingProgramContentPageInfo;
use App\Models\Organization\TrainingProgramContentWeb;
use App\Models\Organization\TrainingProgramContentAudio;
Use App\Models\Organization\TrainingProgramContentVideo;
use App\Models\Organization\TrainingProgramContentTask;
use App\Models\Organization\TrainingProgramDocuments;
use App\Models\organization\EvaluateLearner;
use App\Models\Organization\CompletedTrainingPrograms;

class DashboardController extends Controller
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
    public function __construct()
    {

        $this->middleware('auth:organization');
    }
    public function index(){
        $user = false; // Initializing user
        $data['orders'] = 100;

        $user = Auth()->user(); // Actively logged user
        if ($user) {
            $role_type  = $user->roleInfo['role_type'] ?? $user->role['role_type']; // Relationship written on OrgUser is role and OrgAdmin is roleInfo
        } else {
            // Case where the user is not authenticated
            $role_type = null;
        }

        switch ($role_type){
            case 'admin':
                return view('organization.dashboard',$data);
            break;

            default:
                return "Un Authorized Access!!.";
            break;

       }

    }

}
