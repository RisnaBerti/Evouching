<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'tb_permohonan';
    protected $primaryKey = 'id_permohonan';
    protected $fillable = [
        'id_permohonan',
        'id',
        'no_resi_ajuan',
        'tanggal_permohonan',
        'harga_satuan',
        'jumlah_satuan',
        'total_harga',
        'nominal_acc',
        'keterangan_permohonan',
        'terbilang',
        'status_permohonan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
