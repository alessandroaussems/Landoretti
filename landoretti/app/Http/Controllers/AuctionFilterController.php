<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
    public function era($era)
    {
        if($era=="prewar")
        {
            $min=1900;
            $max=1940;
        }
        if($era=="1940to1950")
        {
            $min=1940;
            $max=1960;
        }
        if($era=="1960to1980")
        {
            $min=1960;
            $max=1990;
        }
        if($era=="1990topresent")
        {
            $min=1990;
            $max=date("Y");
        }
        $auctions = Auction::where("isactive",1)
            ->where('year',  ">=",  $min)
            ->where('year',  "<=",  $max)
            ->get();
        return view("auctionsoverview")->with('auctions',$auctions);
    }
    public function ending($ending)
    {
        if($ending=="thisweek")
        {
            $auctions = Auction::where("isactive",1)
                ->where('enddate',  ">=",  Carbon::today())
                ->where('enddate',  "<=",  Carbon::now()->addDays(7))
                ->get();
            return view("auctionsoverview")->with('auctions',$auctions);
        }
        if($ending=="purchasenow")
        {
            $auctions = Auction::where("isactive",1)
                ->where('enddate',  ">=",  Carbon::today())
                ->where('enddate',  "<=",  Carbon::now()->addDays(1))
                ->get();
            return view("auctionsoverview")->with('auctions',$auctions);
        }
    }
}
