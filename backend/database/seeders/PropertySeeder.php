<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'name' => 'サンプル物件A',
                'address' => '東京都新宿区1-1-1',
                'latitude' => 35.6895,
                'longitude' => 139.6917,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'サンプル物件B',
                'address' => '大阪市北区2-2-2',
                'latitude' => 34.7055,
                'longitude' => 135.4983,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 必要に応じて追加
        ]);
    }
}
