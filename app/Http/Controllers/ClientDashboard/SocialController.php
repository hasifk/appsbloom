<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class SocialController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Social() {
        $admin = Auth::user()->id;
        $social = Model\Social::where('admin_id', $admin)->get();
        if(count($social) > 0 && empty($social[0]->facebook) && empty($social[0]->instagram)&&empty($social[0]->twitter)):
        Model\Social::where('admin_id',$admin)->delete();
        return redirect('social');
        else:
        return view('clientadmin.social')->with('social', $social);
        endif;
    }

    public function SocialSave(Request $request) {
        $admin = Auth::user()->id;
        $return = 'social';
        if ($request->has('id')):
            $return = 'update-social/' . $request->id;
            $obj = Model\Social::find($request->id);
        else:
            $obj = new Model\Social;
            $obj->admin_id = $admin;
        endif;
            $obj->facebook = trim($request->facebook);
            $obj->instagram = trim($request->instagram);
            $obj->twitter = trim($request->twitter);
            $obj->save();
            return redirect('social');
    }

    public function SocialDelete(Request $request) {
        Model\Social::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $social = Model\Social::where('admin_id', $admin)->paginate(10);
        if (count($social) > 0):
            $f = 1;
            foreach ($social as $value):
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id;?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id;?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id;?>">

                                <span class="text"><?php echo $value->social_code;?></span>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<font color="##66b2ff"><?php echo $value->start_date." to ".$value->end_date;?></font>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <a href="<?php echo url('update-social/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o social_delete" id="<?php echo $value->id;?>"></i>
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
            <tr><td colspan="3"> No Social Added</td></tr>
        <?php
        endif;
    }

    public function UpdateSocial($id) {
        $admin = Auth::user()->id;
        $social = Model\Social::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.social_update')->with('social', $social);
    }

}
