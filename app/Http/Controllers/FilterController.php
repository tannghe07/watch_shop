<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FilterController extends Controller
{
    public function filterByDate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $from_date = Carbon::createFromFormat('Y-m-d', $from_date)->format('Y/m/d');
        $to_date = Carbon::createFromFormat('Y-m-d', $to_date)->format('Y/m/d');
        $statistical = Statistical::whereBetween('date', [$from_date, $to_date])->orderBy('date', 'ASC')->get();
        foreach ($statistical as $item){
            $item->date = Carbon::createFromFormat('Y/m/d', $item->date)->format('Y-m-d');
            $chart_data[] = array(
                'period' => $item->date,
                'order' => $item->total_order,
                'sales' => $item->sales,
            );
        }
        echo json_encode($chart_data);
    }

    public function filter30Days(Request $request){
        $to_date = Carbon::now()->format('Y/m/d');
        $from_date = Carbon::now()->subMonth()->format('Y/m/d');
        $statistical = Statistical::whereBetween('date', [$from_date, $to_date])->orderBy('date', 'ASC')->get();
        foreach ($statistical as $item){
            $item->date = Carbon::createFromFormat('Y/m/d', $item->date)->format('Y-m-d');
            $chart_data[] = array(
                'period' => $item->date,
                'order' => $item->total_order,
                'sales' => $item->sales,
            );
        }
        echo json_encode($chart_data);
    }
}
