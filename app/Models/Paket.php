<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = "paket";
    protected $primaryKey = 'id_paket';
    protected $fillable = [
    'nama_paket',
    'id_course',   
    'harga_paket'    
    ];

    public function setCatAttribute($value)
    {
        $this->attributes['id_course'] = json_encode($value);
    }

    public function getCatAttribute($value)
    {
        return $this->attributes['id_course'] = json_decode($value);
    }
}

