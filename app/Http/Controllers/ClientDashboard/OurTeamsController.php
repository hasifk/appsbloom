<?php
namespace App\Http\Controllers\ClientDashboard;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class MessagesController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Messages() {
        $admin = Auth::user()->id;
        $message = Model\Messages::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.message')->with('message', $message);
    }

    public function MessageSave(Request $request) {
        $rules = [
            'message' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'message';
        if ($request->has('id')):
            $return = 'update-message/' . $request->id;
            $obj = Model\Messages::find($request->id);
        else:
            $obj = new Model\Messages;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->message = $request->message;
            $obj->save();
            return redirect('messages');
        }
    }

    public function MessageDelete(Request $request) {
        Model\Messages::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $message = Model\Messages::where('admin_id', $admin)->paginate(10);
        if (count($message) > 0):
            foreach ($message as $value):
            $info = strip_tags($value->message);
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                <span class="text"><?php echo strlen($info) > 60 ? substr($info, 0,60)."..." : $info; ?></span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <?php echo date('d - m - Y',strtotime($value->created_at)) ?> &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo url('update-message/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o message_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                        <div class="panel-body">
                            <?php echo $value->message; ?>
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
                        <span class="text">No Messages</span>
                    </h4>
                </div>
            </div>
        <?php
        endif;
    }
    public function UpdateMessage($id) {
        $admin = Auth::user()->id;
        $message = Model\Messages::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.message_update')->with('message', $message);
    }

}
