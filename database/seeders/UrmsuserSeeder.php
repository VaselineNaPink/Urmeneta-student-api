<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Urmsuser;

class UrmsuserSeeder extends Seeder
{
    public function run()
    {
        Urmsuser::factory()->count(10)->create();
    }
}
