<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class SortingController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Sorting(Request $request) {

        if ($request->section == "Booking") {
            $admin = Auth::user()->id;
            $booking = Model\Booking::where('admin_id', $admin)->where('name', 'like', $request->name . "%")->paginate(2);
            //return view('clientadmin.booking')->with('booking', $booking);
            ?>
            <table class="table table-responsive" id="booking">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($booking) > 0):
                        $f = 1;
                        foreach ($booking as $val):
                            echo "<tr id=\"booking_$val->id\">";
                            echo "<td>" . $f++ . "</td><td class=\"booking_focus\">" . $val->name . "</td><td class=\"booking_focus\">" . $val->phone . "</td><td>" . $val->age . "</td><td>" . $val->date . "</td>";
                            ?>
                        <td class="booking_focus"><a href="<?php echo url('booking/'.$val->id) ?>" class="booking_edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                            <?php // echo Form::select('status',array('0'=>'Pending','1' => 'Approved','-1'=>'Cancel'),$val->status,array('id'=>$val->id,'class'=>'booking_status')) ?>&nbsp;&nbsp;&nbsp;
                            <a class="booking_delete" id="<?php echo $val->id ?>"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a></td>
                                <?php
                            endforeach;
                        else:
                            ?>
                    <tr><td colspan="6"> No Booking Added</td></tr>
                        <?php
                        endif;
                        ?>
            </tbody>
            </table>
            <?php
        }
    }

}
