<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class ProductCategory extends Component
{
    public $showSuccesNotification  = false;
    public $product;

    public function mount($name)
    {
        SEOMeta::setTitle('Meus produtos');
        $this->product = Product::where('category', $name)->get();
    }

    public function render()
    {
        return view('livewire.marketplace.product-category');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->delete();
        return redirect()->to('/mystore');
    }
}
