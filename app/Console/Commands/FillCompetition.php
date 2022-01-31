<?php

namespace App\Console\Commands;

use App\Models\Competition;
use Illuminate\Console\Command;

class FillCompetition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'competition:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill competition table';

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


        $competitions = [
            [
                'name' => 'MASHUP',
                'nominal' => 30001,
                'last_digit' => 1,
                'multiple_registration' => true,
                'title' => 'PENDAFTARAN SAYEMBARA SEPIK 2022 - MashUp Lagu',
                'intro_text' => '',
                'outro_text' => '',
                'line_group_link' => 'http://line.me/ti/g/jSLzv5fN9U'
            ],
            [
                'name' => 'DESIGN',
                'nominal' => 25003,
                'last_digit' => 3,
                'multiple_registration' => false,
                'title' => 'PENDAFTARAN SAYEMBARA SEPIK 2022 - Design Ilustrasi',
                'intro_text' => '',
                'outro_text' => '',
                'line_group_link' => 'http://line.me/ti/g/t1e_18nVnc'
            ],
            [
                'name' => 'VIDEO',
                'nominal' => 30005,
                'last_digit' => 5,
                'multiple_registration' => true,
                'title' => 'PENDAFTARAN SAYEMBARA SEPIK 2022 - Short Cinematic Video',
                'intro_text' => '',
                'outro_text' => '',
                'line_group_link' => 'http://line.me/ti/g/BoPYndzVtD'

            ],
            [
                'name' => 'PHOTO',
                'nominal' => 25006,
                'last_digit' => 6,
                'multiple_registration' => false,
                'title' => 'PENDAFTARAN SAYEMBARA SEPIK 2022 - Human Interest & Street Photography',
                'intro_text' => '',
                'outro_text' => '',
                'line_group_link' => 'http://line.me/ti/g/nSM2VJPwA_',
            ],
        ];

        $this->info('Creating competitions');

        foreach ($competitions as $competition) {
            Competition::create($competition);
            $this->info("Created competition data for {$competition['name']}");
        }

        return 0;
    }
}
