<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class PushNotificationController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Notifications() {
        $admin = Auth::user()->id;
        $notification = Model\Notifications::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.notification')->with('notification', $notification);
    }

    public function NotificationSave(Request $request) {
        $rules = [
            'notification' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'notification';
        $obj = new Model\Notifications;
        $obj->admin_id = $admin;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->notification = $request->notification;
            $obj->save();
            return redirect('notifications');
        }
    }

    public function NotificationDelete(Request $request) {
        Model\Notifications::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $notification = Model\Notifications::where('admin_id', $admin)->paginate(10);
        if (count($notification) > 0):
            foreach ($notification as $value):
            $info = strip_tags($value->notification);
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                <span class="text"><?php echo strlen($info) > 50 ? substr($info, 0, 50)."..." : $info; ?></span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <a href="<?php echo url('update-notification/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o notification_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                        <div class="panel-body">
                            <?php echo $value->notification; ?>
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
                        <span class="text">No Notifications</span>
                    </h4>
                </div>
            </div>
        <?php
        endif;
    }
    public function UpdateNotification($id) {
        $admin = Auth::user()->id;
        $notification = Model\Notifications::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.notification_update')->with('notification', $notification);
    }
}
