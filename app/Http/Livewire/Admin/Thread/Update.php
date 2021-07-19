<?php

namespace App\Http\Livewire\Admin\Thread;

use App\Models\Thread;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $thread;

    public $subject;
    public $comment;
    public $board_id;
    
    protected $rules = [
        'subject' => 'required|max:32',
        'comment' => 'required|max:255',
        'board_id' => 'required|integer',        
    ];

    public function mount(Thread $thread){
        $this->thread = $thread;
        $this->subject = $this->thread->subject;
        $this->comment = $this->thread->comment;
        $this->board_id = $this->thread->board_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Thread') ]) ]);
        
        $this->thread->update([
            'subject' => $this->subject,
            'comment' => $this->comment,
            'board_id' => $this->board_id,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.thread.update', [
            'thread' => $this->thread
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Thread') ])]);
    }
}
