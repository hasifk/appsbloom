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
        if ($request->has('namechange')):
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
        else:

            $rules = [
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ];

        endif;
        $admin = Auth::user()->id;
        $role = Auth::user()->role;
        $obj = Model\Admin::find($admin);
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect(Auth::user()->roleAccess('profile-update'))
                            ->withErrors($this->validator)
                            ->withInput();
        } else if ($request->has('namechange')) {
            $obj->name = $request->name;
            $obj->email = $request->email;
            if($role!='SuperAdm')
            {
            $array = explode('@', $request->email);
            $string = $array[0];
            $ascii = "";
            for ($i = 0; $i < strlen($string); $i++) {
                $ascii += ord($string[$i]);
            }
            $task->key = $ascii;
            }
        } else
            $obj->password = bcrypt($request->password);
        $obj->save();
        return redirect(Auth::user()->roleAccess('profile'));
    }

}
