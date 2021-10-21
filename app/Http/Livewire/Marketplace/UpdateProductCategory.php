<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProductCategory extends Component
{
    use WithFileUploads;

    public $showSuccesNotification  = false;
    public $product;
    public $newimage;
    
    public $name = '';
    public $description = '';
    public $value = '';

    protected $rules = [
        'product.name' => 'required|min:3',
        'product.description' => 'required|min:3',
        'product.value' => 'required|min:0',
    ];

    protected $message = [
        'product.name.required' => 'O campo nome é obrigatório!',
        'product.description.required' => 'O campo descrição é obrigatório!',
        'product.value.required' => 'O campo valor é obrigatório!',
    ];

    public function mount($id)
    {
        SEOMeta::setTitle('Atualizar produto');
        $this->product = Product::where('user_id', auth()->id())->findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.marketplace.update-product-category');
    }

    public function update()
    {
        $this->validate($this->rules, $this->message);
        if ($this->newimage) {
            $img =  $this->newimage->store('image-product');
            $this->product->image =  $img;
        }
        $this->product->save();
        $this->showSuccesNotification = true;
    }
}
