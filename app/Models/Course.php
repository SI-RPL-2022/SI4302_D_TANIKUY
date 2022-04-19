<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "course";
    protected $primaryKey = "id_course";
    protected $fillable = [
    'nama_course',
    'harga_course',
    'perkiraan_course',
    'tgl_dibuat',
    ];
}
