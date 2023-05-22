<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanKas extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tau
    protected $table = 'tb_penerimaan_kas';
    protected $primaryKey = 'id_penerimaan_kas';
    protected $fillable = [
        'id_penerimaan_kas',
        'id',
        'id_permohonan',
        'no_resi_terima_kas',
        'tanggal_penerimaan_bank',
        'bukti_transaksi',
        'status'
    ];
}
