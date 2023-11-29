<?php

namespace App\Livewire\Admin\Order;

use App\Models\Bill;
use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        $bills = Bill::orderBy('id', 'DESC')->get();
        $total = 0;
        foreach ($bills as $bill) {
            $total += $bill->total_price;
        }
        return view('livewire.admin.order.order-component', compact('bills', 'total'))->layout('layouts.admin');
    }
}
