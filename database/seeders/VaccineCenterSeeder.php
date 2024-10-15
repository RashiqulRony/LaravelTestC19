<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dhaka',
                'location' => 'Dhamrai Krishnonogor 20 bed hospita',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Kamrangirchar 31 bed hospital',
                'daily_limit' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Kamrangirchar 31 bed hospital',
                'daily_limit' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Aminbazar 20 bed hospital',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Zinzira 20 bed hospital',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Zinzira 20 bed hospital',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dhaka',
                'location' => 'Sazeda foundation, keranigonj',
                'daily_limit' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gazipur',
                'location' => 'Ma Oh ShishukollanKendro, Meghdubi',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tangail',
                'location' => 'Zillahospital,traumacentre',
                'daily_limit' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rangpur',
                'location' => 'Shishu hospital',
                'daily_limit' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rangpur',
                'location' => 'Chest Hospital, Tajhat',
                'daily_limit' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gaibandha',
                'location' => 'Ansar VDP training centre',
                'daily_limit' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        VaccineCenter::insert($data);
    }
}
