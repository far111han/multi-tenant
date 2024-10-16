<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization\OrganizationAdmin;
use App\Models\Organization\OrganizationUsers;
use App\Models\Organization\OrgUser;
use App\Models\Organization\PasswordReset;
use App\Models\Email;
class LoginController extends Controller
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
        $this->middleware('guest:organization')->except('OrgLogout');
    }
    public function index(){
        return redirect('organization/login');
    }
    public function showAdminLoginForm(){
        return view('organization.auth.login');
        // return view('organization.auth.password-reset');
    }
    public function OrgLogout(Request $request){
        Auth::guard('organization')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('organization/login');
    }
    public function OrgLogin(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        if (Auth::guard('organization')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            if(OrganizationAdmin::where('id', Auth::guard('organization')->user()->id)->first()->is_active == 1)
            {
                return redirect('organization/dashboard');
            }
            else
            {
                Auth::guard('organization')->logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return back()->withInput($request->only('email', 'remember'))->with('message',' This account is inactive.');
            }
        } else {


            return back()->withInput($request->only('email', 'remember'))->with('message',' This account is inactive.');
        }

        return back()->withInput($request->only('email', 'remember'))->with('message',' These credentials do not match our records. ');
    }

    public function orgRegister(Request $request){
        return view('organization.auth.register');
    }
}
