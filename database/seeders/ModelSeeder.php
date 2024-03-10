<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $models = ['Q8', 'A6', 'A3', '320d', 'M5','X5'];

    public function run(): void
    {
        foreach ($this->models as $model) {
            DB::table('models')->insert([
                'name' => $model,
            ]);
        }
    }
}
