<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailyAnalytics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:analytics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive analytics every data at 2:00 am';

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
        \App\TotalArchive::create([
            'total_products'    => \App\Product::all()->count(),
            'total_categories'  => \App\Category::all()->count(),
            'total_users'       => \App\User::all()->count()
        ]);

        echo "Analytics saved\n";
    }
}
