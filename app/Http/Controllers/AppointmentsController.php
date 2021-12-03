<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentsController extends Controller
{
    public function GetAppointments()
    {
        $res = DB::select(DB::raw("with s as (select date                                                                               as time,
                  size,
                  json_build_object('id', a.id, 'company', company, 'contacts', contacts, 'ticketType', tt.name, 'countSI', count_si, 'accountNumbers', account_numbers) as object
           from schedules
                    join appointments a on schedules.id = a.time_id
                    join ticket_types tt on tt.id = a.ticket_type_id),
     w as (select s.time, s.size, json_agg(s.object) as appointments from s group by s.time, s.size order by s.time),
     x as (select w.time, w.size, w.appointments
           from w
           union all
           select schedules.date as time, schedules.size, '[]'::json
           from schedules
           where date not in (select w.time from w)
           group by schedules.date, schedules.size),
     y as (select Date(x.time) as date, json_agg((select i from (select x.time::time, x.size, x.appointments) as i)) as records
           from x
           group by date
           order by date)
select DATE(date_trunc('week', date))::text || '-' || DATE(date_trunc('week', date) + '6 days')::text as range,
       json_agg((select i from (select y.date, y.records) as i))                                      as dates
from y
group by range
order by range
"));

        return response()->json($res);
    }

    public function AddAppointments(Request $req)
    {
        $request = json_decode($req->body);
        $date = $request->date . " " . $request->time;

        $date_id = DB::table('schedules')->whereRaw("date = '$date'::timestamp")->pluck('id')->first();

        $flag = DB::select(
            DB::raw(
                "with c as (select count(a.id) from appointments a
                        where a.time_id = $date_id)
                        select c.count < s.size as flag from schedules s, c
                        where s.id = $date_id"));

        if ($flag[0]->flag) {
            $appointment = new Appointment();
            $appointment->time_id = $date_id;
            $appointment->company = $request->company;
            $appointment->contacts = json_encode($request->contacts);
            $appointment->ticket_type_id = $request->ticketType;
            $appointment->count_si = $request->countSI;
            $appointment->account_numbers = json_encode($request->accountNumbers);
            $appointment->updated_at = now();
            $appointment->created_at = now();
            return $appointment->save();
        } else {
            return response()->json([
                'message' => 'Appointments for this time is not available'], 409);
        }
    }

    public function DeleteAppointments(Request $request)
    {
        $id = $request->id;
        return DB::table('appointments')->delete($id);
    }

    public function GetTicketTypes()
    {
        return DB::table('ticket_types')->select('id', 'name')->get();
    }
}
