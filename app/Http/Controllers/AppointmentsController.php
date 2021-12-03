<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AppointmentsController extends Controller
{
    public function GetAppointments()
    {
        $appointments = DB::table('appointments')
            ->select(DB::raw('*, DATE(date), date :: time as time'))->get();
        $times = DB::table('appointments')
            ->select(DB::raw('date :: time as time'))->distinct()->get();
        $raw = array_map(function ($item){
            $obj = new \stdClass();
            $obj->art = $item;
            return $obj;
        }, (array)$times);
        return response()->json($raw);
    }

    public function AddAppointments(Request $request) {
        $appointment = new Appointment();
        $appointment->date = $request->date . "T" . $request->time;
        $appointment->company = $request->company;
        $appointment->contacts = $request->contacts;
        $appointment->ticketType = $request->ticketType;
        $appointment->countSI = $request->countSI;
        $appointment->accountNumber = $request->accountNumber;
        return $appointment->save();
    }

    public function DeleteAppointments(Request $request) {
        $id = $request->id;
        return DB::table('appointments')->where('id', '=', (integer)$id)->delete('*');
    }
}
