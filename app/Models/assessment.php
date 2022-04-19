<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
	protected $fillable=['nama_ass','pertanyaan'];
	protected $primaryKey = 'id_assessments';
	public $timestamps=false;
    use HasFactory;
}	

