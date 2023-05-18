<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranKas extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tau
    protected $table = 'tb_pembayaran_kas';
    protected $primaryKey = 'id_pembayaran_kas';
    protected $fillable = [
        'id_pembayaran_kas',
        'id',
        'id_permohonan',
        'no_resi_bayar_kas',
        'tanggal_pembayaran_kas',
        'bukti_transaksi',
        'status'
    ];
}
