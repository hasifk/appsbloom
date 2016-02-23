<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class ApiController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
   public function API($id, $page) {
        switch ($page) {
            case "about":
                $return = Model\Contents::where('admin_id', $id)->first();
                break;
            case "services":
                $return = Model\Services::where('admin_id', $id)->first();
                break;
            case "contact-us":
                $return = Model\Contact::where('admin_id', $id)->first();
                break;
            case "hours":
                $return = Model\Contents::where('admin_id', $id)->first();
                break;
            case "gallery":
                $return = Model\Gallery::where('admin_id', $id)->first();
                break;
            case "find-us":
                $return = Model\FindUs::where('admin_id', $id)->first();
                break;
            case "price-lists":
                $return = Model\Contents::where('admin_id', $id)->first();
                break;
            case "news":
                $return = Model\News::where('admin_id', $id)->first();
                break;
            case "loyality":
                $return = Model\Loyalty::where('admin_id', $id)->first();
                break;
            case "push-notification":
                $return = Model\Notifications::where('admin_id', $id)->first();
                break;
            case "booking":
                $return = Model\Room::where('admin_id', $id)->first();
                break;
            case "coupons":
                $return = Model\Coupon::where('admin_id', $id)->first();
                break;
            case "events":
                $return = Model\Events::where('admin_id', $id)->first();
                break;
            case "social":
                $return = Model\Social::where('admin_id', $id)->first();
                break;
            case "language":
                $return = Model\Languages::where('admin_id', $id)->first();
                break;
            case "languagekeys":
                $return = Model\Languagekeys::where('admin_id', $id)->first();
                break;
            case "analytics":
                $return = Model\Room::where('admin_id', $id)->first();
                break;
            case "feedback":
                $return = Model\Feedback::where('admin_id', $id)->first();
                break;
            case "fanwall":
                $return = Model\Fanwall::where('admin_id', $id)->first();
                break;
            case "messages":
                $return = Model\Messages::where('admin_id', $id)->first();
                break;
            case "videos":
                $return = Model\Video::where('admin_id', $id)->first();
                break;
            case "offer":
                $return = Model\Offer::where('admin_id', $id)->first();
                break;
        }
        return response()->json(["responce"=>$return]);
    }
}
