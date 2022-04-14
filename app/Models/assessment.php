<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
	protected $fillable=['nama_ass','pertanyaan'];
	public $timestamps=false;
    use HasFactory;
}

