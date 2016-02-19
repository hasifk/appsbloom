<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Profile() {
        return view('clientadmin.profile');
    }

    public function ProfileUpdate() {

        return view('clientadmin.profile_update');
    }
    public function ProfileSave(Request $request) {

        $admin = Auth::user()->id;
        $f = 0;
        $u = 0;
        $obj = Model\Admin::find($admin);
        $return = 'profile-update';

        if (!$request->has('passwordchange')):
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $f = 1;
        endif;
        if (!$request->has('namechange')):
            $rules = [
                'password' => 'required',
            ];
            $u = 1;
        endif;
        if ($f == 1 && $u == 1) {
            $return = 'profile';
            $obj = new Model\Admin;
        }
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else if (!$request->has('passwordchange')) {
            $obj->name = $request->name;
            $obj->email = $request->email;
        }
        if (!$request->has('namechange')) {
            $obj->password = $request->password;
        }
        $obj->save();
        return redirect('profile');
    }

}
