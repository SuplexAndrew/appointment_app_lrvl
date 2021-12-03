<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddWeek extends Seeder
{
    public function run()
    {
        $a = new Schedule();
        $a->date = now();
        $a->updated_at = now();
        $a->created_at = now();
        $a->save();
        $dates =
            DB::select(
                DB::raw("with first as (select date_trunc('week', max(date) + '7 days') as date
                           from schedules)
                           select distinct (Date(a) || ' ' || b::time)::timestamp as dates
                           from generate_series(
                                    (select Date(first.date) from first),
                                    (select Date(first.date + '4 day') from first),
                                    '1 day'::interval) a,
                                generate_series((select first.date + '9 hours' from first),
                                (select first.date + '12 hours' from first), '15 minutes') b"));
        foreach ($dates as $day) {
            $s = new Schedule();
            $s->date = $day->dates;
            $s->updated_at = now();
            $s->created_at = now();
            $s->save();
        }
        $a->delete();
    }
}
