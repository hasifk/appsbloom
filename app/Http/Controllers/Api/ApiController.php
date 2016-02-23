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
                $return = Model\Gallery::where('admin_id', $id)->first();
                break;
            case "push-notification":
                $return = Model\FindUs::where('admin_id', $id)->first();
                break;
            case "booking":
                $return = Model\Pricelist::where('admin_id', $id)->first();
                break;
            case "coupons":
                $return = Model\News::where('admin_id', $id)->first();
                break;
        }
        return response()->json(["responce"=>$return]);
    }
}
