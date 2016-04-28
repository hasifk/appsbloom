<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;
use Str;

class UserController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    protected function Users() {
        $id = Auth::user()->id;
        $user = Model\Admin::where('role', '!=', 'SuperAdm')->paginate(20);
        return view('clientadmin.users')->with('user_lists', $user);
    }

    /*     * ***************************************************************************************** */

    protected function Register(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admin',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|unique:admin',
        ]);
        $task = new Model\Admin;
        $task->name = $request->name;
        $task->email = $request->email;
        //$task->app_type_id =3;
        $task->password = bcrypt($request->password);
        $task->role = $request->role;
        $array = explode('@', $request->email);
        $string = $array[0];
        $ascii ="";
        for ($i = 0; $i < strlen($string); $i++) {
            $ascii += ord($string[$i]);
        }
        $task->key = $ascii;
        $task->save();

        return back();
    }

    protected function UserDelete(Request $request) {

        Model\Admin::where('id', $request->id)->delete();
    }

//    /*     * ***************************************************************************************** */
//
//    protected function editservice($id) {
//
//        $service_edit = Model\Services::where('id', $id)->first();
//
//        return view('clientadmin.service_list_edit')->with('service_edit', $service_edit);
//    }

    /*     * ***************************************************************************************** */

//    protected function updateservice(Request $request) {
//
//        $id = Auth::user()->id;
//        $dir = 'assets/clientassets/uploads/' . $id;
//        $service_dir = $dir . '/services';
//        $service_id = $request->service_id;
//        $service_image_store1 = $request->service_image1;
//
//        if ($request->hasFile('service_image')):
//
//            $this->validate($request, [
//                'title' => 'required',
//                'service_content' => 'required',
//                'service_image' => 'required|mimes:jpeg,png',
//            ]);
//
//
//            $service_image = time() . '.' . $request->file('service_image')->getClientOriginalExtension();
//            $service_image_store = $service_dir . '/' . $service_image;
//            if (file_exists($service_image_store1))
//                unlink($service_image_store1);
//            $request->file('service_image')->move($service_dir, $service_image);
//
//        else:
//
//            $this->validate($request, [
//                'service_content' => 'required'
//            ]);
//            $service_image_store = $service_image_store1;
//
//        endif;
//
//
//
//        $service_task = Model\Services::find($service_id);
//        $service_task->description = $request->service_content;
//        $service_task->title = $request->title;
//        $service_task->image = $service_image_store;
//        $service_task->save();
//
//
//        return back();
//    }

    /*     * ***************************************************************************************** */
//
//    protected function deleteservice($id) {
//
//        $del_service = Model\Services::find($id);
//        $del_image = $del_service->image;
//        if (file_exists($del_image))
//            unlink($del_image);
//        $del_service->delete();
//
//        $id1 = Auth::user()->id;
//        $service_list = Model\Services::where('admin_id', $id1)->paginate(10);
//
//        return view('clientadmin.service_list')->with('service_list', $service_list);
//    }

    /*     * ***************************************************************************************** */
}
