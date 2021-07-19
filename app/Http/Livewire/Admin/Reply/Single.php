<?php

namespace App\Http\Livewire\Admin\Reply;

use App\Models\Reply;
use Livewire\Component;

class Single extends Component
{

    public $reply;

    public function mount(Reply $reply){
        $this->reply = $reply;
    }

    public function delete()
    {
        $this->reply->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Reply') ]) ]);
        $this->emit('replyDeleted');
    }

    public function render()
    {
        return view('livewire.admin.reply.single')
            ->layout('admin::layouts.app');
    }
}
