<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $des;
    public $image;
    public $category_id;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.add-product', compact('categories'))->layout('layouts.admin');
    }

    public function save(){
        $validated = $this -> validate([
            'name'=>'required|max:255',
            'price'=>'required|min:0|max:10',
            'des'=>'required|max:255',
            'image'=>'required|image|max:1024',
            'category_id'=>'required',
        ]);
        if($this->image){
            $filename = 'product'.time().'.jpg';
            $validated['image'] = $this->image->storeAs('uploads', $filename, 'public');
            $validated['image'] = str_replace("uploads/", "", $validated['image']);
        }
        Product::create($validated);
        session()->flash('message', 'Add product successfully.');
        $this->reset();
    }
}
