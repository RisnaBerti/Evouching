<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranBank extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'tb_pembayaran_bank';
    protected $primaryKey = 'id_pembayaran_bank';
    protected $fillable = [
        'id_pembayaran_bank',
        'id_permohonan',
        'id',
        'no_resi_bayar_bank',
        'tanggal_pembayaran_bank',
        'bukti_transaksi'
    ];
}
