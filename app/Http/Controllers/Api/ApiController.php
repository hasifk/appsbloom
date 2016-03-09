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
    public function Display($id, $page) {
        switch ($page) {
            case "about":
                $return = Model\Contents::where('admin_id', $id)->first();
                break;
            case "services":
                $return = Model\Services::where('admin_id', $id)->get();
                break;
            case "contact-us":
                $return = Model\Contact::where('admin_id', $id)->get();
                break;
            case "hours":
                $return = Model\Contents::where('admin_id', $id)->first();
                break;
            case "gallery":
                $return = Model\Gallery::where('admin_id', $id)->get();
                break;
            case "find-us":
                $return = Model\FindUs::where('admin_id', $id)->get();
                break;
            case "price-lists":
                $return = Model\Contents::where('admin_id', $id)->get();
                break;
            case "news":
                $return = Model\News::where('admin_id', $id)->get();
                break;
            case "loyality":
                $return = Model\Loyalty::where('admin_id', $id)->get();
                break;
            case "push-notification":
                $return = Model\Notifications::where('admin_id', $id)->get();
                break;
            case "booking":
                $return = Model\Booking::where('admin_id', $id)->get();
                break;
            case "coupons":
                $return = Model\Coupon::where('admin_id', $id)->get();
                break;
            case "events":
                $return = Model\Events::where('admin_id', $id)->get();
                break;
            case "social":
                $return = Model\Social::where('admin_id', $id)->get();
                break;
            case "language":
                $return = Model\Languages::where('admin_id', $id)->get();
                break;
            case "languagekeys":
                $return = Model\Languagekeys::where('admin_id', $id)->get();
                break;
//            case "analytics":
//                $return = Model\Room::where('admin_id', $id)->get();
//                break;
            case "feedback":
                $return = Model\Feedback::where('admin_id', $id)->get();
                break;
            case "fanwall":
                $return = Model\Fanwall::where('admin_id', $id)->get();
                break;
            case "messages":
                $return = Model\Messages::where('admin_id', $id)->get();
                break;
            case "videos":
                $return = Model\Video::where('admin_id', $id)->get();
                break;
            case "offer":
                $return = Model\Offer::where('admin_id', $id)->get();
                break;
            case "teams":
                $return = Model\OurTeam::where('admin_id', $id)->get();
                break;
            default:
                $return = "";
                break;
        }
        return response()->json($return);
    }

    public function InsertBooking(Request $request) {
      $result = json_decode(file_get_contents('php://input'));
//        $rules = [
//            'name' => 'required',
//            'phone' => 'required|numeric',
//            'email' => 'required|email',
//            'age' => 'required|numeric',
//            'gender' => 'required',
//            'address' => 'required',
//            'date' => 'required',
//        ];
       return("hello");
      exit;
//        $this->validator = Validator::make($request->all(), $rules);
//        if ($this->validator->fails()) {
//            print_r($this->validator);
//        } else {
            //$result = json_decode(file_get_contents('php://input'));
            //echo $result['name'];
      
            $obj = new Model\Booking;
            $obj->admin_id = $result->admin_id;
            $obj->name = $result->name;
            $obj->phone = $result->phone;
            $obj->email = $result->email;
            $obj->age = $result->age;
            $obj->gender = $result->gender;
            $obj->address = $result->address;
            $obj->date = $result->date . " " . $result->time;
            $obj->other = $request->app_id;
            $obj->save();
       // }
    }
    
    public function InsertFanwall(Request $request) {
        $admin = Auth::user()->id;
        $obj = new Model\Fanwall;
        $obj->admin_id = $admin;
        $obj->comment = $request->comment;
        $obj->user_id = $request->userid;
        $obj->save();
    }

    public function InsertFeedback(Request $request) {
        $admin = Auth::user()->id;
        $obj = new Model\Feedback;
        $obj->admin_id = $admin;
        $obj->email = $request->email;
        $obj->feedback = $request->feedback;
        $obj->save();
    }

}
