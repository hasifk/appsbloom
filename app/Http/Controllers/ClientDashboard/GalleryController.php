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
    public function Gallery() {
        $admin = Auth::user()->id;
        $gallery = Model\Gallery::where('admin_id', $admin)->get();
        return view('clientadmin.gallery')->with('gallery',$gallery);
    }
    public function GallerySave(Request $request) {
        $rules = [
            'gallery' => 'required|mimes:jpeg',
        ];
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect('gallery')
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj = new Model\Gallery;
            $admin = Auth::user()->id;
            if ($request->gallery->isValid()) {
                $destinationPath = 'assets/clientassets/uploads/'.$admin.'/Gallery'; // upload path
                $extension = $request->gallery->getClientOriginalExtension(); // getting image extension
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image

                $request->gallery->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $obj->image_path=$destinationPath.'/'.$fileName;
                $obj->admin_id=$admin;
                $obj->save();
            }
            return redirect('gallery');
        }
    }
    public function GalleryDelete(Request $request) {
        $admin = Auth::user()->id;
        $gallery = Model\Gallery::where('id',$request->id)->where('admin_id', $admin)->get();
        unlink($gallery[0]->image_path);
        Model\Gallery::where('id',$request->id)->delete();
    }
}
