<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SessionRefreshing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:refreshing';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Refreshing database expired session items';


    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        DB::table('sessions')->where('created_at','<',Carbon::now()->subDays(14))->delete();
    }
}
