<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //this function will create 5 dummy users if you uncomment
        // \App\Models\User::factory(5)->create();

        //create only 1 user when seeded
        $user = User::factory()->create([
            'name' => 'Olive Myki',
            'email' => "OliveMyki@gmail.com"
        ]);

        //seeding using a factory that is linkd to the created user
        Listing::factory(10)->create([
            'user_id' => $user->id
        ]);

        //seeding using a factory
        // Listing::factory(10)->create();

        //Manual Seeding method
        /*
        Listing::create([
            'id' => 1,
            'title' => "Sample title 1",
            'tags' => "Laravel",
            'company' => "Company xyz",
            'location' => "sample city",
            'email' => "sample@sam.com",
            'website' => "sample.com",
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);
        Listing::create([
            'id' => 2,
            'title' => "Sample title 2",
            'tags' => "Laravel 2",
            'company' => "Company xyza",
            'location' => "sample2 city",
            'email' => "sample2@sam.com",
            'website' => "sample2   .com",
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);
        */
    }
}
