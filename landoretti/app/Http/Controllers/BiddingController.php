<?php

namespace App\Http\Controllers;

use App\Bidding;
use Illuminate\Http\Request;
use App\Auction;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BiddingController extends Controller
{
    public function showbiddingForm($id)
    {
        /*  $alreadybidding=Bidding::where("userid",Auth::id())->where("auctionid",$id)->first();
          if(count($alreadybidding)!=0)
          {
              abort(404);
          }*/
          $auction = Auction::where("id",$id)->first();
          return view("addbidding")->with('auctionid',$auction->id);
    }
    public function doBidding()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'auctionid'      => 'required',
            'bidding'       => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('auctionbidding/'.Input::get('auctionid'))
                ->withErrors($validator)
                ->withInput();
        }
        if(Input::get('bidding')<=0)
        {
            return Redirect::to('auctionbidding/'.Input::get('auctionid'))
                ->withErrors("Bidding must be greater then zero!")
                ->withInput();
        }
        else {
            $bidding = new Bidding();
            $bidding->biddingprice = Input::get('bidding');
            $bidding->userid= Auth::id();
            $bidding->auctionid=Input::get('auctionid');

            $bidding->save();
            // redirect
            Session::flash('message', 'Succesfully bid!');
            return Redirect::to('auctions/'.Input::get('auctionid'));
        }
    }
}
