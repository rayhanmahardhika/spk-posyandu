<?php

use Illuminate\Database\Seeder;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Usia', 'IMT', 'Kadar Gula', 'Kolesterol', 'Olah Raga', 'Makan Bergaram', 'Makan Buah dan Sayur', 'Jenis Kelamin', 'Stress', 'Tekanan Darah'];
        $type = [1, 1, 1,1,1,2,2,2,2,1];
        for($i=0;$i<10;$i++) {
            DB::table('variables')->insert([
                'id' => ($i+1),
                'name' => $name[$i],
                'type' => $type[$i],
            ]);
        }
    }
}
