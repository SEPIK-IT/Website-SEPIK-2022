<?php

namespace App\Console\Commands;

use App\Models\SocialMediaMovement;
use Illuminate\Console\Command;

class FixMemberCountSocialMediaMovement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socialmediamovement:fixcount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $this->info("Fixing social media movement counts...");

        SocialMediaMovement::all()->each(function (SocialMediaMovement $registrant){
            $registrant->update([
               'member_counts' => count($registrant->names)
            ]);
        });

        $this->info("fixing done");

        return 0;
    }
}
