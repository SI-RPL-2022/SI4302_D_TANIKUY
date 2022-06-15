<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $primaryKey = "id_blog";
    protected $fillable = [
    'id_user',
    'judul_blog',
    'cover',
    'kategori',
    'slug',
    'isi_blog'
    ];
}
