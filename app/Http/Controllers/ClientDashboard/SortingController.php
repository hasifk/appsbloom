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
        $admin = Auth::user()->id;
        if ($request->section == "Booking") {
            if (!empty($request->name) && !empty($request->date)) {
                $date = str_replace("/", "-",$request->date);
                $booking = Model\Booking::where('admin_id', $admin)->where('name', 'like', $request->name . "%")->where('date', 'like', $date . "%")->orderBy('created_at')->paginate(20);
            } else if (!empty($request->date)) {
                $date = str_replace("/", "-",$request->date);
                $booking = Model\Booking::where('admin_id', $admin)->where('date', 'like', $date . "%")->paginate(20);
            } else
                $booking = Model\Booking::where('admin_id', $admin)->where('name', 'like', $request->name . "%")->paginate(20);
            ?>
            <script>
                $(document).ready(function () {
                    $('#datetimepicker').datepicker({format: "dd/mm/yyyy"})
                });
            </script>
            <div class="box-header with-border">
                <div class="col-md-3 box-title"><input type="text" name="name" id="name" value="<?php echo $request->name; ?>" placeholder="Name" class="form-control"></div>
                <div class="col-md-3 box-title"><input type="text" name="name" id="datetimepicker" value="<?php echo $request->date; ?>" placeholder="<?php echo date('d/m/Y') ?>" class="form-control">
                    <input type="hidden" name="section" id="section" value="Booking">
                </div>
                <div class="col-md-3 box-title"><button id="search" class="btn btn-primary">Search</button>&nbsp;&nbsp;<button id="reset" class="btn btn-primary">Reset</button></div>
                <div class="box-tools pagination-sm no-margin pull-right">
            <?php echo $booking->links(); ?>
                </div>
            </div><!-- /.box-header -->
            <table class="table table-responsive">
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
                        <td class="booking_focus"><a href="<?php echo url('booking/' . $val->id) ?>" class="booking_edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;  <select name="status" class="booking_status" id="<?php echo $val->id; ?>">
                                <option <?php if ($val->status == 0) { ?> selected="selected" <?php } ?> value="0">Pending</option>
                                <option <?php if ($val->status == 1) { ?> selected="selected" <?php } ?> value="1">Approved</option>
                                <option <?php if ($val->status == -1) { ?> selected="selected" <?php } ?> value="-1">Cancel</option>
                            </select>&nbsp;&nbsp;&nbsp;
                            <a class="booking_delete" id="<?php echo $val->id ?>"><i style="color:red" class="fa fa-fw fa-trash-o"></i></a></td>
                    <?php
                endforeach;
            else:
                ?>
                    <tr><td colspan="6"> No Booking </td></tr>
                        <?php
                        endif;
                        ?>
            </tbody>
            </table>
                <?php
            }
        }

    }
    