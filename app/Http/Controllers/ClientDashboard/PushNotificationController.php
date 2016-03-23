<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class PushNotificationController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Notifications() {
        $admin = Auth::user()->id;
        $notification = Model\Notifications::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.notification')->with('notification', $notification);
    }
    public function NotificationSave(Request $request) {
        $rules = [
            'notification' => 'required',
        ];
        $admin = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role != "SuperAdm")
            $return='clients/push-notification';
        else
            $return = 'push-notification';
        $obj = new Model\Notifications;
        $obj->admin_id = $admin;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->notification = $request->notification;
            $obj->save();
            return redirect($return);
        }
    }
    public function NotificationDelete(Request $request) {
        Model\Notifications::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
    }
}