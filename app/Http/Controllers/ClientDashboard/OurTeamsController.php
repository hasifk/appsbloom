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
        $ourteam = Model\OurTeam::where('admin_id', $admin)->paginate(6);
        return view('clientadmin.ourteams')->with('ourteam', $ourteam);
    }

    public function TeamsSave(Request $request) {
        $rules = [
            'name' => 'required',
            'about' => 'required',
        ];
        if ($request->has('email')) {
            $rules['email'] = 'required|email';
        }
        if ($request->has('Phone')) {
            $rules['Phone'] = 'required|numeric';
        }
        $admin = Auth::user()->id;
        $return = 'our-teams';
        if ($request->has('id')):
            $return = 'update-ourteam/' . $request->id;
            $obj = Model\OurTeam::find($request->id);
        else:
            $rules['image'] = 'required|mimes:jpeg';
            $obj = new Model\OurTeam;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {

            if (!empty($request->image) && $request->image->isValid()) {
                $destinationPath = 'assets/clientassets/uploads/' . $admin . '/Teams'; // upload path
                $extension = $request->image->getClientOriginalExtension(); // getting image extension
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $fileName = rand(11111, 99999) . '.' . $extension; // rename image
                if ($request->has('id')):
                    $link = $obj->photo;
                    unlink($link);
                endif;
                $request->image->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $obj->photo = $destinationPath . '/' . $fileName;
            }
            $obj->name = $request->name;
            $obj->phone = $request->Phone;
            $obj->email = $request->email;
            $obj->about = $request->about;
            $obj->save();
            return redirect('our-teams');
        }
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
