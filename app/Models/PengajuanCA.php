<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCA extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tauuu
    protected $table = 'tb_ca';
    protected $primaryKey = 'id_ca';
    protected $fillable = [
        'id_ca',
        'id_permohonan',
        'no_resi_ca',
        'tanggal_penerimaan_ca',
        'bukti_transaksi'
    ];
}
