<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permohonan;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranKas;
use App\Models\PenerimaanKas;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KasController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf('P', 'mm', 'A4');
    }

    public function index()
    {
        return view('admin.penerimaan-kas', [
            'title' => 'Kas',
            'active' => 'Kas'
        ]);
    }

    public function pembayaran_kas()
    {
        return view('admin.pembayaran-kas', [
            'title' => 'Pembayaran Kas',
            'active' => 'Pembayaran Kas'
        ]);
    }

    public function getmax()
    {
        $maxValue = PenerimaanKas::max('no_resi_terima_kas');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    public function get_penerimaan_kas()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_penerimaan_kas', 'tb_penerimaan_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Penerimaan Kas')
            ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_penerimaan_kas.bukti_transaksi']);

        return $data;
    }

    function ubah_penerimaan_kas(Request $request)
    { 
        PenerimaanKas::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_transaksi' => $request->bukti_transaksi, 
                'no_resi_terima_kas' => $request->no_resi_terima_kas, 
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas]);

        return response()->json(['message' => 'success']);
    }

    //fungsi edit penerimaan kas
    public function edit_penerimaan_kas(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_kas' => $request->no_resi_terima_kas,  'id_permohonan' => $request->id_permohonan, 'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas]);
    }

    public function get_penerimaan_kas_id(Request $request)
    {
        $data = PenerimaanKas::where('id_permohonan', $request->id_permohonan)->first();
        return response()->json($data);
    }

    public function ubah_penerimaan_kas_id(Request $request)
    {
        PenerimaanKas::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_transaksi' => $request->bukti_transaksi_edit, 
                'no_resi_terima_kas' => $request->no_resi_terima_kas_edit, 
                'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas_edit]);

        return response()->json(['message' => 'success']);
    }

    public function edit_penerimaan_kas_id(Request $request)
    {
        $request->validate([
            'file_edit' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $ip = $request->id_permohonan_edit;

        $fileName = $ip . '.' . $request->file_edit->extension();
        $request->file_edit->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_terima_kas' => $request->no_resi_terima_kas_edit,  'id_permohonan' => $request->id_permohonan_edit, 'tanggal_penerimaan_kas' => $request->tanggal_penerimaan_kas_edit]);
    }
















    // ---------------------------------------------------------------------------------------------

    public function getmax2()
    {

        $maxValue = PembayaranKas::max('no_resi_bayar_kas');

        if ($maxValue == null) {
            $maxValue = 0;
        }
        return response()->json($maxValue);
    }

    //fungsi get data pembayaran kas
    public function get_pembayaran_kas()
    {
        $data['data'] = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->join('tb_pembayaran_kas', 'tb_pembayaran_kas.id_permohonan', '=', 'tb_permohonan.id_permohonan')
            ->where('tb_permohonan.jenis_dana', '=', 'Pembayaran Kas')
            ->get(['users.id', 'users.name', 'users.jabatan', 'users.divisi', 'tb_permohonan.id_permohonan', 'tb_permohonan.nominal_acc', 'tb_permohonan.keterangan_permohonan', 'tb_pembayaran_kas.bukti_transaksi']);

        return response()->json($data);
    }

    //fungsi edit pembayaran kas
    public function edit_pembayaran_kas(Request $request)
    {

        $request->validate([

            'file' => 'required|mimes:jpg,jpeg,png|max:5048',

        ]);

        $ip = $request->id_permohonan;

        $fileName = $ip . '.' . $request->file->extension();
        $request->file->move(public_path('bukti'), $fileName);

        return response()->json(['message' => 'Operation Successful !', 'filename' => $fileName, 'no_resi_bayar_kas' => $request->no_resi_bayar_kas,  'id_permohonan' => $request->id_permohonan]);

        // return Redirect::back()->with('message', 'Operation Successful !');
    }

    function ubah_pembayaran_kas(Request $request)
    { 
        PembayaranKas::where('id_permohonan', $request->id_permohonan)
        ->update(['bukti_transaksi' => $request->bukti_transaksi, 
                'no_resi_bayar_kas' => $request->no_resi_bayar_kas, 
                'tanggal_pembayaran_kas' => $request->tanggal_pembayaran_kas]);

        return response()->json(['message' => 'Operation Successful !']);
    }













    // Get data from the text file
    function getDataFrmFile($file)
    {
        // Read file lines
        $lines = file($file);

        // Get a array for returning output data
        $data = array();

        // Read each line and separate the semicolons
        foreach ($lines as $line)
            $data[] = explode(';', chop($line));
        return $data;
    }

    // Simple table
    function getSimpleTable($header, $data)
    {

        // Header
        foreach ($header as $column)
            $this->fpdf->Cell(40, 7, $column, 1);
        $this->fpdf->Ln(); // Set current position

        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->fpdf->Cell(40, 6, $col, 1);
            $this->fpdf->Ln(); // Set current position
        }
    }

    // Get styled table
    function getStyledTable($header, $data)
    {

        // Colors, line width and bold font
        $this->fpdf->SetFillColor(255, 0, 0);
        $this->fpdf->SetTextColor(255);
        $this->fpdf->SetDrawColor(128, 0, 0);
        $this->fpdf->SetLineWidth(.3);
        $this->fpdf->SetFont('', 'B');

        // Header
        $colWidth = array(40, 35, 40, 45);
        for ($i = 0; $i < count($header); $i++)
            $this->fpdf->Cell(
                $colWidth[$i],
                7,
                $header[$i],
                1,
                0,
                'C',
                1
            );
        $this->fpdf->Ln();

        // Setting text color and color fill
        // for the background
        $this->fpdf->SetFillColor(224, 235, 255);
        $this->fpdf->SetTextColor(0);
        $this->fpdf->SetFont('');

        // Data
        $fill = 0;
        foreach ($data as $row) {

            // Prints a cell, first 2 columns  are left aligned
            $this->fpdf->Cell($colWidth[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->fpdf->Cell($colWidth[1], 6, $row[1], 'LR', 0, 'L', $fill);

            // Prints a cell,last 2 columns  are right aligned
            $this->fpdf->Cell(
                $colWidth[2],
                6,
                number_format($row[2]),
                'LR',
                0,
                'R',
                $fill
            );
            $this->fpdf->Cell(
                $colWidth[3],
                6,
                number_format($row[3]),
                'LR',
                0,
                'R',
                $fill
            );
            $this->fpdf->Ln();
            $fill = !$fill;
        }
        $this->fpdf->Cell(array_sum($colWidth), 0, '', 'T');
    }

    public function laporan()
    {
        // Instantiate a PDF object

        // Column titles given by the programmer
        $header = array('Name', 'City', 'Age', 'Salary(In thousands)');

        // Get data from the text files
        //$data = $$this->fpdf->getDataFrmFile('employees.txt')

        $data = Permohonan::join('users', 'users.id', '=', 'tb_permohonan.id')
            ->get(['tb_permohonan.no_resi_ajuan', 'tb_permohonan.tanggal_permohonan', 'tb_permohonan.harga_satuan', 'tb_permohonan.jumlah_satuan']);

        // Set the font as required
        $this->fpdf->SetFont('Arial', '', 14);

        // Add a new page
        $this->fpdf->AddPage();
        $this->getSimpleTable($header, $data);
        $this->fpdf->AddPage();
        $this->getStyledTable($header, $data);
        $this->fpdf->Output();

        exit;
    }
}
