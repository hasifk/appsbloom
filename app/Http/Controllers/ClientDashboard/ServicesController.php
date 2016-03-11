<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;
use Str;

class ServicesController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    protected function manageservices() {
        $id = Auth::user()->id;
        $service_list = Model\Services::where('admin_id', $id)->paginate(10);


        return view('clientadmin.manage_services')->with('service_list', $service_list);
    }

    /*     * ***************************************************************************************** */

    protected function saveservice(Request $request) {

        $id = Auth::user()->id;
        $dir = 'assets/clientassets/uploads/' . $id;
        $service_dir = $dir . '/services';
        if (!is_dir($dir)) {
            mkdir($dir);

            if (!is_dir($service_dir)) {
                mkdir($service_dir);
            }
        }
        $rules = [
            'title' => 'required',
            'service_content' => 'required',
        ];
        if (!empty($request->service_image)) {
            $rules['service_image'] = 'required|mimes:jpeg,png';
        }

        $this->validate($request, $rules);
        if (!empty($request->service_image)) {
            $service_image = time() . '.' . $request->file('service_image')->getClientOriginalExtension();
            $service_image_store = $service_dir . '/' . $service_image;
            $request->file('service_image')->move($service_dir, $service_image);
        } else
            $service_image_store = "";
        $service_task = new Model\Services;
        $service_task->admin_id = $id;
        $service_task->title = $request->title;
        $service_task->description = $request->service_content;
        $service_task->image = $service_image_store;
        $service_task->save();
        return back();
    }

    /*     * ***************************************************************************************** */

    protected function editservice($id) {

        $service_edit = Model\Services::where('id', $id)->first();

        return view('clientadmin.service_list_edit')->with('service_edit', $service_edit);
    }

    /*     * ***************************************************************************************** */

    protected function updateservice(Request $request) {

        $id = Auth::user()->id;
        $dir = 'assets/clientassets/uploads/' . $id;
        $service_dir = $dir . '/services';
        $service_id = $request->service_id;
        $service_image_store1 = $request->service_image1;

        if ($request->hasFile('service_image')):

            $this->validate($request, [
                'title' => 'required',
                'service_content' => 'required',
                'service_image' => 'required|mimes:jpeg,png',
            ]);


            $service_image = time() . '.' . $request->file('service_image')->getClientOriginalExtension();
            $service_image_store = $service_dir . '/' . $service_image;
            if (file_exists($service_image_store1))
                unlink($service_image_store1);
            $request->file('service_image')->move($service_dir, $service_image);

        else:

            $this->validate($request, [
                'service_content' => 'required'
            ]);
            $service_image_store = $service_image_store1;

        endif;



        $service_task = Model\Services::find($service_id);
        $service_task->description = $request->service_content;
        $service_task->title = $request->title;
        $service_task->image = $service_image_store;
        $service_task->save();


        return back();
    }

    /*     * ***************************************************************************************** */

    protected function deleteservice($id) {

        $del_service = Model\Services::find($id);
        $del_image = $del_service->image;
        if (file_exists($del_image))
            unlink($del_image);
        $del_service->delete();

        $id1 = Auth::user()->id;
        $service_list = Model\Services::where('admin_id', $id1)->paginate(10);

        return view('clientadmin.service_list')->with('service_list', $service_list);
    }

    /*     * ***************************************************************************************** */
}
