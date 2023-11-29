<?php

namespace App\Livewire\Home;

use App\Models\Bill;
use Livewire\Component;

class OrderDetailComponent extends Component
{
    public $bill_id;

    public function mount($id){
        $this->bill_id = $id;
    }

    public function render()
    {
        $bill = Bill::where('id', $this->bill_id)->first();
        $billdetails = $bill->billdetail()->get();
        return view('livewire.home.order-detail-component', compact('billdetails', 'bill'))->layout('layouts.home');
    }
}
