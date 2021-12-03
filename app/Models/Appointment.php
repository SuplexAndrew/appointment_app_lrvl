<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id',
        'date',
        'company',
        'contacts',
        'ticketType',
        'countSI',
        'accountNumber'
    ];
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}
