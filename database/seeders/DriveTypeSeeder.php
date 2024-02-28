<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $type = ['Front-wheel','Rear-wheel','4x4'];
    public function run(): void
    {
        foreach ($this->type as $type) {
           DB::table('drive_type')->insert([
               'name' => $type
           ]);
        }
    }
}
