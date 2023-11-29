<?php

namespace App\Livewire\Admin\Issue;

use App\Models\User;
use Livewire\Component;

class IssueComponent extends Component
{
    public $user_id;

    public function mount($id){
        $this->user_id = $id;
    }

    public function render()
    {

        $user = User::where('id', $this->user_id)->first();
        $issues = $user->issue()->orderBy('id', 'DESC')->get();
        return view('livewire.admin.issue.issue-component', compact('issues', 'user'))->layout('layouts.admin');
    }
}
