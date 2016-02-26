<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Booking() {
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.booking')->with('booking', $booking);
    }
    public function BookingSave(Request $request) {
        $rules = [
            'type' => 'required',
            'capacity' => 'required',
            'rent' => 'required|numeric',
        ];
        $admin = Auth::user()->id;
        $return = 'booking';
        if ($request->has('id')):
            $return = 'update-booking/' . $request->id;
            $obj = Model\Booking::find($request->id);
        else:
            $obj = new Model\Booking;
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
            return redirect('booking');
        }
    }

    public function BookingDelete(Request $request) {
        Model\Booking::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('admin_id', $admin)->paginate(10);
        if (count($booking) > 0):
            $f = 1;
            foreach ($booking as $val):
                echo "<tr id=\"booking_$val->id\">";
                echo "<td>" . $f++ . "</td><td class=\"booking_focus\">" . $val->type . "</td><td class=\"booking_focus\">" . $val->capacity . " Persons</td><td>" . $val->rent . "</td>";
                ?>
                <td class="booking_focus"><a href="{{url('update-booking/'.$val->id)}}" class="booking_edit"><i class="fa fa-edit"></i></a></td>
                        <?php

                        echo "<td><a class=\"booking_delete\" id=\"$val->id\"><i style=\"color:red\" class=\"fa fa-fw fa-trash-o\"></a></i>"
                        . "</td>";
                        echo "</tr>";
                        if (!empty($val->other)):
                            echo "<tr id=\"booking_$val->id\" class=\"others\"><td></td><td colspan=\"5\">" . $val->other . "</td></tr>";
                        endif;

                    endforeach;
                else:
                    ?>
            <tr><td colspan="3"> No Booking Added</td></tr>
        <?php

        endif;
    }

    public function UpdateBooking($id) {
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.booking_update')->with('booking', $booking);
    }

}
