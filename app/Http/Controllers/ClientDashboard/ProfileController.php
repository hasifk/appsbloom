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
            $rules=[];
            if (Auth::user()->password !== bcrypt($request->cpassword)) {
                $rules['cpassword'] = 'required';
            }
            $rules ['password'] = 'required|min:6';
            $rules['password_confirmation'] = 'same:password';
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect('profile-update')
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $admin = Auth::user()->id;
            $obj = Model\Admin::find($admin);
            $obj->name = $request->name;
            $obj->email = $request->email;
        }
        $obj->save();
        return redirect('profile');
    }

}
