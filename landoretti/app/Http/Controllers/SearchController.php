<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function search()
    {
        $auctions=Auction::where("title", 'LIKE', '%'.Input::get("searchquery").'%')
                            ->where("isactive",1)
                            ->get();
        return view("auctionsoverview")->with('auctions',$auctions)->with("searchquery",Input::get("searchquery"));
    }
}
