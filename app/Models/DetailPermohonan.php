<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPermohonan extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tau
    protected $table = 'tb_detail_permohonan';
    protected $primaryKey = 'id_detail_permohonan';
    protected $fillable = [
        'id_detail_permohonan',
        'id_permohonan',
        'nama_barang',
        'qty',
        'harga_satuan',
        'total_harga_barang'
    ];

}
