<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
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

      $file_path = resource_path('sql/tickets.sql');

      \DB::unprepared(
          file_get_contents($file_path)
      );

      $file_path = resource_path('sql/ticket_assign_agencies.sql');

      \DB::unprepared(
          file_get_contents($file_path)
      );

      $file_path = resource_path('sql/violations.sql');

      \DB::unprepared(
          file_get_contents($file_path)
      );

      $file_path = resource_path('sql/iris.sql');

      \DB::unprepared(
          file_get_contents($file_path)
      );
    }
}
