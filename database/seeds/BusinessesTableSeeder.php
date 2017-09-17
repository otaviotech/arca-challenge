<?php

use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = factory(App\Business::class, 20)->create();
        foreach ($a as $b) {
          $arr = [];
          for ($i=0; $i < 20; $i++) {
            $rand = rand(1,6);

            if(!in_array($rand, $arr)){
              $arr[] = $rand;
              $b->categories()->save(App\Category::find($rand));
              $b->save();
            }

          }
        }
    }
}
