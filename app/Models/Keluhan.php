<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use app\Http\Controllers\KeluhanController;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = "keluhan";
    protected $fillable = ['nama', 'email', 'keluhan'];

    protected $hidden;
}
