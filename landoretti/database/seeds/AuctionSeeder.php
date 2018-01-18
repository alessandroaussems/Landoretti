<?php

use Illuminate\Database\Seeder;
use App\Auction;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auction = new Auction();
        $auction->title = "Mona Lisa";
        $auction->style = "abstract";
        $auction->year = "1912";
        $auction->description = "The famous Mona Lisa";
        $auction->width = "120";
        $auction->height = "60";
        $auction->depth = "10";
        $auction->condition = "As new";
        $auction->origin= "French";
        $auction->photo1 = "Mona Lisa.jpg";
        $auction->minimumestimatedprice ="5000";
        $auction->maximumestimatedprice = "10000";
        $auction->buyoutprice = "11000";
        $auction->enddate = "2018/12/01";
        $auction->conditionsaccepted= 1;
        $auction->userid = 1;
        $auction->isactive = 1;
        $auction->status="active";
        $auction->save();
    }
}
