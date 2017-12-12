<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $auctions = Auction::all();
        return view("auctionsoverview")->with('auctions',$auctions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createauction");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'style'     => 'required' ,
            'year'       => 'required',
            'description'=> 'required',
            'width' => 'required',
            'height' => 'required',
            'depth' => 'required',
            'condition' => 'required',
            'origin' => 'required',
            'image'      => 'required|image',
            'minimumestimatedprice' => 'required',
            'maximumestimatedprice' => 'required',
            'buyoutprice' => 'required',
            'enddate' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('auctions/create')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $image = $request->file('image');
            $photoName = Input::get('title') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/'), $photoName);

            $auction = new Auction();
            $auction->title = Input::get('title');
            $auction->style = Input::get('style');
            $auction->year = Input::get('year');
            $auction->description = Input::get('description');
            $auction->width = Input::get('width');
            $auction->height = Input::get('height');
            $auction->depth = Input::get('depth');
            $auction->condition = Input::get('condition');
            $auction->origin= Input::get('origin');
            $auction->photo1 = $photoName;
            $auction->minimumestimatedprice = Input::get('minimumestimatedprice');
            $auction->maximumestimatedprice = Input::get('maximumestimatedprice');
            $auction->buyoutprice = Input::get('buyoutprice');
            $auction->enddate = Input::get('enddate');
            $auction->userid = Auth::id();
            $auction->save();
            // redirect
            Session::flash('message', 'Auction succesfully added!');
            return Redirect::to('/auctions');
        }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::where("id",$id)->first();
        return view("auctiondetail")->with('auction',$auction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::where("id",$id)->first();
        return view("editauction")->with('auction',$auction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'      => 'required',
            'style'     => 'required' ,
            'year'       => 'required',
            'description'=> 'required',
            'width' => 'required',
            'height' => 'required',
            'depth' => 'required',
            'condition' => 'required',
            'origin' => 'required',
            'image'      => 'required|image',
            'minimumestimatedprice' => 'required',
            'maximumestimatedprice' => 'required',
            'buyoutprice' => 'required',
            'enddate' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('auctions/'.$id.'edit')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $image = $request->file('image');
            $photoName = Input::get('title') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/'), $photoName);

            $auction = Auction::find($id);
            $auction->title = Input::get('title');
            $auction->style = Input::get('style');
            $auction->year = Input::get('year');
            $auction->description = Input::get('description');
            $auction->width = Input::get('width');
            $auction->height = Input::get('height');
            $auction->depth = Input::get('depth');
            $auction->condition = Input::get('condition');
            $auction->origin= Input::get('origin');
            $auction->photo1 = $photoName;
            $auction->minimumestimatedprice = Input::get('minimumestimatedprice');
            $auction->maximumestimatedprice = Input::get('maximumestimatedprice');
            $auction->buyoutprice = Input::get('buyoutprice');
            $auction->enddate = Input::get('enddate');
            $auction->userid = Auth::id();
            $auction->save();
            // redirect
            Session::flash('message', 'Auction succesfully changed!');
            return Redirect::to('/auctions/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $auction = Auction::find($id);
        $auction->delete();
        return Redirect::to('myauctions');
    }
    public function  myauctions()
    {
        $auctions = Auction::where("userid",Auth::id())->get();
        return view("myauctions")->with('auctions',$auctions);
    }
}
