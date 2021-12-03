<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = [
        'id',
        'name',
        'updated_at',
        'created_at'
    ];
    public $primaryKey = 'id';
    use HasFactory;
}
