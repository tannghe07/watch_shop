<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category;
    public $name;

    public function mount(Category $category, $id){
        $this->category = $category->find($id);
        $this->name = $this->category->name;
    }

    public function render()
    {
        return view('livewire.admin.category.edit-category')->layout('layouts.admin');
    }

    public function updateCate(){
        $validated = $this -> validate([
            'name'=>'required|max:255',
        ]);
        $this->category->update($validated);
        session()->flash('message', 'Update category successfully.');
        return $this->redirect('/admin/category/list', true);
    }
}
