<?php

namespace Database\Seeders;

use App\Models\Permohonan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permohonan::create([
        //     'id_permohonan' => '1',
        // 'id' => '21156f0a08fa453ca73ac220a2827d44',
        // 'no_resi_ajuan' => '1',
        // 'tanggal_permohonan' => '2021-09-01',
        // 'harga_satuan' => '100000',
        // 'jumlah_satuan' => '1',
        // 'total_dana_ajuan' => '100000',
        // 'nominal_acc'   => '00000',
        // 'keterangan_permohonan' => 'Pembelian ATK',
        // 'terbilang' => 'Seratus Ribu Rupiah',
        // 'jenis_dana' => '0',
        // 'status_permohonan' => '0',
        // 'ttd_pemohon' => '0',
        // 'ttd_pemeriksa' => '0',
        // 'ttd_manajer' => '0',
        // 'ttd_bendahara' => '0',
        // ]);

        Permohonan::create([
            'id_permohonan' => '2',
            'id' => '21156f0a08fa453ca73ac220a2827d44',
            'no_resi_ajuan' => '2',
            'tanggal_permohonan' => '2021-09-01',
            'harga_satuan' => '100000',
            'jumlah_satuan' => '1',
            'total_dana_ajuan' => '100000',
            'nominal_acc'   => '00000',
            'keterangan_permohonan' => 'Pembelian ATK',
            'terbilang' => 'Seratus Ribu Rupiah',
            'jenis_dana' => '0',
            'status_permohonan' => '0',
            'ttd_pemohon' => '0',
            'ttd_pemeriksa' => '0',
            'ttd_manajer' => '0',
            'ttd_bendahara' => '0',
        ]);

        Permohonan::create([
            'id_permohonan' => '3',
            'id' => '21156f0a08fa453ca73ac220a2827d44',
            'no_resi_ajuan' => '3',
            'tanggal_permohonan' => '2021-09-01',
            'harga_satuan' => '100000',
            'jumlah_satuan' => '1',
            'total_dana_ajuan' => '100000',
            'nominal_acc'   => '00000',
            'keterangan_permohonan' => 'Pembelian ATK',
            'terbilang' => 'Seratus Ribu Rupiah',
            'jenis_dana' => '0',
            'status_permohonan' => '0',
            'ttd_pemohon' => '0',
            'ttd_pemeriksa' => '0',
            'ttd_manajer' => '0',
            'ttd_bendahara' => '0',
        ]);

        Permohonan::create([
            'id_permohonan' => '4',
            'id' => '3',
            'no_resi_ajuan' => '4',
            'tanggal_permohonan' => '2021-09-01',
            'harga_satuan' => '100000',
            'jumlah_satuan' => '1',
            'total_dana_ajuan' => '100000',
            'nominal_acc'   => '00000',
            'keterangan_permohonan' => 'Pembelian ATK',
            'terbilang' => 'Seratus Ribu Rupiah',
            'jenis_dana' => '0',
            'status_permohonan' => '0',
            'ttd_pemohon' => '0',
            'ttd_pemeriksa' => '0',
            'ttd_manajer' => '0',
            'ttd_bendahara' => '0',
        ]);

        Permohonan::create([
            'id_permohonan' => '5',
            'id' => '3',
            'no_resi_ajuan' => '5',
            'tanggal_permohonan' => '2021-09-01',
            'harga_satuan' => '100000',
            'jumlah_satuan' => '1',
            'total_dana_ajuan' => '100000',
            'nominal_acc'   => '00000',
            'keterangan_permohonan' => 'Pembelian ATK',
            'terbilang' => 'Seratus Ribu Rupiah',
            'jenis_dana' => '0',
            'status_permohonan' => '0',
            'ttd_pemohon' => '0',
            'ttd_pemeriksa' => '0',
            'ttd_manajer' => '0',
            'ttd_bendahara' => '0',
        ]);
    }
}
