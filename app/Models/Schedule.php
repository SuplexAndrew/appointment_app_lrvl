<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'id',
        'date',
        'size',
        'updated_at',
        'created_at'
    ];
    public $primaryKey = 'id';
    public $timestamps = false;
    use HasFactory;
}
