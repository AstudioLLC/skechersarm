<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Laravel log';


    public function handle()
    {
        array_map('unlink', array_filter((array) glob(storage_path('logs/*.log'))));
        $this->comment('Logs have been cleared!');

    }
}
