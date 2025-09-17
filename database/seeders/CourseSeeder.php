<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'title' => 'Laravel for Beginners',
            'description' => 'Learn the basics of Laravel framework including routing, migrations, and authentication.',
            'price' => 599.99,
        ]);

        Course::create([
            'title' => 'Advanced Laravel',
            'description' => 'Deep dive into Laravel features like queues, events, broadcasting, and testing.',
            'price' => 999.99,
        ]);

        Course::create([
            'title' => 'Business Analytics with SQL',
            'description' => 'Learn SQL queries and data analysis for business intelligence.',
            'price' => 1099.99,
        ]);
    }
}
