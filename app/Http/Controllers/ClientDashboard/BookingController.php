<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Booking() {
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('admin_id', $admin)->orderBy('created_at')->paginate(20);
        return view('clientadmin.booking')->with('booking', $booking);
    }

    public function Bookings() {
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('admin_id', $admin)->paginate(10);
        return view('clientadmin.bookings')->with('booking', $booking);
    }

    public function BookingSave(Request $request) {
        $rules = [
            'type' => 'required',
            'capacity' => 'required',
            'rent' => 'required|numeric',
        ];
        $admin = Auth::user()->id;
        $return = 'booking';
        if ($request->has('id')):
            $return = 'update-booking/' . $request->id;
            $obj = Model\Booking::find($request->id);
        else:
            $obj = new Model\Booking;
            $obj->admin_id = $admin;
        endif;
        $this->validator = Validator::make($request->all(), $rules);
        if ($this->validator->fails()) {
            return redirect($return)
                            ->withErrors($this->validator)
                            ->withInput();
        } else {
            $obj->type = $request->type;
            $obj->capacity = $request->capacity;
            $obj->rent = $request->rent;
            $obj->other = $request->other;
            $obj->save();
            return redirect('booking');
        }
    }

    public function BookingDelete(Request $request) {
        Model\Booking::where('id', $request->id)->delete();
    }

    public function UpdateBooking($id) {
        $admin = Auth::user()->id;
        $booking = Model\Booking::where('id', $id)->where('admin_id', $admin)->get();
        return view('clientadmin.booking_update')->with('booking', $booking);
    }

    public function BookingStatus(Request $request) {
        $ids = explode("-", $request->id); //$request->value contains both status and app_id
        //echo $request->id;
        $value=$request->value;
        $obj = Model\Booking::find($ids[0]);
        $obj->status = $value;
        $obj->save();

//        // API access key from Google API's Console
        define('API_ACCESS_KEY', 'AIzaSyDPQxOac0sXH7VZEa79R45hCuJjXTn0X8g');
        if ($value == 1)
            $mssg = "Your appoinment booking is approved";
        else if ($value == -1)
            $mssg = "Sorry..Your appoinment booking is Cancelled";
        else 
            $mssg = "Sorry..Your appoinment booking is Pending, it will be approved shortly";
        // prep the bundle
        echo $mssg; 
        exit;
        $msg = array
            (
            'message' => $mssg,
            'title' => "Booking Status",
            'subtitle' => 'This is a subtitle. subtitle',
            'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
            'vibrate' => 1,
            'sound' => 1,
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon'
        );
        $fields = array
            (
            'registration_ids' => $ids[1],
            'data' => $msg
        );

        $headers = array
            (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }

}
