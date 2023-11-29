<?php

namespace App\Livewire\Home;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.home.about-component')->layout('layouts.home');
    }
}
