<?php

namespace App\Http\Livewire\Admin\Thread;

use App\Models\Thread;
use Livewire\Component;

class Single extends Component
{

    public $thread;

    public function mount(Thread $thread){
        $this->thread = $thread;
    }

    public function delete()
    {
        $this->thread->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Thread') ]) ]);
        $this->emit('threadDeleted');
    }

    public function render()
    {
        return view('livewire.admin.thread.single')
            ->layout('admin::layouts.app');
    }
}
