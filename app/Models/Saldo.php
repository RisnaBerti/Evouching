<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    
    public $incrementing = false; //ini penting sekali tau

    protected $table = 'tb_saldo';
    protected $primaryKey = 'id_saldo';
    protected $fillable = [
        'id_saldo',
        'id_pembayaran_antar_bank',
        'saldo_akhir',
        'bulan',
        'tahun'
    ];
}
