<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCourse extends Model
{
    use HasFactory;
    protected $table = "transaksi_course";
    protected $primaryKey = 'id_transaksi_course';
    protected $fillable = [    
    'id_course',
    'id_user',
    'status_pembayaran',
    'bukti_transfer'
    ];
}
