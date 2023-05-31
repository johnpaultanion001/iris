<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $file_path = resource_path('sql/agencies.sql');

      \DB::unprepared(
          file_get_contents($file_path)
      );
    }
}
