<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $table = 'tb_penerimaan';
    protected $primaryKey = 'id_penerimaan';
    public $incrementing = false;

    protected $fillable = [
        'id_penerimaan',
        'no_resi_terima_bank',
        'tanggal_penerimaan_bank',
        'bukti_transaksi_bank',
        'no_resi_terima_kas',
        'tanggal_penerimaan_kas',
        'bukti_transaksi_kas',
        'id_permohonan'
    ];
}
