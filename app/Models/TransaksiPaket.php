<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPaket extends Model
{
    use HasFactory;
    protected $table = "transaksi_paket";
    protected $primaryKey = 'id_transaksi_paket';
    protected $fillable = [    
    'id_paket',
    'id_user',
    'status_pembayaran',
    'bukti_transfer'
    ];
}
