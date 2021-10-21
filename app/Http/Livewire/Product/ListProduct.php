<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class ListProduct extends Component
{

    public $product;
    public $showSuccesNotification  = false;


    public function mount()
    {
        SEOMeta::setTitle('Todos produtos');
        $this->product = Product::where('user_id', auth()->id())->get();

    }

    public function render()
    {
        return view('livewire.product.list-product');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->delete();
        return redirect()->to('/product');
    }

}
