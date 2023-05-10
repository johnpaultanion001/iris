<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $agencies = [
            [
                'id' => '1',
                'title' => 'Department of Trade and industry (DTI)',
                'code'  => 'DTI',
                'logo' => 'dti.png',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'id' => '2',
              'title' => 'Department of Agriculture (DA)',
              'code'  => 'DA',
              'logo' => 'da.png',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'id' => '3',
              'title' => 'Department of Health (DOH)',
              'code'  => 'DOH',
              'logo' => 'doh.png',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'id' => '4',
              'title' => 'Department of Environment and Natural Resources (DENR)',
              'code'  => 'DENR',
              'logo' => 'denr.png',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'id' => '5',
              'title' => 'Banko Sentral ng Pilipinas (BSP)',
              'code'  => 'BSP',
              'logo' => 'bsp.png',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'id' => '6',
              'title' => 'Philippine National Police (PNP)',
              'code'  => 'PNP',
              'logo' => 'pnp.png',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
            ],
      ];

      Agency::insert($agencies);
    }
}
