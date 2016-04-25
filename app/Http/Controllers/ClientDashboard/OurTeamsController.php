<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class OurTeamsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Teams() {
        $admin = Auth::user()->id;
        $ourteam = Model\Contents::where('admin_id', $admin)->get();
        return view('clientadmin.ourteams')->with('ourteam', $ourteam);
    }
    public function TeamsSave(Request $request) {
        $admin = Auth::user()->id;
        $role = Auth::user()->role;
        $obj=Model\Contents::where('admin_id', $admin)->first();
        if ($request->has('id'))
            $obj = Model\Contents::where('admin_id', $admin)->where('id', $request->id)->first();
        else if (empty($obj)){
            $obj = new Model\Contents;
            $obj->admin_id = $admin;
        }
        $obj->ourteams = $request->about;
        $obj->save();
        return redirect(Auth::user()->roleAccess('our_teams'));
    }

    public function TeamsMore($id) {
        $admin = Auth::user()->id;
        $ourteam = Model\OurTeam::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.ourteam')->with('ourteam', $ourteam);
    }

    public function TeamsStatus(Request $request) {
        $obj = Model\OurTeam::find($request->id);
        $link = $obj->photo;
        unlink($link);
        Model\OurTeam::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        //return redirect('our-teams');
    }

    public function UpdateTeams($id) {
        $admin = Auth::user()->id;
        $ourteam = Model\OurTeam::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.ourteam_update')->with('ourteam', $ourteam);
    }

}
