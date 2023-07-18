<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;

    protected $fillable = [
        'id_pembayaran',
        'id_permohonan',
        'no_resi_bayar_kas',
        'tanggal_pembayaran_kas',
        'bukti_pembayaran_kas',
        'no_resi_bayar_bank',
        'tanggal_pembayaran_bank',
        'bukti_pembayaran_bank'
    ];
}
