<?php

namespace App\Http\Livewire\Admin\Reply;

use App\Models\Reply;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $reply;

    public $comment;
    public $thread_id;
    
    protected $rules = [
        'comment' => 'required|max:255',
        'thread_id' => 'required|integer',        
    ];

    public function mount(Reply $reply){
        $this->reply = $reply;
        $this->comment = $this->reply->comment;
        $this->thread_id = $this->reply->thread_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Reply') ]) ]);
        
        $this->reply->update([
            'comment' => $this->comment,
            'thread_id' => $this->thread_id,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.reply.update', [
            'reply' => $this->reply
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Reply') ])]);
    }
}
