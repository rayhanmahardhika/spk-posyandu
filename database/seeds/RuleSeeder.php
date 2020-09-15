<?php

use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['R1', 'R2', 'R3','R4','R5','R6','R7','R8','R9', 'R10', 'R11', 'R12', 'R13'];
        $then = ['TINGGI', 'TINGGI', 'TINGGI','TINGGI','TINGGI','TINGGI','TINGGI','TINGGI','RENDAH', 'RENDAH', 'RENDAH', 'TINGGI', 'TINGGI'];
        for($i=0;$i<13;$i++) {
            DB::table('rules')->insert([
                'id' => ($i+1),
                'name' => $name[$i],
                'result_category' => $then[$i],
            ]);
        }
    }
}
