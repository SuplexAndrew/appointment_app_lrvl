<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
    public function run()
    {
        $size = rand(30, 44);
        while ($size > 0) {
            \App\Models\Appointment::factory()->create();
            $size--;
        }
    }
}
