<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Mail;
use Carbon\Carbon;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // =================================================================================================
    // =================================================================================================

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    // =================================================================================================
    // =================================================================================================

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        Admin::create($request->all());

        return redirect()->intended(route('admin.dashboard'));
    }

    // =================================================================================================
    // =================================================================================================

    public function forget_passowrd()
    {
        return view('admin.forget_password');
    }

    public function forget_passowrd_post(Request $request)
    {
        $admin = Admin::Where('email', request('email'))->first();
        if (!empty($admin)){
            
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email'  => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            session()->flash('success','The Link was sent to your email.');
            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin,'token' => $token]));
            return back();
        }
        session()->flash('fail','The email doesn\'t exist.');
        return back();        
    }

    // =================================================================================================
    // =================================================================================================

    public function recover_password($token)
    {
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (! empty($check_token)){
            return view('admin.recover_password', ['data', $check_token]);
        }else{
            return redirect()->guest(route('admin.forget_passowrd'));
        }
    }

    public function recover_password_post($token)
    {
        /*echo request()->token;
        echo "<br>";
        echo request()->password;
        echo "<br>";
        echo request()->repassword;
        dd(request());*/
        $this->validate(request(), [
            'password' => ['required', 'required_with:password_confirmation','same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);


        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        //dd($check_token);
        if (! empty($check_token)){
            $admin = Admin::Where('email', $check_token->email)->update([
                    'email'=> $check_token->email,
                    'password' => Hash::make(request()->password), 
                ]);
            DB::table('password_resets')->where('email', request('email'))->delete();
            Auth::guard('admin')->attempt(['email' => $check_token->email, 'password' => request()->password], true);
            return redirect()->intended(route('admin.dashboard'));
        }else {
            return redirect()->guest(route('admin.forget_passowrd'));
        }
        
    }

    // =================================================================================================
    // =================================================================================================

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->guest(route('admin.login'));
    }

    // =================================================================================================
    // =================================================================================================
}
