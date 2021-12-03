<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id',
        'time_id',
        'company',
        'contacts',
        'ticket_type_id',
        'count_si',
        'account_numbers',
        'updated_at',
        'created_at'
    ];
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}
