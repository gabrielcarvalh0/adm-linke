<?php

use App\Models\Category as ModelsCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Category extends Component
{
    public $showSuccesNotification  = false;
    public $name = '';

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function mount()
    {
        SEOMeta::setTitle('Criar categoria');
    }

    public function render()
    {
        return view('livewire.product.category');
    }

    public function create()
    {
        ModelsCategory::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
        ]);
        $this->showSuccesNotification = true;
    }
}
