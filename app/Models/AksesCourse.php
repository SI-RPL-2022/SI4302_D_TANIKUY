<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesCourse extends Model
{
    use HasFactory;
    protected $table = "akses_course";
    protected $primaryKey = 'id_akses_course';
    protected $fillable = [        
    'id_user',
    'id_course'    
    ];
    public $timestamps=false;
}
