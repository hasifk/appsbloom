<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class GoogleanlyticsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Googleanlytics() {
        $admin = Auth::user()->id;
        $feedback = Model\Feedback::where('admin_id', $admin)->with('feedback_reply')->paginate(15);
//        $feedback = Model\FeedbackReply::where('admin_id', $admin)->feedback_replay->paginate(15);
        return view('clientadmin.feedback')->with('feedback', $feedback);
    }

    public function GoogleanlyticsSave(Request $request) {
        $rules = [
            'reply' => 'required',
        ];

        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect('feedback')
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $admin = Auth::user()->id;
            $obj = new Model\FeedbackReply;
            $obj->feedback_id = $request->id;
            $obj->admin_id = $admin;
            $obj->reply = $request->reply;
            $obj->save();
            return redirect('feedback');
        }
    }

    public function GoogleanlyticsDelete(Request $request) {
        Model\Feedback::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $feedback = Model\Feedback::where('admin_id', $admin)->paginate(3);
        if (count($feedback) > 0):
            foreach ($feedback as $value):
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                <span class="text"><?php echo $value->title ?></span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <a href="<?php echo url('update-feedback/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o feedback_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                        <div class="panel-body">
                            <?php echo $value->feedback; ?>
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
                        <span class="text">No Feedback</span>
                    </h4>
                </div>
            </div>
        <?php
        endif;
    }

    public function UpdateGoogleanlytics($id) {
        $admin = Auth::user()->id;
        $feedback = Model\Feedback::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.feedback_update')->with('feedback', $feedback);
    }

}
