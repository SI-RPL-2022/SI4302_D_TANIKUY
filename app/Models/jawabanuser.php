<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawabanuser extends Model
{
	protected $fillable=['assessments_id','soal','jawaban','nilai'];
	protected $table = "jawabans";
	public $timestamps=false;
    use HasFactory;
}	

