<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.admin.category.add-category')->layout('layouts.admin');
    }

    public function save(){
        $validated = $this -> validate([
            'name'=>'required|max:255',
        ]);
        Category::create($validated);
        session()->flash('message', 'Add category successfully.');
        $this->reset();
    }
}
