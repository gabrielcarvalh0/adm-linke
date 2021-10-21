<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class CategoryProduct extends Component
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
        return view('livewire.product.category-product');
    }

    public function create()
    {
        Category::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
        ]);
        $this->showSuccesNotification = true;
    }
}
