<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $path = 'database/sql/countries.sql';
    DB::unprepared(file_get_contents($path));
    $this->command->info('Countries table seeded!');
  }
}
