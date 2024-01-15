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

        //chart
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
                    'label' => 'Payments',
                    'type' => 'bar',
                    'backgroundColor' => 'rgba(1,89,157,0.8)',
                    'borderColor' => 'rgba(1,89,157,0.8)',
                    'borderWidth' => 1,
                    'data' => $count,
                ],
                [
                    'type' => 'line',
                    'label' => 'Verified',
                    'data' => $countverified,
                    'fill' => true,
                    'backgroundColor' => 'rgba(1,60,106,0.7)',
                    'borderColor' => 'rgb(1,60,106)',
                    'borderWidth' => 1
                ]
            ],
        ];
    
        $options = [
            'plugins' => [
                'title' => [
                    'display' => true,
                    'text' => 'FB Payments Chart',
                    'font'=> [
                        'size'=>'20',
                        'family' => 'Quicksand',
                    ]
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
        //end chart

        //employees
        $employees = Payments::select('verified_by',DB::raw('count(verified_by) as count'))
        ->whereNotNull('verified_by')
        ->groupBy('verified_by')
        ->orderBy(DB::raw('count(verified_by)'),'desc')
        ->get();

        //mode of payment
        $mode_of_payment = Payments::select('mode_of_payment',DB::raw('count(mode_of_payment) as count'))
        ->groupBy('mode_of_payment')
        ->orderBy(DB::raw('count(mode_of_payment)'),'desc')
        ->get();


        // dd($month,$count);
        return view('dashboard.dashboard',[
            'payments' => $payments,
            'verified' => $verified,
            'php' => $php,
            'usd' => $usd,
            'employees' => $employees,
            'mode_of_payment' => $mode_of_payment,
        ],compact('data','options'));
    }
}
