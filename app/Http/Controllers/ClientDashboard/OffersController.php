<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;
use Psy\Util\Str;

class OffersController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Offers() {
        $admin = Auth::user()->id;
        $offers = Model\Offer::where('admin_id', $admin)->paginate(12);
        return view('clientadmin.offers')->with('offers', $offers);
    }

    public function OfferSave(Request $request) {
        $rules = [
            'date' => 'required',
            'offer_info' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'offers';
        if ($request->has('id')):
            $return = 'update-offer/' . $request->id;
            $obj = Model\Offer::find($request->id);
        else:
            $obj = new Model\Offer;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $date = explode("-", $request->date);
            $obj->start_date = trim($date[0]);
            $obj->end_date = trim($date[1]);
            $obj->offer_info = $request->offer_info;
            $obj->save();
            return redirect('offers');
        }
    }

    public function OfferDelete(Request $request) {
        Model\Offer::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $offers = Model\Offer::where('admin_id', $admin)->paginate(10);
        if (count($offers) > 0):
            $f = 1;
            foreach ($offers as $value):
                $info = strip_tags($value->offer_info);
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id; ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id; ?>">
                                <span class="text">
                                    <?php echo strlen($info) > 30 ? substr($info, 0, 30)."..." : $value->offer_info; ?>
                                </span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <?php echo date('d.m.Y h:i A',strtotime($value->start_date))." - ".date('d.m.Y h:i A',strtotime($value->end_date)) ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo url('update-offer/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o offers_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id; ?>">
                        <div class="panel-body">
                            <?php echo $value->offer_info; ?>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        else:
            ?>
            <tr><td colspan="3"> No Offer Added</td></tr>
        <?php
        endif;
    }

    public function UpdateOffer($id) {
        $admin = Auth::user()->id;
        $offers = Model\Offer::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.offer_update')->with('offers', $offers);
    }

}
