<?php

namespace App\Console\Commands;

use App\Models\ZoomSessionCache;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FillZoomSessionCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zoomsession:fill';

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
        $sessions = [
            '2022-02-19 10:00:00',
            '2022-02-19 17:00:00',
            '2022-02-20 10:00:00',
            '2022-02-20 17:00:00',
            '2022-02-21 18:00:00',
        ];

        foreach ($sessions as $session){
            ZoomSessionCache::create([
               'session_time' => Carbon::parse($session),
               'registrant' => 0
            ]);
        }

        return 0;
    }
}
