<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCa extends Model
{
    use HasFactory;

    public $incrementing = false; //ini penting sekali tau
    protected $table = 'detail_ca';
    protected $primaryKey = 'id_detail_ca';
    protected $fillable = [
        'id_detail_ca',
        'id_ca',
        'bukti_detail_ca',
        'nominal'
    ];
}
