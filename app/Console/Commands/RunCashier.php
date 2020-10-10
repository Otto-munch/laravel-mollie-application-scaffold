<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunCashier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:cashier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run molly cashier ';

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
     * @return int
     */
    public function handle()
    {
        Cashier::run();
    }
}
