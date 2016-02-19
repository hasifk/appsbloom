<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class VideoController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Videos() {
        $admin = Auth::user()->id;
        $video = Model\Video::where('admin_id', $admin)->get();
        return view('clientadmin.video')->with('video', $video);
    }

    public function VideoSave(Request $request) {
        $rules = [
            'video' => 'required',
        ];
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect('video')
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj = new Model\Video;
            $admin = Auth::user()->id;
            // sending back with message
            $obj->video_path = $request->video;
            $obj->admin_id=$admin;
            $obj->save();

            return redirect('videos');
        }
    }

    public function VideoDelete(Request $request) {
        Model\Video::where('id', $request->id)->delete();
    }

}
