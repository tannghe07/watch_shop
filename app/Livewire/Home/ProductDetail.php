<?php

namespace App\Livewire\Home;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product_id;

    public function mount($id){
        $this->product_id = $id;
    }

    public function render()
    {
        $product = Product::find($this->product_id);
        $related_Products = Product::where([
            ['category_id', $product->category->id],
            ['id', '!=', $this->product_id],
        ])->take(5)->get();
        return view('livewire.home.product-detail', compact('product', 'related_Products'))->layout('layouts.home');
    }

    public function addToCart($id){

        if(Auth::check()){
            $cart_item = Cart::where([
                ['user_id', Auth::user()->id],
                ['product_id', $id],
            ])->first();
            $product_price = Product::find($id)->price;
            if($cart_item){
                $quantity = $cart_item->quantity + 1;
                $total_price = $quantity * $product_price;
                $item = [
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                ];
                $cart_item->update($item);
                $this->dispatch(
                    'alert',
                    [
                        'type' => "success",
                        'title' => "Add to cart successfully.",
                        'position' => "center",
                    ]
                );
            }
            else{
                $item = [
                    'quantity' => 1,
                    'total_price' => $product_price,
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                ];
                Cart::create($item);
                $this->dispatch(
                    'alert',
                    [
                        'type' => "success",
                        'title' => "Add to cart successfully.",
                        'position' => "center",
                    ]
                );
            }
        }
        else{
            return $this->redirect(route('login'), true);
        }
    }

}
