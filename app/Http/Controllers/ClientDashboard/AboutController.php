<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class AboutController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function manageabout()
    {
          $id=Auth::user()->id;
          $about_us=Model\Contents::where('admin_id',$id)->first();
         
      return view('clientadmin.manage_about')->with('about_us',$about_us);
    }

/********************************************************************************************/
 protected function saveabout(Request $request)
    {

          $id=Auth::user()->id;
         
          
       $this->validate($request, [
            'about_us_content' => 'required',
        ]);

          $about_task=Model\Contents::where('admin_id',$id)->first();
          if(isset($about_task)):
         
              $about_task->aboutus=$request->about_us_content;
          
          else:
         
          $about_task= new Model\Contents;
          $about_task->admin_id =$id;
          $about_task->aboutus = $request->about_us_content;
          endif; 
          $about_task->save();
        

      return back();
    }

/********************************************************************************************/
}