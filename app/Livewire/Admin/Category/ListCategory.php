<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class ListCategory extends Component
{
    public $categories = [];

    public function mount(){
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.category.list-category')->layout('layouts.admin');
    }

    public function deleteCate(Category $category){
        $category->delete();
        session()->flash('message', 'Delete category successfully.');
        return $this->redirect('/admin/category/list', true);
    }
}
