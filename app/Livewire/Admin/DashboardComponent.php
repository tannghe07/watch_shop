<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Carbon;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-component')->layout('layouts.admin');
    }
}
