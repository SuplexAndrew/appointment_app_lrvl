<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTicketTypes extends Seeder
{
    public function run()
    {
        if (DB::table('ticket_types')->count() === 0) {
            $titles = array('Жалоба', 'Ругательство', 'Мордобой');
            foreach ($titles as $title) {
                $ticket = new TicketType();
                $ticket->name = $title;
                $ticket->save();
            }
        }
    }
}
