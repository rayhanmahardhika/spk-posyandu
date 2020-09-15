<?php

use Illuminate\Database\Seeder;

class RulesDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule_id = [1,2,3,4,5,6,6,7,7,8,8,9,9,9,10,10,10,11,11,11,12,13];
        $category_id = [19,2,4,8,14,15,13,15,9,9,13,3,5,7,1,11,18,1,3,10,23,25];
        for($i=0;$i<22;$i++) {
            DB::table('rules_detail')->insert([
                'id' => ($i+1),
                'rule_id' => $rule_id[$i],
                'category_id' => $category_id[$i],
            ]);
        }
    }
}
