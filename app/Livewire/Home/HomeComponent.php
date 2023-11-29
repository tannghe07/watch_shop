<?php

namespace App\Livewire\Home;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeComponent extends Component
{
    public $products = [];
    public $new_products = [];
    public $newest_product;
    public $trending_products = [];
    public $categories = [];

    public function mount(){
        $this->products = Product::all();
        $this->new_products = Product::orderBy('id', 'DESC')->take(5)->get();
        $this->newest_product = Product::orderBy('id', 'DESC')->first();
        $this->trending_products = Product::all()->random(5);
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.home.home-component')->layout('layouts.home');
    }


}
