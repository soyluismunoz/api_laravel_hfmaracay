<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Area::class)->create([
        	'name' => 'Programación'
        ]);

        factory(Area::class)->create([
        	'name' => 'Emprendimiento'
        ]);

        factory(Area::class)->create([
        	'name' => 'Marketing'
        ]);

        factory(Area::class)->create([
        	'name' => 'Diseño'
        ]);
    }
}
