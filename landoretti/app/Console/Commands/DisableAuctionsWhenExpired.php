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
        $auctions=Auction::where("isactive",1)->get();
        foreach ($auctions as $key => $value)
        {
            if(Carbon::parse($value->enddate)==Carbon::today())
            {
                $value->isactive=0;
                $value->save();
                $biddings=Bidding::where("auctionid",$value->id)->orderBy('biddingprice', 'DESC')->get();
                if($biddings != array())
                {

                    $userwithhighestbidding=User::where("id",$biddings[0]->userid)->get();
                    $userfromauction=User::where("id",$value->userid)->get();
                    $messagetoauctionowner = new Message();
                    $messagetoauctionowner->message = "Een gebruiker heeft uw kunstwerk " . $value->title . " gekocht!";
                    $messagetoauctionowner->userid=$userfromauction[0]->id;
                    $messagetoauctionowner->save();

                    $messagetohighestbidder= new Message();
                    $messagetohighestbidder->message = "Proficiat uw heeft het kunstwerk ". $value->title . " gekocht!";
                    $messagetohighestbidder->userid=$userwithhighestbidding[0]->id;
                    $messagetohighestbidder->save();

                }
            }
        }
    }
}
