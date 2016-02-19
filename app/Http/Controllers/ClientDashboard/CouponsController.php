<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class CouponsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Coupons() {
        $admin = Auth::user()->id;
        $coupons = Model\Coupon::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.coupon')->with('coupons', $coupons);
    }

    public function CouponSave(Request $request) {
        $rules = [
            'coupon_code' => 'required',
            'date' => 'required',
            'description' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'coupons';
        if ($request->has('id')):
            $return = 'update-coupon/' . $request->id;
            $obj = Model\Coupon::find($request->id);
        else:
            $obj = new Model\Coupon;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->coupon_code = $request->coupon_code;
            $date = explode("-", $request->date);
            $obj->start_date = trim($date[0]);
            $obj->end_date = trim($date[1]);
            $obj->description = $request->description;
            $obj->save();
            return redirect('coupons');
        }
    }

    public function CouponDelete(Request $request) {
        Model\Coupon::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $coupons = Model\Coupon::where('admin_id', $admin)->paginate(10);
        if (count($coupons) > 0):
            $f = 1;
            foreach ($coupons as $value):
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id;?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id;?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id;?>">

                                <span class="text"><?php echo $value->coupon_code;?></span>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<font color="##66b2ff"><?php echo $value->start_date." to ".$value->end_date;?></font>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <?php echo date('d.m.Y h:i A',strtotime($value->start_date))." - ".date('d.m.Y h:i A',strtotime($value->end_date)) ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo url('update-coupons/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o coupons_delete" id="<?php echo $value->id;?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id;?>">
                        <div class="panel-body">
                            {!!$value->description!!}
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        else:
            ?>
            <tr><td colspan="3"> No Coupon Added</td></tr>
        <?php
        endif;
    }

    public function UpdateCoupon($id) {
        $admin = Auth::user()->id;
        $coupons = Model\Coupon::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.coupon_update')->with('coupons', $coupons);
    }

}
