<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public $product;
    public $allCategory;
    public $showSuccesNotification  = false;
    public $newimage;

    public $name = '';
    public $description = '';
    public $value = '';
    public $category;

    protected $rules = [
        'product.name' => 'required|min:3',
        'product.description' => 'required|min:3',
        'product.value' => 'required|min:0',
        'product.category' => 'required|min:3',
    ];

    protected $message = [
        'product.name.required' => 'O campo nome é obrigatório!',
        'product.description.required' => 'O campo descrição é obrigatório!',
        'product.value.required' => 'O campo valor é obrigatório!',
        'product.category.required' => 'O campo categoria é obrigatório!',
    ];

    public function mount($id)
    {
        SEOMeta::setTitle('Alterar produto');
        $this->product = Product::where('user_id', auth()->id())->findOrFail($id);
        $this->allCategory = Category::where('user_id', auth()->id())->get();
    }


    public function render()
    {
        return view('livewire.product.update-product');
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
