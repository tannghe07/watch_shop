<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index($id){
        $bill = Bill::where('id', $id)->first();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('warranty.warranty', array('bill' => $bill));
        return $pdf->stream();
    }
}
