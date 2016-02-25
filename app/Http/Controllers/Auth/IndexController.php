<?php

namespace App\Http\Controllers\Auth;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class IndexController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    
     
      protected function success()
    {
         
         return view('clientadmin.client_dashboard');
    }


    
/********************************************************************************************/   

   protected function register(Request $request)

    {       

         

       $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admin',
            'password' => 'required|confirmed|min:6',
        ]);
          
         
          $task = new Model\Admin;
          $task->name = $request->name;
          $task->email = $request->email;
          //$task->app_type_id =3;
          $task->password = bcrypt($request->password);
         
          $task->save();

         

          if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            
            return redirect()->intended('success');
        }
        else

           
          return back()->with('loginmessage', 'Invalid Email or password login failed');;
    }

     

/********************************************************************************************/     

    protected function login()

    {
        
            return view('clientadmin.login');

    }

/********************************************************************************************/
   protected function tologin(Request $request)

    {
         $this->validate($request, [
           
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
          
           

        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            
            return redirect()->intended('success');
        }
        else

           
          return back()->with('loginmessage', 'Invalid Email or password login failed');;
    }

/********************************************************************************************/
     protected function logout()

    {
         Auth::logout();
        return redirect('');
    }

/********************************************************************************************/    

}