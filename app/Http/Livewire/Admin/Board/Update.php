<?php

namespace App\Http\Livewire\Admin\Board;

use App\Models\Board;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $board;

    public $name;
    public $category_id;
    
    protected $rules = [
        'name' => 'required|max:32',
        'category_id' => 'required|integer',        
    ];

    public function mount(Board $board){
        $this->board = $board;
        $this->name = $this->board->name;
        $this->category_id = $this->board->category_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Board') ]) ]);
        
        $this->board->update([
            'name' => $this->name,
            'category_id' => $this->category_id,            
        ]);
    }

    public function render()
    {
        return view('livewire.admin.board.update', [
            'board' => $this->board
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Board') ])]);
    }
}
