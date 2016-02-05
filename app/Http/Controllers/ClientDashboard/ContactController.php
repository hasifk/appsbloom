<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class ContactController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function managecontact()
    {
          $id=Auth::user()->id;
          $contact_us=Model\Contents::where('admin_id',$id)->first();
         
      return view('clientadmin.manage_contact')->with('contact_us',$contact_us);
    }

/********************************************************************************************/
 protected function savecontact(Request $request)
    {

          $id=Auth::user()->id;
         
          
       $this->validate($request, [
            'contact_us_content' => 'required',
        ]);

          $contact_task=Model\Contents::where('admin_id',$id)->first();
          if(isset($contact_task)):
         
              $contact_task->contact_us=$request->contact_us_content;
             
          
          else:
         
          $contact_task= new Model\Contents;
          $contact_task->admin_id =$id;
          $contact_task->contact_us = $request->contact_us_content;
          endif;
          $contact_task->save();
         

      return back();
    }

/********************************************************************************************/
}