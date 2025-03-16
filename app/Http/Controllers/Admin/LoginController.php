<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    /**
     * Login Function
     *
     * @param   object $request
     * @return  layout
     */
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back();
            }
            try {

                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->route('admin.dashboard');
                } else {
                    session()->flash('error-msg', 'Your credential do not match');
                    return redirect()->route("admin.login");
                }
            } catch (Exception $e) {
                $msg = $e->getMessage();
                session()->flash('error-msg', 'Something is unexpected');
                return redirect()->route("admin.login");
            }
        }
        return view('auth.login');
    }
    /**
     * Logout Function
     *
     * @param   object $request
     * @return  redirect
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('home');
    }


}
