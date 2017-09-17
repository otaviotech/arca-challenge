<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'Auto',
        'Beauty and Fitness',
        'Food and Dining',
        'Health',
        'Sports',
        'Travel'
      ];

      foreach ($categories as $category) {
        DB::table('categories')->insert([
          'name' => $category
        ]);
      }

    }
}
