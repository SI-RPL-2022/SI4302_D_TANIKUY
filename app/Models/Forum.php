<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $table = "forum";
    protected $primaryKey = "id_forum";
    protected $fillable = [
    'id_user',
    'judul_forum',
    'isi_forum'
    ];
}
