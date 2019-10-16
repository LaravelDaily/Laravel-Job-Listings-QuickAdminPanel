<?php

use App\Category;
use App\Company;
use App\Job;
use App\Location;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id');
        $companies = Company::pluck('id');
        $locations = Location::pluck('id');
        $faker = Faker\Factory::create();

        foreach(range(1, 7) as $id)
        {
            $job = new Job;
            $job->title = $faker->unique()->jobTitle;
            $job->short_description = $faker->sentence;
            $job->full_description = $faker->paragraph;
            $job->requirements = $faker->paragraph;
            $job->job_nature = "Full-time";
            $job->company_id = $companies->random();
            $job->location_id = $locations->random();
            $job->address = $faker->unique()->address;
            $job->salary = "15k - 25k";
            $job->top_rated = rand(0, 1);
            $job->save();
            $job->categories()->sync($categories->random(rand(1,3)));
        }
    }
}
