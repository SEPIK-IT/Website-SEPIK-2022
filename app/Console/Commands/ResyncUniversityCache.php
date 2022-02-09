<?php

namespace App\Console\Commands;

use App\Models\SocialMediaMovement;
use App\Models\UniversityCache;
use Illuminate\Console\Command;

class ResyncUniversityCache extends Command
{
    public $tracksUniversity = [];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'universitycache:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the university cache table for any changes';

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

        $this->info('Refreshing university cache table');

        SocialMediaMovement::all()->each(function (SocialMediaMovement $socialMediaMovement) {
            foreach ($socialMediaMovement->universities as $university) {
                if (!array_key_exists($university, $this->tracksUniversity)) {
                    $this->tracksUniversity[$university] = 1;
                } else {
                    $this->tracksUniversity[$university]++;
                }
            }
        });

        UniversityCache::all()->each(function (UniversityCache $universityCache) {
            if (array_key_exists($universityCache->name, $this->tracksUniversity)) {
                $universityCache->update(['registrant' => $this->tracksUniversity[$universityCache->name]]);
            }
        });

        $this->info('All registrant refreshed!');
        return 0;
    }
}
