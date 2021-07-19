<?php

namespace App\Http\Livewire\Admin\Reply;

use App\Models\Reply;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $comment;
    public $thread_id;
    
    protected $rules = [
        'comment' => 'required|max:255',
        'thread_id' => 'required|integer',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Reply') ])]);
        
        Reply::create([
            'comment' => $this->comment,
            'thread_id' => $this->thread_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.reply.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Reply') ])]);
    }
}
