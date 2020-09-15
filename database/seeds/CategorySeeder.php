<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variable_id = [1,1,2,2,3,3,4,4,5,5,6,6,6,6,7,7,7,7,8,8,9,9,9,10,10];
        $name = ['Muda', 'Tua', 'Normal', 'Kegemukan', 'Normal', 'Tinggi', 'Normal', 'Tinggi', 'Jarang'
            , 'Sering', 'Jarang', 'Kadang', 'Sering', 'Selalu', 'Jarang', 'Kadang', 'Sering', 'Selalu'
            , 'Laki-laki', 'Perempuan', 'Jarang', 'Kadang', 'Sering', 'Normal', 'Tinggi'];
        for($i=0;$i<25;$i++) {
            DB::table('categories')->insert([
                'id' => ($i+1),
                'variable_id' => $variable_id[$i],
                'name' => $name[$i]
            ]);
        }
    }
}
