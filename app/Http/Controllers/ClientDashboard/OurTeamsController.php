<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class OurTeamsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Teams() {
        $admin = Auth::user()->id;
        $ourteam = Model\OurTeam::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.ourteams')->with('ourteam', $ourteam);
    }

    public function TeamsSave(Request $request) {
        $rules = [
            'name' => 'required',
            'about' => 'required',
        ];
        if ($request->has('email')) {
            $rules['email'] = 'required|email';
        }
        if ($request->has('Phone')) {
            $rules['Phone'] = 'required|numeric';
        }
        if ($request->has('image')) {
            $rules['image'] = 'mimes:jpeg';
        }
        $admin = Auth::user()->id;
        $return = 'our-teams';
        if ($request->has('id')):
            $return = 'update-ourteam/' . $request->id;
            $obj = Model\OurTeam::find($request->id);
        else:
            $obj = new Model\OurTeam;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            if ($request->has('image')){
                if($request->image->isValid()) {
                $destinationPath = 'assets/clientassets/uploads/' . $admin . '/Teams'; // upload path
                $extension = $request->image->getClientOriginalExtension(); // getting image extension
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $fileName = rand(11111, 99999) . '.' . $extension; // rename image

                $request->image->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $obj->photo = $destinationPath . '/' . $fileName;
            }}
            $obj->name = $request->name;
            $obj->phone = $request->phone;
            $obj->email = $request->email;
            $obj->about = $request->about;
            $obj->save();
            return redirect('our-teams');
        }
    }

    public function TeamsDelete(Request $request) {
        Model\OurTeam::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $ourteam = Model\OurTeam::where('admin_id', $admin)->paginate(10);
        if (count($ourteam) > 0):
            foreach ($ourteam as $value):
                $info = strip_tags($value->ourteam);
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                <span class="text"><?php echo strlen($info) > 60 ? substr($info, 0, 60) . "..." : $info; ?></span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <?php echo date('d - m - Y', strtotime($value->created_at)) ?> &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo url('update-ourteam/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o ourteam_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                        <div class="panel-body">
                            <?php echo $value->ourteam; ?>
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
                        <span class="text">No OurTeam</span>
                    </h4>
                </div>
            </div>
        <?php
        endif;
    }

    public function UpdateTeams($id) {
        $admin = Auth::user()->id;
        $ourteam = Model\OurTeam::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.ourteam_update')->with('ourteam', $ourteam);
    }

}
