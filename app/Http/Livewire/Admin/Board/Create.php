<?php

namespace App\Http\Livewire\Admin\Board;

use App\Models\Board;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $category_id;
    
    protected $rules = [
        'name' => 'required|max:32',
        'category_id' => 'required|integer',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Board') ])]);
        
        Board::create([
            'name' => $this->name,
            'category_id' => $this->category_id,            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.board.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Board') ])]);
    }
}
