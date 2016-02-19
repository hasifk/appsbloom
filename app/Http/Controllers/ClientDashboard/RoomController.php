<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class RoomController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Room() {
        $admin = Auth::user()->id;
        $rooms = Model\Room::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.room')->with('rooms', $rooms);
    }

    public function RoomSave(Request $request) {
        $rules = [
            'type' => 'required',
            'capacity' => 'required',
            'rent' => 'required|numeric',
        ];
        $admin = Auth::user()->id;
        $return = 'rooms';
        if ($request->has('id')):
            $return = 'update-room/' . $request->id;
            $obj = Model\Room::find($request->id);
        else:
            $obj = new Model\Room;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->type = $request->type;
            $obj->capacity = $request->capacity;
            $obj->rent = $request->rent;
            $obj->other = $request->other;
            $obj->save();
            return redirect('rooms');
        }
    }

    public function RoomDelete(Request $request) {
        Model\Room::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $rooms = Model\Room::where('admin_id', $admin)->paginate(10);
        if (count($rooms) > 0):
            $f=1;
            foreach ($rooms as $val):
                echo "<tr id=\"room_$val->id\">";
                            echo "<td>" . $f++ . "</td><td class=\"room_focus\">" . $val->type . "</td><td class=\"room_focus\">" . $val->capacity . " Persons</td><td>" . $val->rent . "</td>";
                            ?>
                            <td class="room_focus"><a href="{{url('update-room/'.$val->id)}}" class="room_edit"><i class="fa fa-edit"></i></a></td>
                                    <?php
                                    echo "<td><a class=\"room_delete\" id=\"$val->id\"><i style=\"color:red\" class=\"fa fa-fw fa-trash-o\"></a></i>"
                                    . "</td>";
                                    echo "</tr>";
                                    if (!empty($val->other)):
                                        echo "<tr id=\"room_$val->id\" class=\"others\"><td></td><td colspan=\"5\">" . $val->other . "</td></tr>";
                                    endif;
                
            endforeach;
        else:
            ?>
             <tr><td colspan="3"> No Room Added</td></tr>
        <?php
        endif;
    }

    public function UpdateRoom($id) {
        $admin = Auth::user()->id;
        $rooms = Model\Room::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.room_update')->with('rooms', $rooms);
    }

}
