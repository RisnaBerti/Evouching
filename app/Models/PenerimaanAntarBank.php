<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanAntarBank extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'tb_penerimaan_antar_bank';
    protected $primaryKey = 'id_penerimaan_antar_bank';
    protected $fillable = [
        'id_penerimaan_antar_bank',
        'no_resi_penerimaan_antar_bank',
        'tanggal_penerimaan_antar_bank',
        'total_dana',
        'terbilang',
        'keperluan'
    ];
}
