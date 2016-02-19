<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class FeedbackController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Feedbacks() {
        $admin = Auth::user()->id;
        $feedback = Model\Feedback::where('admin_id', $admin)->with('feedback_reply')->paginate(15);
//        $feedback = Model\FeedbackReply::where('admin_id', $admin)->feedback_replay->paginate(15);
        return view('clientadmin.feedback')->with('feedback', $feedback);
    }

    public function ReplySave(Request $request) {
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

    public function FeedbackStatus(Request $request) {
        if ($request->value != -1) {
            $obj = Model\Feedback::find($request->id);
            $obj->status = trim($request->value);
            $obj->save();
        } else {
            Model\FeedbackReply::where('feedback_id', $request->id)->delete();
            Model\Feedback::where('id', $request->id)->delete();
            $admin = Auth::user()->id;
            $feedback = Model\Feedback::where('admin_id', $admin)->with('feedback_reply')->paginate(15);
            if (count($feedback) > 0):
                foreach ($feedback as $value):
                    $info = strip_tags($value->feedback);
                    ?>
                    <div class=" panel panel-default" id="removal">
                        <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">
                                    <span class="text"><?php echo strlen($info) > 40 ? substr($info, 0, 40) . "..." : $value->feedback; ?></span>
                                </a>
                                <!-- General tools such as edit or delete-->
                                <span class="tools pull-right">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>"><i class="fa fa-reply feedback_replay"></i></a>&nbsp;&nbsp;
                                    <select class="fanwall_status" id='<?php echo $value->id ?>' name="status">
                                        <option value="0" <?php if ($value->status == 0): ?> selected=selected"<?php endif; ?>>Pending</option>
                                        <option value="1" <?php if ($value->status == 1): ?> selected=selected"<?php endif; ?>>Approved</option>
                                        <option value="-1" <?php if ($value->status == -1): ?> selected=selected"<?php endif; ?>>Delete</option>
                                    </select>
                                </span>
                            </h4>
                        </div>
                        <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                            <div class="panel-body direct-chat-primary">
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left"><?php echo $value->email ?></span>
                                        <span class="direct-chat-timestamp pull-right"><?php echo date('d M, Y H:m A', strtotime($value->created_at)) ?></span>
                                    </div><!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="assets/clientassets/images/man.png" alt="message user image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?php echo $value->feedback; ?>
                                    </div><!-- /.direct-chat-text -->
                                </div>
                                <?php
                                if (!empty($value->feedback_reply)):
                                    foreach ($value->feedback_reply as $val):
                                        ?>
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-right">Admin</span>
                                                <span class="direct-chat-timestamp pull-left"><?php echo date('d M, Y H:m A', strtotime($val->created_at)) ?></span>
                                            </div><!-- /.direct-chat-info -->
                                            <img class="direct-chat-img" src="assets/clientassets/images/man.png') ?>" alt="message user image"><!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                              <?php echo $val->reply ?>
                                            </div><!-- /.direct-chat-text -->
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <form action="reply_save" method="GET">
                                <div class="box-body pad">
                                    <div class="form-group col-xs-12">
                                        <input type="text" id="reply_<?php echo $value->id ?>" class="ck_edit">

                                    </div>
                                    <div class="form-group col-xs-12">
                                        <input type="hidden" value="<?php echo $value->id ?>" name="id">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
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
    }

}
