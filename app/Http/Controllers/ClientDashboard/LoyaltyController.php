<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class LoyaltyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function manageloyalty()
    {
          $id=Auth::user()->id;
          $loyalty_list=Model\Loyalty::where('admin_id',$id)->get();
         
         
      return view('clientadmin.manage_loyalty')->with('loyalty_list',$loyalty_list);
    }

/********************************************************************************************/
 protected function saveloyalty(Request $request)
    {

          $id=Auth::user()->id;
          
       $this->validate($request, [
            'loyalty_title' => 'required',
            'loyalty_count' =>'required|integer',
            'loyalty_action' =>'required',
        ]);

         
          $loyalty_task= new Model\Loyalty;
          $loyalty_task->admin_id =$id;
          $loyalty_task->title = $request->loyalty_title;
          $loyalty_task->count = $request->loyalty_count;
          $loyalty_task->action = $request->loyalty_action;
          $loyalty_task->save();
         

      return back();
    }
/********************************************************************************************/
 protected function editloyalty($id)
    {
          
          $loyalty_edit=Model\Loyalty::where('id',$id)->first();

         return view('clientadmin.loyalty_list_edit')->with('loyalty_edit',$loyalty_edit); 

    }
/********************************************************************************************/
protected function updateloyalty(Request $request)
    {

          $id=$request->loyalty_id;
          
       $this->validate($request, [
            'loyalty_title' => 'required',
            'loyalty_count' =>'required|integer',
            'loyalty_action' =>'required',
        ]);

         
          $loyalty_task_edit= Model\Loyalty::find($id);
          $loyalty_task_edit->title = $request->loyalty_title;
          $loyalty_task_edit->count = $request->loyalty_count;
          $loyalty_task_edit->action = $request->loyalty_action;
          $loyalty_task_edit->save();
         

      return back();
    }
/********************************************************************************************/
 protected function deleteloyalty($id)
    {
          
        Model\Loyalty::where('id',$id)->delete();
         
          $id1=Auth::user()->id;
          $loyalty_list=Model\Loyalty::where('admin_id',$id1)->get();

         return view('clientadmin.loyalty_list')->with('loyalty_list',$loyalty_list); 

    }

/********************************************************************************************/
}