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
    protected $primaryKey = "id_keluhan";
    protected $fillable = ['id_user	', 'email', 'isi_keluhan'];

    protected $hidden;
}
