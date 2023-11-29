<?php

namespace App\Livewire\Admin\Issue;

use App\Mail\ReplyIssue;
use App\Models\Issue;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendEmailIssue extends Component
{
    public $issue_id;
    public $title;
    public $message;

    public function mount($id){
        $this->issue_id = $id;
    }

    public function render()
    {
        $issue = Issue::where('id', $this->issue_id)->first();
        return view('livewire.admin.issue.send-email-issue', compact('issue'))->layout('layouts.admin');
    }

    public function sendEmail(){
        $validated = $this->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $issue = Issue::where('id', $this->issue_id)->first();
        $issue->update([
            'status' => 1
        ]);
        try{
            Mail::to($issue->email)->send(new ReplyIssue($validated));
        }catch (\Exception $e){
            dd($e);
        }
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
