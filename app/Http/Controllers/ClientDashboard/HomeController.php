<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Home() {
        $admin = Auth::user()->id;
        $home = Model\Contents::where('admin_id', $admin)->get();
        return view('clientadmin.home')->with('home', $home);
    }

    public function HomeSave(Request $request) {

        $admin = Auth::user()->id;
        $role = Auth::user()->role;
        $obj=Model\Contents::where('admin_id', $admin)->first();
        if ($request->has('id'))
            $obj = Model\Contents::where('admin_id', $admin)->where('id', $request->id)->first();
        else if (empty($obj)){
            $obj = new Model\Contents;
            $obj->admin_id = $admin;
        }
        $obj->home = $request->home_content;
        $obj->save();
        return redirect(Auth::user()->roleAccess('home'));
    }

}
