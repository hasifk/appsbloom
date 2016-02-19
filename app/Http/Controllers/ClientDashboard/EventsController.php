<?php

namespace App\Http\Controllers\ClientDashboard;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Model;
use Illuminate\Http\Request;

use Validator;

class EventsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


 
    protected function manageevents()
    {
          $id=Auth::user()->id;
          $event_list=Model\Events::where('admin_id',$id)->get();
         
         
      return view('clientadmin.manage_events')->with('event_list',$event_list);
    }

/********************************************************************************************/
 protected function saveevent(Request $request)
    {

          $id=Auth::user()->id;
          $dir='assets/clientassets/uploads/'.$id;
          $event_dir=$dir.'/events';
          if (!is_dir($dir)) 
            {
            mkdir($dir);

          if (!is_dir($event_dir)) 
              {
                   mkdir($event_dir);
              }

            }
       $this->validate($request, [
            'event_title' => 'required',
            'event_description' => 'required',
            'event_reservation' =>'required',
            'event_image' =>'required|mimes:jpeg,png',
        ]);

         $event_image = time(). '.' . $request->file('event_image')->getClientOriginalExtension();
          $event_image_store=$event_dir.'/'.$event_image;
          $request->file('event_image')->move($event_dir, $event_image);
          $myReservation= explode('-', $request->event_reservation);
          $start_time=$myReservation[0];
          $end_time=$myReservation[1];

          $event_task= new Model\Events;
          $event_task->admin_id =$id;
          $event_task->title = $request->event_title;
          $event_task->description = $request->event_description;
          $event_task->photo = $event_image_store;
          $event_task->start_time =$start_time;
          $event_task->end_time =$end_time;
          $event_task->save();
         

      return back();
    }
/********************************************************************************************/
 protected function editevent($id)
    {
          
          $event_edit=Model\Events::where('id',$id)->first();

         return view('clientadmin.event_list_edit')->with('event_edit',$event_edit); 

    }
/********************************************************************************************/
protected function updateevent(Request $request)
    {

          $id=Auth::user()->id;
          $dir='assets/clientassets/uploads/'.$id;
         $event_dir=$dir.'/events';
         $event_id=$request->event_id;
         $event_image_store1=$request->event_image1;

          if ($request->hasFile('event_image')):

         $this->validate($request, [
            'event_title' => 'required',
            'event_description' => 'required',
            'event_reservation' =>'required',
            'event_image' =>'required|mimes:jpeg,png',
        ]);

         $event_image = time(). '.' . $request->file('event_image')->getClientOriginalExtension();
         $event_image_store=$event_dir.'/'.$event_image;
          if(file_exists($event_image_store1))
           unlink($event_image_store1);
         $request->file('event_image')->move($event_dir, $event_image);

          else:

             $this->validate($request, [
            'event_title' => 'required',
            'event_description' => 'required',
            'event_reservation' =>'required',
          ]);
              $event_image_store=$event_image_store1;
             
           endif;

              $myReservation= explode('-', $request->event_reservation);
              $start_time=$myReservation[0];
              $end_time=$myReservation[1];
         
          $event_task= Model\Events::find($event_id);
          $event_task->title = $request->event_title;
          $event_task->description = $request->event_description;
          $event_task->photo = $event_image_store;
          $event_task->start_time =$start_time;
          $event_task->end_time =$end_time;
          $event_task->save();
         

          return back();
    }
/********************************************************************************************/
 protected function deleteevent($id)
    {
          
         $del_event=Model\Events::find($id);
         $del_image=$del_event->photo;
         if(file_exists($del_image))
           unlink($del_image);
         $del_event->delete();

          $id1=Auth::user()->id;
          $event_list=Model\Events::where('admin_id',$id1)->get();

         return view('clientadmin.event_list')->with('event_list',$event_list); 

    }

/********************************************************************************************/
}