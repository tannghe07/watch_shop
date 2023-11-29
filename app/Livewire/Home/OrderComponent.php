<?php

namespace App\Livewire\Home;

use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        $bills = Bill::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $total = 0;
        foreach ($bills as $bill){
            $total += $bill->total_price;
        }
        return view('livewire.home.order-component', compact('bills', 'total'))->layout('layouts.home');
    }
}
