<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListProduct extends Component
{
    public $products = [];
    public $categories = [];
    public $category_id;

    public function mount(){
        $this->products = Product::all();
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.product.list-product')->layout('layouts.admin');
    }

    public function deletePro(Product $product){
        Storage::delete('public/uploads/'.$product->image);
        $product->delete();
        session()->flash('message', 'Delete product successfully.');
        return $this->redirect('/admin/product/list', true);
    }

    public function filterProduct(){
        if($this->category_id){
            $this->products = Product::where('category_id', $this->category_id)->get();
        }
        else{
            $this->products = Product::all();
        }
    }
}
