<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBank extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tau
    protected $table = 'tb_penerimaan_bank';
    protected $primaryKey = 'id_penerimaan_bank';
    protected $fillable = [
        'id_penerimaan_bank',
        'id_permohonan',
        'id',
        'no_resi_terima_bank',
        'tanggal_pembayaran_kas',
        'bukti_transaksi',
        'status'
    ];
}
