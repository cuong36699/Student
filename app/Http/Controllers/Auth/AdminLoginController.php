<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {   
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {

        // Validate the form data
        $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 
            'password' => $request->password], $request->remember)) {
            Session::flash('ketqua', 'Đăng nhập thành công');
            // if successful, then redirect to their intended location
            return redirect()->route('student.index');
        }
        Session::flash('ketqua', 'Đăng nhập không thành công mật khẩu hoặc tài khoản không đúng');
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flash('ketqua', 'Đã Đăng xuất');
        return redirect()->route('admin.login');
    }
}
