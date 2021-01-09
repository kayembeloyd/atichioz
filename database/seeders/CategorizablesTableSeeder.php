<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorizablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorizable = [
            'App\Models\Organization',
            'App\Models\Job'
        ];

        for ($i = 0; $i < 600; $i++) {
            $catble_type = Arr::random($categorizable);
            $r1 = mt_rand(1, 50);
            $r2 = mt_rand(1, 30);

            if ($catble_type === 'App\Models\Organization'){
                $r1 = mt_rand(1, 25);
            } else {
                $r1 = mt_rand(1, 100);
            }

            
            if (DB::table('categorizables')->where('category_id', $r1)->where('categorizable_id', $r2)->first()){
                if (DB::table('categorizables')->where('category_id', $r1)->where('categorizable_id', $r2)->first()->category_id . 
                DB::table('categorizables')->where('category_id', $r1)->where('categorizable_id', $r2)->first()->categorizable_id === "$r1" . "$r2"){
                    // It already exist
                    $i--;
                } else {        
                    DB::table('categorizables')->insert([
                        'categorizable_id' => $r1,
                        'category_id' => $r2,
                        'categorizable_type' => Arr::random($categorizable),
                    ]);
                }
            } else {
                
                DB::table('categorizables')->insert([
                    'categorizable_id' => $r1,
                    'category_id' => $r2,
                    'categorizable_type' => $catble_type,
                ]);
            }
        }
        //
    }
}
