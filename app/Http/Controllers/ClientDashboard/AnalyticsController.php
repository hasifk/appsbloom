<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class AnalyticsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function manageanalytics()
    {
          /*$id=Auth::user()->id;
          $about_us=Model\Contents::where('admin_id',$id)->first();*/
         
      return view('clientadmin.manage_analytics');
    }

/********************************************************************************************/
 
}