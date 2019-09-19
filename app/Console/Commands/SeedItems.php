<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 1000 items and a 100 users';

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
        factory('App\User', 100)->create();
        factory('App\Item', 1000)->create();

        $this->info('Done');
    }
}
