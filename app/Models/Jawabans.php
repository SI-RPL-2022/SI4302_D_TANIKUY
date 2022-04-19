<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawabans extends Model
{
    protected $fillable=['id_assessments','deskripsi_jawaban','status','nilai'];
    protected $primaryKey = "id_jawaban";
	protected $table = "jawabans";	
    use HasFactory;
}
