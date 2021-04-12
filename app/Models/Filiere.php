<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    public $timestamps = false;
    public $primaryKey = 'ID_FILIERE';
    use HasFactory;
}
