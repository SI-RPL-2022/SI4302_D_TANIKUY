<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeForum extends Model
{
    use HasFactory;
    protected $table = "like_forum";
    protected $primaryKey = "id_like_forum";
    protected $fillable = [
    'id_forum',
    'id_user'
    ];
}
