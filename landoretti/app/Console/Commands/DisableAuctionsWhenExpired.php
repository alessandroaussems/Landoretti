<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Auction;
use Carbon\Carbon;

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
            }
        }
    }
}
