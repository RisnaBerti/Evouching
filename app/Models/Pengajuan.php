<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'user_id',
        'no_resi_pengajuan',
        'tanggal_pengajuan',
        'nama_perkiraan',
        'harga_satuan',
        'jumlah_satuan',
        'total_harga',
        'nominal_acc',
        'keterangan_pengajuan',
        'status_pengajuan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    

}
