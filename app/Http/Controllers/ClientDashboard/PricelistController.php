<?php

namespace App\Http\Controllers\ClientDashboard;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Model;
use Illuminate\Http\Request;
use Validator;

class PricelistController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function PriceLists() {
        $id = Auth::user()->id;
        $pricelists = Model\Contents::where('admin_id', $id)->first();
        return view('clientadmin.pricelists')->with('pricelists', $pricelists);
    }

    public function PricelistSave(Request $request) {
        
       
            $admin = Auth::user()->id;
            
            $obj = Model\Contents::where('admin_id', $admin)->first();
            if(!empty($obj)):
                $obj->price_lists=$request->price_lists;
            else:
                $obj = new Model\Contents;
                $obj->admin_id=$admin;
                $obj->price_lists=$request->price_lists;
            endif;
            
            $obj->save();
            return redirect('price-list');
        }
}
