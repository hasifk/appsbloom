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
        $value = $request->value;
        $obj = Model\Booking::find($request->id);
        $app_id = $obj->app_id;
        $device = $obj->device_type;
        $obj->status = $value;
        $obj->save();
        if ($value == 1)
            $mssg = "Your appoinment booking is approved";
        else if ($value == -1)
            $mssg = "Sorry..Your appoinment booking is Cancelled";
        else
            $mssg = "Sorry..Your appoinment booking is Pending, it will be approved shortly";
        if ($device == 'Android') {

// API access key from Google API's Console
            define('API_ACCESS_KEY', 'AIzaSyDPQxOac0sXH7VZEa79R45hCuJjXTn0X8g');

// prep the bundle

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
                'registration_ids' => array($app_id),
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
// Close connection
            curl_close($ch);
        } else {
// Provide the Host Information.
            $tHost = 'gateway.sandbox.push.apple.com';
//$tHost = 'gateway.push.apple.com';
            $tPort = 2195;
// Provide the Certificate and Key Data.
            $tCert = realpath('../../../../public/assets/clientassets/') . '/' . 'pushcert.pem';

// Provide the Private Key Passphrase (alternatively you can keep this secrete
// and enter the key manually on the terminal -> remove relevant line from code).
// Replace XXXXX with your Passphrase
            $tPassphrase = 'SilverBloom1978';
// Provide the Device Identifier (Ensure that the Identifier does not have spaces in it).
// Replace this token with the token of the iOS device that is to receive the notification.
//$tToken = 'b3d7a96d5bfc73f96d5bfc73f96d5bfc73f7a06c3b0101296d5bfc73f38311b4';
            $tToken = $app_id;
//0a32cbcc8464ec05ac3389429813119b6febca1cd567939b2f54892cd1dcb134
// The message that is to appear on the dialog.
            $tAlert = $mssg;
// The Badge Number for the Application Icon (integer >=0).
            $tBadge = 8;
// Audible Notification Option.
            $tSound = 'default';
// The content that is returned by the LiveCode "pushNotificationReceived" message.
            $tPayload = 'APNS Message Handled by LiveCode';
// Create the message content that is to be sent to the device.
            $tBody['aps'] = array(
                'alert' => $tAlert,
                'badge' => $tBadge,
                'sound' => $tSound,
            );
            $tBody ['payload'] = $tPayload;
// Encode the body to JSON.
            $tBody = json_encode($tBody);
// Create the Socket Stream.
            $tContext = stream_context_create();
            stream_context_set_option($tContext, 'ssl', 'local_cert', $tCert);
// Remove this line if you would like to enter the Private Key Passphrase manually.
            stream_context_set_option($tContext, 'ssl', 'passphrase', $tPassphrase);
// Open the Connection to the APNS Server.
            $tSocket = stream_socket_client('ssl://' . $tHost . ':' . $tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $tContext);
// Check if we were able to open a socket.
            if (!$tSocket)
                exit("APNS Connection Failed: $error $errstr" . PHP_EOL);
// Build the Binary Notification.
            $tMsg = chr(0) . chr(0) . chr(32) . pack('H*', $tToken) . pack('n', strlen($tBody)) . $tBody;
// Send the Notification to the Server.
            $tResult = fwrite($tSocket, $tMsg, strlen($tMsg));
//if ($tResult)
//echo 'Delivered Message to APNS' . PHP_EOL;
//else
//echo 'Could not Deliver Message to APNS' . PHP_EOL;
// Close the Connection to the Server.
            fclose($tSocket);
        }
    }

}
