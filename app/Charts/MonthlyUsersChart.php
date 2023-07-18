<?php

namespace App\Charts;

use App\Models\Permohonan;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // $data = Permohonan::select(DB::raw('count(*) as total, sum(nominal_acc) as nominal_acc'), DB::raw('MONTHNAME(created_at) as month'))
        //     ->where('status_permohonan', '3')
        //     ->groupBy('month')
        //     ->get('total', 'month', 'nominal_acc');

        // return $this->chart->lineChart()
        // ->setTitle('Monthly Users')
        // ->addLine('Jan', [$this->getval(1),$this->getval(2),$this->getval(3)])
        // ->addLine('Feb', [$this->getval(2)])
        // ->addLine('Mar', [$this->getval(3)])
        // ->addLine('APr', [$this->getval(4)])
        // ->addLine('May', [$this->getval(5)])
        // ->addLine('Jun', [$this->getval(6)])
        // ->addLine('Jul', [$this->getval(7)])
        // ->addLine('Aug', [$this->getval(8)])
        // ->addLine('Sep', [$this->getval(9)])
        // ->addLine('Oct', [$this->getval(10)])
        // ->addLine('Nov', [$this->getval(11)])
        // ->addLine('Des', [$this->getval(12)])
        // ->setXAxis(['Transaksi', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'])
        // ->setColors(['#ffc63b', '#ff6384']);

        // return $this->chart->lineChart()
        //     ->setTitle('Monthly Users')
        //     ->addLine('Jan', [$this->getval(1), $this->getval(2), $this->getval(3)])
        //     ->addLine('Feb', [$this->getval(2)])
        //     ->addLine('Mar', [$this->getval(3)])
        //     ->addLine('APr', [$this->getval(4)])
        //     ->addLine('May', [$this->getval(5)])
        //     ->addLine('Jun', [$this->getval(6)])
        //     ->addLine('Jul', [$this->getval(7)])
        //     ->addLine('Aug', [$this->getval(8)])
        //     ->addLine('Sep', [$this->getval(9)])
        //     ->addLine('Oct', [$this->getval(10)])
        //     ->addLine('Nov', [$this->getval(11)])
        //     ->addLine('Des', [$this->getval(12)])
        //     ->setXAxis(['Transaksi', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'])
        //     ->setColors(['#ffc63b', '#ff6384']);

        return $this->chart->horizontalBarChart()
            ->setTitle('Los Angeles vs Miami.')
            ->setSubtitle('Wins during season 2021.')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Transaksi', [$this->getval(1),$this->getval(2), $this->getval(3), $this->getval(4), $this->getval(5), $this->getval(6)])
            //->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);


        // $chartData = Permohonan::select(DB::raw('sum(nominal_acc) as total'), DB::raw('MONTHNAME(created_at) as month'))
        //     ->where('status_permohonan', '3')
        //     ->groupBy('month')
        //     ->get()
        //     ->toArray();

        // return $this->chart->lineChart()
        //     ->setTitle('Monthly Users')
        //     ->addLine('Transaksi', $chartData);
    }

    private function getval($bulan)
    {
        // $data = Permohonan::select(DB::raw('count(*) as total, sum(nominal_acc) as nominal_acc'), DB::raw('MONTHNAME(created_at) as month'))
        //     ->where('status_permohonan', '3')
        //     ->groupBy('month')
        //     ->get('total', 'month', 'nominal_acc')->toArray();
        // return $data;

        $data = Permohonan::select(DB::raw('sum(nominal_acc) as total'))
            ->where('status_permohonan', '3')
            ->whereMonth('created_at', $bulan)
            ->get();

        foreach ($data as $mykey => $myValue) {
            return $myValue->total;
        }
    }
}
