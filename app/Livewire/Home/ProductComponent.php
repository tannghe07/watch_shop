<?php

namespace App\Livewire\Home;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    public $category_id;

    public function mount($id){
        $this->category_id = $id;
    }

    public function render()
    {
        $categories = Category::all();
        $All_Pro = Product::all();
        if($this->category_id!='all'){
            $products = Product::where('category_id', $this->category_id)->paginate(9);
            $cate_name = Category::find($this->category_id);
            $productts = $cate_name->product;
        }
        else{
            $products = Product::paginate(9);
            $cate_name = '';
            $productts = Product::all();
        }
        return view('livewire.home.product-component', compact('categories', 'products', 'productts', 'cate_name', 'All_Pro'))->layout('layouts.home');
    }

    public function filterProduct(){
        $this->resetPage();
    }

}
