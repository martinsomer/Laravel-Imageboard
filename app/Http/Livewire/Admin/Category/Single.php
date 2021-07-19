<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Single extends Component
{

    public $category;

    public function mount(Category $category){
        $this->category = $category;
    }

    public function delete()
    {
        $this->category->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Category') ]) ]);
        $this->emit('categoryDeleted');
    }

    public function render()
    {
        return view('livewire.admin.category.single')
            ->layout('admin::layouts.app');
    }
}
