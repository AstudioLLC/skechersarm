<?php

namespace App\Http\Livewire\Admin;

use App\Models\FastOrder;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardComponent extends Component
{


    public function render()
    {
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'labels' => 'white',
            'filter_field' => 'created_at',

//            'filter_days' => 30, // show only last 30 days
        ];

        $chart = new LaravelChart($chart_options);
        $ordersCount = Order::whereSeen(false)->count();
        $fastOrdersCount = FastOrder::whereSeen(false)->count();
        $month_users_count = User::where('created_at',  '>=', new \DateTime('-1 months'))->count();

        return view('livewire.admin.dashboard-component',compact('chart','ordersCount','fastOrdersCount','month_users_count'))->extends('layouts.admin');
    }
}
