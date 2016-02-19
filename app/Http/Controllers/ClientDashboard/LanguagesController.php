<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class LanguagesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function managelanguages()
    {
          $id=Auth::user()->id;
          $language_list=Model\Languages::where('admin_id',$id)->get();
         
         
      return view('clientadmin.manage_languages')->with('language_list',$language_list);
    }

/********************************************************************************************/
 protected function savelanguage(Request $request)
    {

          $id=Auth::user()->id;
          
       $this->validate($request, [
            'language' => 'required',
            
        ]);

         
          $language_task= new Model\languages;
          $language_task->admin_id =$id;
          $language_task->language = $request->language;
          $language_task->save();
         

      return back();
    }
/********************************************************************************************/
 protected function editlanguage($id)
    {
          
          $language_edit=Model\languages::where('id',$id)->first();

         return view('clientadmin.language_list_edit')->with('language_edit',$language_edit); 

    }
/********************************************************************************************/
protected function updatelanguage(Request $request)
    {

          $id=$request->language_id;
          
       $this->validate($request, [
            'language' => 'required',
        ]);

         
          $language_task_edit= Model\languages::find($id);
          $language_task_edit->language = $request->language;
          $language_task_edit->save();
         

      return back();
    }
/********************************************************************************************/
 protected function deletelanguage($id)
    {
          
        Model\languages::where('id',$id)->delete();
         
          $id1=Auth::user()->id;
          $language_list=Model\languages::where('admin_id',$id1)->get();

         return view('clientadmin.language_list')->with('language_list',$language_list); 

    }

/********************************************************************************************/
}