<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class ScheduleController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    protected function manageschedule() {
        $id = Auth::user()->id;
        $schedule_info = Model\Contents::where('admin_id', $id)->first();
        $schedule_time = Model\Time_sheduling::where('admin_id', $id)->get();
        return view('clientadmin.manage_schedule')->with('schedule', ['schedule_info' => $schedule_info, 'schedule_time' => $schedule_time]);
    }

    /*     * ***************************************************************************************** */

    protected function saveschedule(Request $request) {

        $id = Auth::user()->id;


        $this->validate($request, [
            'schedule_info' => 'required',
        ]);

        $schedule_task = Model\Contents::where('admin_id', $id)->first();
        if (isset($schedule_task)):

            $schedule_task->schedule_info = $request->schedule_info;

        else:

            $schedule_task = new Model\Contents;
            $schedule_task->admin_id = $id;
            $schedule_task->schedule_info = $request->schedule_info;

        endif;
        $schedule_task->save();


        return back();
    }

    public function ShedulingTime(Request $request) {
        $rules = [
            'day' => 'required',
            'shour' => 'required',
            'smin' => 'required',
            'shour' => 'required',
            'smin' => 'required',
        ];
        $admin = Auth::user()->id;
        $obj = new Model\Time_sheduling;
        $obj->admin_id = $admin;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect('manageschedule')
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->day_time = $request->day . " " . $request->shour . ":" . $request->smin . " " . $request->ehour . ":" . $request->emin;
            $obj->save();
            return redirect('manageschedule');
        }
    }
    public function ShedulingDelete(Request $request) {
        $admin = Auth::user()->id;
        $gallery = Model\Time_sheduling::where('id',$request->id)->where('admin_id', $admin)->get();
        Model\Time_sheduling::where('id',$request->id)->delete();
    }

    /*     * ***************************************************************************************** */
}
