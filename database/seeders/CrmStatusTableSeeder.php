<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2025-11-15 07:15:46',
                'updated_at' => '2025-11-15 07:15:46',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2025-11-15 07:15:46',
                'updated_at' => '2025-11-15 07:15:46',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2025-11-15 07:15:46',
                'updated_at' => '2025-11-15 07:15:46',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
