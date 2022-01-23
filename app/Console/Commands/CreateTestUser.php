<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateTestUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:test-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create test user';

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
        $this->info('Creating one test user...');
        $faker = Factory::create('id');
        User::create([
            'name' => $faker->name,
            'email' => 'test@test.com',
            'phone' => $faker->phoneNumber,
            'line_id' => $faker->text,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $this->info('You can login with the email test@test.com and password is password ');
        return 0;
    }
}
