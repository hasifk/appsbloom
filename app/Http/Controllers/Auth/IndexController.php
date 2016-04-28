<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class IndexController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    protected function adminSuccess() {
        return view('clientadmin.admin_dashboard');
    }
    protected function clientSuccess() {
        return view('clientadmin.client_dashboard');
    }

    /*     * ***************************************************************************************** */

    protected function clientLogin() {
        if (Auth::check())
            return redirect(Auth::user()->roleAccess('success'));
        else
            return view('clientadmin.login')->with('role','client');
    }
    protected function adminLogin() {
        if (Auth::check())
            return redirect(Auth::user()->roleAccess('success'));
        else
            return view('clientadmin.login')->with('role','adm');
    }

    /*     * ***************************************************************************************** */

    protected function tologin(Request $request, $name) {

        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($name == "client" && Auth::user()->role != "SuperAdm")
                return redirect()->intended('clients/success');
            else if ($name == "adm" && Auth::user()->role == "SuperAdm")
                return redirect()->intended('success');
            else
            {
                Auth::logout();
                return back()->with('loginmessage', 'Not Valid Admin Panel Section');
            }
           
        } else
            return back()->with('loginmessage', 'Invalid Email or password login failed');
    }

    /*     * ***************************************************************************************** */

    protected function logout() {
        Auth::logout();
        return redirect('');
    }

    /*     * ***************************************************************************************** */
}
