<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class GalleryController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    protected function apptype() {

        $app_types = Model\Apptype::all();
        //return view('home.index')->with('career_with_type', $career_with_type);
        return view('clientadmin.app_type')->with('app_types', $app_types);
    }

    /*     * ***************************************************************************************** */
}
