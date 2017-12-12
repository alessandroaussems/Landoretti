<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;
use App\Starred;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StarredAuctionController extends Controller
{
    public function showstarredAuctions()
    {
        $auctions=[];
        $stars = Starred::where("userid",Auth::id())->get();
        foreach ($stars as $key => $value)
        {
            $auction=Auction::where("id",$value->auctionid)->first();
            array_push($auctions,$auction);
        }
        return view("auctionsoverview")->with("auctions",$auctions);

    }
    public function star($id)
    {
        $star = new Starred();
        $star->auctionid= $id;
        $star->userid=Auth::id();
        $star->save();
        return Redirect::to('/auctions/'.$id);
    }
    public function unstar($id)
    {
        $star = Starred::where([
            'auctionid' => $id,
            'userid' => Auth::id(),
        ]);
        $star->delete();
        return Redirect::to('/auctions/'.$id);
    }
}
