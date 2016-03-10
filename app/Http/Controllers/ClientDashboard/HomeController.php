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
        if ($request->has('id')):
            $obj = Model\Contents::find($request->id);
        else:
            $obj = new Model\Contents;
            $obj->admin_id = $admin;
        endif;
        $obj->home = $request->home_content;
        $obj->save();

        if ($role != "SuperAdm")
            return redirect('clients/home');
        else
            return redirect('home');
    }

}
