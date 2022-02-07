<?php

namespace App\Console\Commands;

use App\Models\UniversityCache;
use Illuminate\Console\Command;

class FillUniversityCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'university:fillcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill table cache for university';

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
        $universities = [
            ['name' => 'Universitas Kristen Petra'],
            ['name' => 'Universitas Surabaya'],
            ['name' => 'Universitas Ciputra'],
            ['name' => 'Universitas Katolik Widya Mandala']
        ];

        if(UniversityCache::count() === count($universities)){
            $this->info('University cache already filled!');
            return 0;
        }

        foreach ($universities as $university){
            UniversityCache::create([
                'name' => $university['name'],
                'registrant' => 0
            ]);

            $this->info("Created cache for {$university['name']}");
        }

        return 0;
    }
}
