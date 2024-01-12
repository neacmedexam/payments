<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    //
    public function home(){
        $payments = Payments::count();
        $verified = Payments::whereNotNull('payment_verified')->count();
        $php = Payments::sum('amount_deposited_php');
        $usd = Payments::sum('amount_deposited_usd');


        $currentYear = date('Y');
        $dataPoints = DB::table('tbl_payments')
        ->select(DB::raw('COUNT(*) as count'),DB::raw('COUNT(payment_verified) as verified'), DB::raw('DATE_FORMAT(date_created, "%Y-%m") as month'))
        ->whereYear('date_created', $currentYear)
        ->groupBy('month')
        ->get();

      

        $month = $dataPoints->pluck('month')->map(function ($month) {
            return date('M Y', strtotime($month . '-01'));
        });

        $count = $dataPoints->pluck('count');
        $countverified = $dataPoints->pluck('verified');

        $data = [
            'labels' => $month,
            'datasets' => [
                [
                    'label' => 'Bar Dataset',
                    'type' => 'bar',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => $count,
                ],
                [
                    'type' => 'line',
                    'label' => 'Line Dataset',
                    'data' => $countverified,
                    'fill' => false,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ]
            ],
        ];
    
        $options = [
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'Chart.js Bar Chart',
                ],
                'legend' => [
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'beginAtZero' => true,
                        ],
                    ],
                ],
            ],
        ];
    
        // dd($month,$count);
        return view('dashboard.dashboard',[
            'payments' => $payments,
            'verified' => $verified,
            'php' => $php,
            'usd' => $usd,
        ],compact('data','options'));
    }
}
