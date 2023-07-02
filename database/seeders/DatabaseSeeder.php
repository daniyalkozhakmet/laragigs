<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\CategoryGig;
use App\Models\Gig;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Gig::factory(50)->create();
        Category::factory()->count(3)->sequence(['name' => 'laravel'], ['name' => 'api'], ['name' => 'backend'])
            ->create();
        // CategoryGig::factory()->count(3)->sequence(['category_id' => 1, 'gig_id' => 1], ['category_id' => 1, 'gig_id' => 2], ['category_id' => 1, 'gig_id' => 5]);
        $categories = \App\Models\Category::all();
        // Gig::all()->each(function ($category) use ($categories) { 
        //     $category->gigs()->attach(
        //         $categories->random(rand(1, 3))->pluck('id')->toArray()
        //     ); 
        // });
        \App\Models\Gig::all()->each(function ($gig) use ($categories) {
            $gig->categories()->saveMany($categories);
        });
    }
}
