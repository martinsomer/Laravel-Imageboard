<?php

namespace App\Http\Livewire\Admin\Board;

use App\Models\Board;
use Livewire\Component;

class Single extends Component
{

    public $board;

    public function mount(Board $board){
        $this->board = $board;
    }

    public function delete()
    {
        $this->board->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Board') ]) ]);
        $this->emit('boardDeleted');
    }

    public function render()
    {
        return view('livewire.admin.board.single')
            ->layout('admin::layouts.app');
    }
}
