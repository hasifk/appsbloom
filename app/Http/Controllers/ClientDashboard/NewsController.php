<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class NewsController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function News() {
        $admin = Auth::user()->id;
        $news = Model\News::where('admin_id', $admin)->paginate(3);
        return view('clientadmin.news')->with('news', $news);
    }

    public function NewsSave(Request $request) {
        $rules = [
            'title' => 'required',
            'news' => 'required',
        ];
        $admin = Auth::user()->id;
        $return = 'news';
        if ($request->has('id')):
            $return = 'update-news/' . $request->id;
            $obj = Model\News::find($request->id);
        else:
            $obj = new Model\News;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->title = $request->title;
            $obj->news = $request->news;
            $obj->save();
            return redirect('news');
        }
    }

    public function NewsDelete(Request $request) {
        Model\News::where('id', $request->id)->delete();
        $admin = Auth::user()->id;
        $news = Model\News::where('admin_id', $admin)->paginate(3);
        if (count($news) > 0):
            foreach ($news as $value):
                ?>
                <div class="panel panel-default" id="removal">
                    <div class="panel-heading" role="tab" id="heading_<?php echo $value->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->id ?>" aria-expanded="false" aria-controls="collapse_<?php echo $value->id ?>">

                                <span class="text"><?php echo $value->title ?></span>
                            </a>
                            <!-- General tools such as edit or delete-->
                            <span class="tools pull-right">
                                <a href="<?php echo url('update-news/' . $value->id) ?>"><i class="fa fa-edit"></i></a>
                                <i class="fa fa-trash-o news_delete" id="<?php echo $value->id ?>"></i>
                            </span>
                        </h4>
                    </div>
                    <div id="collapse_<?php echo $value->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $value->id ?>">
                        <div class="panel-body">
                            <?php echo $value->news; ?>
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
                        <span class="text">No News</span>
                    </h4>
                </div>
            </div>
        <?php
        endif;
    }
    public function UpdateNews($id) {
        $admin = Auth::user()->id;
        $news = Model\News::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.news_update')->with('news', $news);
    }

}
