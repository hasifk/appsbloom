<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class FindUsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function FindUs() {
        $admin = Auth::user()->id;
        $findus = Model\FindUs::where('admin_id', $admin)->paginate(7);
        return view('clientadmin.findus')->with('location', $findus);
    }

    public function CoordinatesSave(Request $request) {
        $rules = [
            'location' => 'required',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
        ];
        $admin = Auth::user()->id;
        $return = 'find-us';
        if ($request->has('id')):
            $return = 'findus_update/' . $request->id;
            $obj = Model\FindUs::find($request->id);
        else:
            $obj = new Model\FindUs;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {

            $obj->place = $request->location;
            $obj->lat = $request->lat;
            $obj->long = $request->long;
            $obj->save();
            return redirect('find-us');
        }
    }

    public function FindusUpdate($id) {
        $admin = Auth::user()->id;
        $flight = Model\FindUs::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.findus_update')->with('location', $flight);
    }

    public function FindusDelete(Request $request) {
        Model\FindUs::where('id', $request->id)->delete();
    }
}
