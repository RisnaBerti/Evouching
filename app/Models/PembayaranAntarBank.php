<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranAntarBank extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'tb_pembayaran_antar_bank';
    protected $primaryKey = 'id_pembayaran_antar_bank';
    protected $fillable = [
        'id_pembayaran_antar_bank',
        'no_resi_pembayaran_antar_bank',
        'tanggal_pembayaran_antar_bank',
        'total_dana',
        'terbilang',
        'keperluan',
        'sisa_saldo',
        'bulan',
        'tahun'
    ];
}
