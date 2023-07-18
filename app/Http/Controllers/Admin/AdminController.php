<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\ModelUmum;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // $chart = new MonthlyUsersChart();

        $data = ModelUmum::datapermohonandana();
        $userCount = ModelUmum::countuser();
        $danaAccCount = ModelUmum::countdanaacc();
        $danakas = ModelUmum::countpermohonankas();
        $danabank = ModelUmum::countpermohonanbank();

        return view(
            'admin.dashboard-admin',
            [
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'data' => $data,
                'userCount' => $userCount,
                'danaAccCount' => $danaAccCount,
                'danakas' => $danakas,
                'danabank' => $danabank,
                // 'chart' => $this->chart(new MonthlyUsersChart)
            ]
        );
    }

    private function cart(MonthlyUsersChart $chart)
    {
        return ['chart' => $chart->build()];
    }


    public function getDataActivity()
    {
        $data = Permohonan::all();

        if ($data != null) {
            echo json_encode($data);
        } else {
            echo json_encode('#belum ada aktivitas');
        }
        // echo json_encode($data);
    }

    public $nominal_acc = 0;
    public $month;
    public function getChart()
    {
        // $data = Permohonan::select(DB::raw('count(*) as total, sum(nominal_acc) as nominal_acc'), DB::raw('MONTHNAME(created_at) as month'))
        //     ->where('status_permohonan', '3')
        //     ->groupBy('month')
        //     ->get('total', 'month', 'nominal_acc');

        // $data = Permohonan::all();
        // $nominal_acc = Permohonan::select(DB::raw('sum(*) as total, sum(nominal_acc) as nominal_acc'), DB::raw('MONTHNAME(created_at) as month'))
        //     ->where('status_permohonan', '3')
        //     ->groupBy('month')
        //     ->get('total', 'month', 'nominal_acc')->toArray();

        // //return response()->json($data);

        // $data = Permohonan::select(DB::raw('sum(nominal_acc) as total'))->get();

        // foreach($data as $mykey=>$myValue) {
        //     echo $myValue->total;
        // }

        // //return $data;

        $nominalacc = DB::table('tb_permohonan')
            ->selectRaw('MONTH(created_at) as month, SUM(nominal_acc) as total_amount')
            ->where('status_permohonan', '3')
            ->whereYear('created_at', now())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $this->month = $nominalacc->map(function ($nominalacc) {
            return date('F', mktime(0, 0, 0, $nominalacc->month, 1));
        });

        $this->nominal_acc = $nominalacc->pluck('total_amount');

        // $this->donation = $donations->pluck('total_amount')->map(function ($amount) {
        //     return number_format($amount, '0', '', '.');
        // });
        // dd($this->month);

        // $this->nominal_acc = $nominalacc;
        // dd($this->nominal_acc);
        $data = ModelUmum::datapermohonandana();
        $userCount = ModelUmum::countuser();
        $danaAccCount = ModelUmum::countdanaacc();
        $danakas = ModelUmum::countpermohonankas();
        $danabank = ModelUmum::countpermohonanbank();

        return view(
            'admin.dashboard-admin',
            [
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'data' => $data,
                'userCount' => $userCount,
                'danaAccCount' => $danaAccCount,
                'danakas' => $danakas,
                'danabank' => $danabank,
                // 'chart' => $this->chart(new MonthlyUsersChart)
                'nominalacc' => $this->nominal_acc,
                'month' => $this->month,
            ]
        );
    }
}
