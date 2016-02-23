<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class LangkeyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function managelangkeys()
    {
          $id=Auth::user()->id;
          $language_list=Model\Languages::where('admin_id',$id)->get();
          $langkey_list=Model\Languagekeys::where('language_id',$id)->get();
         
         
      return view('clientadmin.manage_language_keys')->with('language_list',$language_list)->with('langkey_list',$langkey_list);
    }

/********************************************************************************************/
 protected function savelangkey(Request $request)
    {

          $id=Auth::user()->id;
          
       $this->validate($request, [
            'language_key' => 'required',
            'language_value' => 'required',
            'lang_selected_id' => 'required',
        ]);

         
          $lang_keys_task= new Model\Languagekeys;
//          $lang_keys_task->admin_id =$id;
          $lang_keys_task->language_id =$request->lang_selected_id;
          $lang_keys_task->key = $request->language_key;
          $lang_keys_task->lang_value = $request->language_value;
          $lang_keys_task->save();
         

      return back();
    }
/********************************************************************************************/
 protected function editlangkey($id)
    {
          
          $langkey_edit=Model\Languagekeys::where('id',$id)->first();

         return view('clientadmin.langkey_list_edit')->with('langkey_edit',$langkey_edit); 

    }
/********************************************************************************************/
protected function updatelangkey(Request $request)
    {

          $id=$request->langkey_id;
          
       $this->validate($request, [
            'language_key' => 'required',
            'language_value' => 'required',
        ]);

         
          $lang_keys_task_edit= Model\Languagekeys::find($id);
          $lang_keys_task_edit->key =$request->language_key;
          $lang_keys_task_edit->lang_value =$request->language_value;
          $lang_keys_task_edit->save();
         

      return back();
    }
/********************************************************************************************/
 protected function deletelangkey($id)
    {
          
        Model\Languagekeys::where('id',$id)->delete();
         
          $id1=Auth::user()->id;
          $langkey_list=Model\Languagekeys::where('admin_id',$id1)->get();
         

         return view('clientadmin.langkey_list')->with('langkey_list',$langkey_list); 

    }

/********************************************************************************************/
}