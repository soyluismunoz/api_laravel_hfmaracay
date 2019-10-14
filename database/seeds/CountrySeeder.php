<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $path = base_path().'/database/sql/countries.sql';
    DB::unprepared(file_get_contents($path));
    $this->command->info('Countries table seeded!');
  }
}
