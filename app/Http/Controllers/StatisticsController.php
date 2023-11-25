<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\Details;
use App\Models\Car;
use App\Models\Category;
use App\Models\Order;
use App\Models\Client;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    
    public function statistics()
    {
        $date = Carbon::now()->subDays(7);
        $date_month = Carbon::now()->subDays(30);
        $date_kvartal = Carbon::now()->subDays(90);

        $price_week=0;
        $price_month=0;
        $price_kvartal=0;
        
        $statistics = Order::where('user_id', '=', Auth::user()->id)->where('created_at', '>=', $date)->get();
        $count_order_week = $statistics->count();

        $statistics_month = Order::where('user_id', '=', Auth::user()->id)->where('created_at', '>=', $date_month)->get();
        $count_order_month = $statistics_month->count();

        $statistics_kvartal = Order::where('user_id', '=', Auth::user()->id)->where('created_at', '>=', $date_kvartal)->get();
        $count_order_kvartal = $statistics_kvartal->count();

        $price_week=$statistics->sum('price');
        $price_month=$statistics_month->sum('price');
        $price_kvartal=$statistics_kvartal->sum('price');



        return view('statistics.statistics', compact('count_order_week', 'count_order_month', 'count_order_kvartal', 'price_week', 'price_month', 'price_kvartal'));
    }
}
