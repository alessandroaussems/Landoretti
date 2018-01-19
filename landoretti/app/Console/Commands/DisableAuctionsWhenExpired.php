<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Auction;
use Carbon\Carbon;
use App\Bidding;
use App\Message;

class DisableAuctionsWhenExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auctions:disable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable all the auctions which are expired.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $auctions=Auction::where("status","active")->get();
        foreach ($auctions as $key => $value)
        {
            if(Carbon::parse($value->enddate)==Carbon::today())
            {
                $biddings=Bidding::where("auctionid",$value->id)->orderBy('biddingprice', 'DESC')->get();
                if(count($biddings) > 0)
                {
                    $userwithhighestbidding=User::where("id",$biddings[0]->userid)->get();
                    $userfromauction=User::where("id",$value->userid)->get();
                    $messagetoauctionowner = new Message();
                    $messagetoauctionowner->message = "A user has bought your artwork: " . $value->title . "!";
                    $messagetoauctionowner->userid=$userfromauction[0]->id;
                    $messagetoauctionowner->save();


                    $messagetohighestbidder= new Message();
                    $messagetohighestbidder->message = "Congrats you have bought the artwork: ". $value->title . "!";
                    $messagetohighestbidder->userid=$userwithhighestbidding[0]->id;
                    $messagetohighestbidder->save();

                    $biddingslosers=Bidding::where("auctionid",$value->id)->get();
                    foreach ($biddingslosers as $biddingloser => $loser)
                    {
                        if($loser->userid!=$userwithhighestbidding[0]->id && $loser->userid!=$value->userid)
                        {
                            $messagetoloser= new Message();
                            $messagetoloser->message = "No! Someone has bought the artwork: ". $value->title . ", and it was NOT you!";
                            $messagetoloser->userid=$loser->userid;
                            $messagetoloser->save();
                        }
                    }

                    $value->status="sold";

                }
                else
                {
                    $userfromauction=User::where("id",$value->userid)->get();
                    $messagetoauctionowner = new Message();
                    $messagetoauctionowner->message = "Your auction: " . $value->title . " is expired! Nobody bought it!";
                    $messagetoauctionowner->userid=$userfromauction[0]->id;
                    $messagetoauctionowner->save();

                    $value->status="expired";
                }
                $value->save();
            }
        }
    }
}
