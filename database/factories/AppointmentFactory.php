<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AppointmentFactory extends Factory
{

    public function definition()
    {
        $ticketTypes = DB::table('ticket_types')->pluck('id')->toArray();
        $freeScheduleTimes = DB::table('schedules')
            ->whereNotIn('schedules.id',
                DB::table('appointments')
                    ->select('time_id')
                    ->join('schedules', 'schedules.id', '=', 'appointments.time_id')
                    ->groupBy('time_id', 'schedules.size')
                    ->havingRaw('count(appointments.company) >= schedules.size')
            )
            ->pluck('id')
            ->toArray();
        return [
            'time_id' => $this->faker->randomElement($freeScheduleTimes),
            'company' => $this->faker->name,
            'contacts' => json_encode(array($this->faker->email, $this->faker->randomKey([000000000, 999999999]))) ,
            'ticket_type_id' => $this->faker->randomElement($ticketTypes),
            'count_si' => $this->faker->randomKey([10, 1000]),
            'account_numbers' => json_encode(array($this->faker->randomKey([100, 10000]), $this->faker->randomKey([10, 1000]))),
            'created_at' => $this->faker->dateTime($max = 'now'),
            'updated_at' => $this->faker->dateTime($max = 'now'),
        ];
    }
}
