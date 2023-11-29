<?php

namespace App\Livewire\Home;

use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WatchCare extends Component
{
    public $username;
    public $email;
    public $phone;
    public $issue;
    public $message;

    public function mount(){
        if(Auth::check()){
            $this->username = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('livewire.home.watch-care')->layout('layouts.home');
    }

    public function sendMessage(){
        $validated = $this->validate([
            'username'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required',
            'issue'=>'required',
        ]);
        $issue = Issue::create([
            'user_id' => Auth::user()->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'issue' => $this->issue,
            'message' => $this->message,
        ]);
        $this->reset('phone', 'issue', 'message');
        $this->dispatch(
            'alert:success',
            [
                'type' => "success",
                'title' => "Add to cart successfully.",
                'position' => "center",
            ]
        );
    }
}
