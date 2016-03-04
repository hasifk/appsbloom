<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class FanwallController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function Fanwall() {
        $admin = Auth::user()->id;
        $fanwall = Model\Fanwall::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.fanwall')->with('fanwall', $fanwall);
    }
    public function FanwallStatus(Request $request) {

        if ($request->value != -1){
            $obj = Model\Fanwall::find($request->id);
            $obj->status = $request->value;
            $obj->save();
           
        }
        else {
            
         Model\Fanwall::where('id', $request->id)->delete();
            $admin = Auth::user()->id;
            $fanwall = Model\Fanwall::where('admin_id', $admin)->paginate(10);
            if (count($fanwall) > 0):
                foreach ($fanwall as $value):
                    $info = strip_tags($value->comment);
                    ?>
                    <div class="panel panel-default" id="removal">
                        <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                    <span class="text"><?php echo strlen($info) > 50 ? substr($info, 0, 50) . "..." : $info; ?></span>
                                </a>
                                <!-- General tools such as edit or delete-->
                                <span class="tools pull-right">
                                    <?php echo date('d - m - Y',strtotime($value->created_at)) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select class="fanwall_status" id='<?php echo $value->id ?>' name="status">
                                        <option value="0" <?php if ($value->status == 0): ?> selected=selected"<?php endif; ?>>Pending</option>
                                        <option value="1" <?php if ($value->status == 1): ?> selected=selected"<?php endif; ?>>Approved</option>
                                        <option value="-1" <?php if ($value->status == -1): ?> selected=selected"<?php endif; ?>>Delete</option>
                                    </select>
                                </span>
                            </h4>
                        </div>
                        <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                            <div class="panel-body">
                                <?php echo $value->comment; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            else:
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading">
                        <h4 class="panel-title">
                            <span class="text">No Fanwall</span>
                        </h4>
                    </div>
                </div>
            <?php
            endif;
    }
    }
}
