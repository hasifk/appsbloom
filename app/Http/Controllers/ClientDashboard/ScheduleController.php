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

        return view('clientadmin.manage_schedule')->with('schedule_info', $schedule_info);
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
    public function scheduling_time(Request $request) {
        $rules = [
            'day' => 'required',
            'stime' => 'required',
            'ctime' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'manageschedule';
        if ($request->has('id')):
            $return = 'findus_update/' . $request->id;
            $obj = Model\Time_sheduling::find($request->id);
        else:
            $obj = new Model\Time_sheduling;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->day_time = $request->day." ".$request->stime.":".$request->ctime;
            $obj->save();
            return redirect('find-us');
        }
        
    }
    /*     * ***************************************************************************************** */
}
