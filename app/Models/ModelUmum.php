<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelUmum extends Model
{
    use HasFactory;

    // menghitung jumlah data user
    public static function countuser()
    {
        $data = User::where('role_id', '2')->orWhere('role_id', '3')->orWhere('role_id', '4')->count();
        return $data;
    }

    public static function datapermohonandana()
    {
        $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);
        return $data;
    }

    public static function countDanaAccId()
    {
        $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
                ->where('status_permohonan', '3')->sum('nominal_acc');
        //         // ->where('id', Auth::user()->id)->first();
        return $data;
    }

    // menghitung jumlah data permohonan
    public static function countdanaacc()
    {
        $data = Permohonan::where('status_permohonan', '3')->sum('nominal_acc');
        return $data;
    }

    // menghitung jumlah data permohonan kas
    public static function countpermohonankas()
    {
        // $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->where('status_permohonan', '4')
        //     ->where('jenis_dana', 'Pembayaran Kas')->sum('nominal_acc');

        $data = Permohonan::where('status_permohonan', '3')
            ->where('jenis_dana', 'Pembayaran Kas')->sum('nominal_acc');
        return $data;
    }

    // menghitung jumlah data permohonan bank
    public static function countpermohonanbank()
    {
        // $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
        //     ->where('status_permohonan', '3')
        //     ->where('jenis_dana', 'Pembayaran Bank')->sum('nominal_acc');

        $data = Permohonan::where('status_permohonan', '3')
            ->where('jenis_dana', 'Pembayaran Bank')->sum('nominal_acc');
        return $data;
    }

    // get data permohonan dana sesuai id user
    public static function getPermohonanDana($id)
    {
        $data = Permohonan::where('id', $id)->get();
        return $data;
    }

    public static function detailpermohonan($id)
    {
        $data = DetailPermohonan::join('tb_permohonan', 'tb_permohonan.id_permohonan', '=', 'tb_detail_permohonan.id_permohonan')
            ->join('users', 'users.id', '=', 'tb_permohonan.id')
            ->where('tb_detail_permohonan.id_permohonan', $id)
            ->get(['tb_detail_permohonan.*', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.no_resi_ajuan', 'tb_permohonan.total_dana_ajuan', 'tb_permohonan.terbilang', 'tb_permohonan.status_permohonan', 'users.name']);
        return $data;
    }

    public static function getDataPengajuanCa()
    {
        $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_ca', 'tb_ca.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.id', Auth::user()->id)
            ->where('jenis_dana', 'Chartered Accountant')
            ->get(['users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.*']);
        return $data;
    }

    public static function dataactivity()
    {
        $data = Permohonan::all()->where('id', Auth::user()->id)
            //->where('tb_permohonan.id', Auth::user()->id)
            ->orderBy('tb_permohonan.tanggal_permohonan', 'desc')
            ->get(['tb_permohonan.*']);
        echo json_encode($data);
    }
}
