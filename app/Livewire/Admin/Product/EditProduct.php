<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product;
    public $name;
    public $price;
    public $des;
    public $image;
    public $category_id;

    public function mount(Product $product, $id){
        $this->product = $product->find($id);
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->des = $this->product->des;
        $this->category_id = $this->product->category_id;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.edit-product', compact('categories'))->layout('layouts.admin');
    }

    public function updatePro(){

        $this->validate([
            'name'=>'required|max:255',
            'price'=>'required|min:0|max:10',
            'des'=>'required|max:255',
            'category_id'=>'required',
        ]);
        $photo = '';
        if($this->image){
            Storage::delete('public/uploads/'.$this->product->image);
            $filename = 'product'.time().'.jpg';
            $photo = $this->image->storeAs('uploads', $filename, 'public');
            $photo = str_replace("uploads/", "", $photo);
        }
        else{
            $photo = $this->product->image;
        }
        $this->product->update([
            'name' => $this->name,
            'price' => $this->price,
            'des' => $this->des,
            'image' => $photo,
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Update product successfully.');
        return $this->redirect('/admin/product/list', true);
    }
}
