<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AddTicketTypes::class,
            AddWeek::class,
            AppointmentsSeeder::class,
        ]);
    }
}
