<?php

namespace App\Livewire\Home;

use App\Mail\OrderMail;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\Statistical;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $username;
    public $email;
    public $address;
    public $payment;
    public $shipment;
    public $phonenumber;
    public $shipPrice;

    public function mount(){
        if(Auth::check()){
            $this->username = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
        else{
            $this->username = '';
            $this->email = '';
        }

    }

    public function render()
    {
        $payments = Payment::all();
        $shipments = Shipment::all();
        $cart = '';
        $total = '';
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            $total = 0;
            foreach ($cart as $item){
                $total += $item->total_price;
            }
        }
        return view('livewire.home.checkout-component', compact('total', 'payments', 'shipments'))->layout('layouts.home');
    }

    public function shipPriceChange(){
        if($this->shipment){
            $this->shipPrice = Shipment::where('id', $this->shipment)->first()->price;
        }
    }

    public function saveOrder(){
        $validated = $this -> validate([
            'username'=>'required|max:255',
            'address'=>'required|max:255',
            'phonenumber'=>'required|max:255',
            'email'=>'required|max:255',
            'payment'=>'required',
            'shipment'=>'required',
        ]);
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        if(sizeof($cart)>0){
            $total = 0;
            foreach ($cart as $item){
                $total += $item->total_price;
            }
            $total_price = $total + $this->shipPrice;
            $bill = Bill::create([
                'user_id' => Auth::user()->id,
                'payment_id' => $this->payment,
                'shipment_id' => $this->shipment,
                'total_price' => $total_price,
                'phone' => $this->phonenumber,
                'address' => $this->address,
            ]);
            foreach ($cart as $item){
                $billdetail = BillDetail::create([
                    'quantity' => $item->quantity,
                    'price' => $item->total_price,
                    'bill_id' => $bill->id,
                    'product_id' => $item->product_id,
                ]);
            }
            $newDate = Carbon::now()->format('Y/m/d');
            $statistic = Statistical::where('date', $newDate)->first();
            if($statistic){
                $sales = $statistic->sales + $bill->total_price;
                $total_order = $statistic->total_order + 1;
                $item  = [
                  'sales' => $sales,
                  'total_order' => $total_order,
                ];
                $statistic->update($item);
            }
            else{
                $date = $newDate;
                $sales = $bill->total_price;
                $total_order = 1;
                $item = [
                    'date' => $date,
                    'sales' => $sales,
                    'total_order' => $total_order,
                ];
                Statistical::create($item);
            }
            Cart::where('user_id', Auth::user()->id)->delete();
            $this->reset();
            $maildata = [
                'username' => Auth::user()->name,
                'bill_id' => $bill->id,
            ];
            try{
                Mail::to(Auth::user()->email)->send(new OrderMail($maildata));
            }catch (\Exception $e){
                dd($e);
            }
            $this->dispatch(
                'alert:success',
                [
                    'type' => "success",
                    'title' => "Add to cart successfully.",
                    'position' => "center",
                ]
            );
        }
        else{
            $this->dispatch(
                'alert:fail',
                [
                    'type' => "success",
                    'title' => "Add to cart successfully.",
                    'position' => "center",
                ]
            );
        }
    }
}
