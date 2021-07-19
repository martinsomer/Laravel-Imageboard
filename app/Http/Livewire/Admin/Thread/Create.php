<?php

namespace App\Http\Livewire\Admin\Thread;

use App\Models\Thread;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $subject;
    public $comment;
    public $board_id;
    
    protected $rules = [
        'subject' => 'required|max:32',
        'comment' => 'required|max:255',
        'board_id' => 'required|integer',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Thread') ])]);
        
        Thread::create([
            'subject' => $this->subject,
            'comment' => $this->comment,
            'board_id' => $this->board_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.thread.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Thread') ])]);
    }
}
