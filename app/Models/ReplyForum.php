<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyForum extends Model
{
    use HasFactory;
    protected $table = "reply_forum";
    protected $primaryKey = "id_reply_forum";
    protected $fillable = [
    'id_user',
    'id_forum',
    'isi_reply_forum'
    ];
}
