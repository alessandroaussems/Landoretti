<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;

class AuctionFilterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function price($category)
    {
        if($category=="upto5000")
        {
            $min=0;
            $max=5000;
        }
        if($category=="5000to10000")
        {
            $min=5000;
            $max=10000;
        }
        if($category=="10000to25000")
        {
            $min=10000;
            $max=25000;
        }
        if($category=="25000to50000")
        {
            $min=25000;
            $max=50000;
        }
        if($category=="50000to100000")
        {
            $min=50000;
            $max=100000;
        }
        if($category=="above")
        {
            $min=100000;
            $max=9999999999999999999999999999999999999999999999999999999999999;
        }
        $auctions = Auction::where("isactive",1)
            ->where('buyoutprice',  ">=",  $min)
            ->where('buyoutprice',  "<=",  $max)
            ->get();
        return view("auctionsoverview")->with('auctions',$auctions);
    }
    public function style($stylesort)
    {
        $auctions = Auction::where("isactive",1)
            ->where('style',$stylesort)
            ->get();
        return view("auctionsoverview")->with('auctions',$auctions);
    }
}
