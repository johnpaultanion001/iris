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
      $reports = [
          [
              'user_id' => '1',
              'title' => 'Report Title',
              'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
              'file' => 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf',

              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
          ],
          [
            'user_id' => '1',
            'title' => 'Report Title',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'file' => 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf',

            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ],
        [
          'user_id' => '1',
          'title' => 'Report Title',
          'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
          'file' => 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf',

          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s"),
        ],
        [
            'user_id' => '1',
            'title' => 'Report Title',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'file' => 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf',

            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ],
        [
            'user_id' => '1',
            'title' => 'Report Title',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'file' => 'http://dti-internal.ap-southeast-1.elasticbeanstalk.com/test.pdf',

            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ],

      ];

      Report::insert($reports);
    }
}
