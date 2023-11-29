<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class ListUserComponent extends Component
{
    public function render()
    {
        $users = User::all();

        return view('livewire.admin.user.list-user-component', compact('users'))->layout('layouts.admin');
    }
}
