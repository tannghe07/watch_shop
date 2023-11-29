<?php

namespace App\Livewire\Home;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public $check = [];

    public function mount(){
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cart as $item){
                $this->check[$item->id] = true;
            }
        }
    }

    public function render()
    {
        $cart = '';
        $total = '';
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            $total = 0;
            foreach ($cart as $item){
                $total += $item->total_price;
            }
        }
        return view('livewire.home.cart-component', compact('cart', 'total'))->layout('layouts.home');
    }

    public function increaseQty($id){
        $cart = Cart::where('id', $id)->first();
        $quantity = $cart->quantity+1;
        $total_price = $quantity * $cart->product->price;
        $item = [
            'quantity' => $quantity,
            'total_price' => $total_price,
        ];
        $cart->update($item);
    }

    public function decreaseQty($id){
        $cart = Cart::where('id', $id)->first();
        if($cart->quantity <= 1){
            $this->deleteItem($id);
        }
        else{
            $quantity = $cart->quantity-1;
            $total_price = $quantity * $cart->product->price;
            $item = [
                'quantity' => $quantity,
                'total_price' => $total_price,
            ];
            $cart->update($item);
        }
    }

    public function deleteItem($id){
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
    }

    public function changeQuantity($id){
        $this->check[$id] = !$this->check[$id];
    }

}
