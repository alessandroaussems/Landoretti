<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Starred;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Bidding;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\User;
use App\Message;


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
        $auctions = Auction::where("isactive",1)->get();
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
            'conditionsaccepted' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('auctions/create')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            if (Input::get('conditionsaccepted')!=null)
            {
                $conditionsaccepted=1;
            }
            else{
                $conditionsaccepted=0;
            }
            $image = $request->file('image');
            $photoName = Input::get('title') . '.' . $image->getClientOriginalExtension();
            $path=public_path('img/auctions/'.$photoName);
            Image::make($image->getRealPath())->resize(500, 500)->save($path);

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
            $auction->enddate = date("Y-m-d", strtotime(Input::get('enddate')));
            $auction->conditionsaccepted= $conditionsaccepted;
            $auction->userid = Auth::id();
            $auction->isactive = 1;
            $auction->status="active";
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
        $auction = Auction::where([
            'id' => $id,
            'isactive' => 1,
        ])->first();
        if(count($auction)==0)
        {
            abort(404);
        }
        $biddings=Bidding::
        join('users', 'userid', '=', 'users.id')
            ->select('users.name', 'biddings.biddingprice')
            ->where("auctionid",$id)
            ->get();
        $star = Starred::where([
            'auctionid' => $id,
            'userid' => Auth::id(),
        ])->first();
        if ($star==NULL)
        {
            $isalreadystarred=false;
        }
        else
        {
            $isalreadystarred=true;
        }
        return view("auctiondetail")->with('auction',$auction)->with("biddings",$biddings)->with("alreadystarred",$isalreadystarred);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::where([
            'id' => $id,
            'isactive' => 1,
            'userid' => Auth::id()
        ])->first();
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
            $auction->enddate = date("Y-m-d", strtotime(Input::get('enddate')));
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
        $auction = Auction::where([
            'id' => $id,
            'isactive' => 1,
            'userid' => Auth::id()
        ])->first();
        $auction->isactive=0;
        $auction->save();
        return Redirect::to('myauctions');
    }
    public function  myauctions()
    {
        $auctions = Auction::where([
            'userid' => Auth::id()
        ])->get();
        return view("myauctions")->with('auctions',$auctions);
    }
    public function buyNow($id)
    {
        // delete
        $auction = Auction::where([
            'id' => $id,
            'isactive' => 1,
        ])->first();
        $auction->isactive=0;
        $auction->status="sold";

        $user=Auth::id();
        $userfromauction=User::where("id",$auction->userid)->get();
        $messagetoauctionowner = new Message();
        $messagetoauctionowner->message = "Een gebruiker heeft uw kunstwerk " . $auction->title . " direct gekocht!";
        $messagetoauctionowner->userid=$userfromauction[0]->id;
        $messagetoauctionowner->save();

        $messagetobuyer= new Message();
        $messagetobuyer->message = "Proficiat uw heeft het kunstwerk ". $auction->title . " gekocht!";
        $messagetobuyer->userid=$user;
        $messagetobuyer->save();

        $auction->save();
        return view("thankyou");
    }
}
