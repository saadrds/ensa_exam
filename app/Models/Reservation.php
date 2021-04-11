<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $primaryKey = 'ID_RESERV';
    public $timestamps = false;
    use HasFactory;
}
