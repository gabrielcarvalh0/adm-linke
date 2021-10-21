<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Request as LivewireRequest;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public User $user;
    public $allCategory;

    public $name = '';
    public $description = '';
    public $value = '';
    public $category;
    public $image;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
        'value' => 'required|min:0',
        'category' => 'required|min:3',
        'image' => 'required|image|max:20000'
    ];
    
    protected $message = [
        'name.required' => 'O campo nome é obrigatório!',
        'description.required' => 'O campo descrição é obrigatório!',
        'value.required' => 'O campo valor é obrigatório!',
        'category.required' => 'O campo categoria é obrigatório!',
        'image.required' => 'O campo imagem é obrigatório!',
    ];

    public $showSuccesNotification  = false;
    public $showDangerNotificationCategory  = false;


    public function mount()
    {
        SEOMeta::setTitle('Novo produto');
        $this->user = auth()->user();
        $this->allCategory = Category::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.product.create-product');
    }

    public function create()
    {

        $this->validate($this->rules, $this->message);
        $product = Product::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
            'category' => $this->category,
            'image' =>  $this->image->store('image-product'),
        ]);
        $this->showSuccesNotification = true;
    }
}
