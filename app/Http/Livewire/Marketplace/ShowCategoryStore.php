<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Business;
use App\Models\Category;
use App\Models\Link;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategoryStore extends Component
{
    use WithPagination;

    public $allCategory;
    public $allProducts;
    public $business;
    public $showSuccesNotification  = false;

    public function mount($link, $category)
    {

        $link = Link::where('link', $link)->first();
        if (!$link) {
            return redirect('/');
        }

        $this->allProducts = Product::where('user_id', $link->user_id)->where('category', $category)->get();
        $this->allCategory = Category::where('name', $category)->first();
        $this->business = Business::where('id', $link->business_id)->first();
    }

    public function render()
    {
        return view('livewire.marketplace.show-category-store');
    }


    public function addCart(Request $request)
    {

        return redirect('https://api.whatsapp.com/send?phone=5514996556672&text=as');

    }

    // public function add($id)
    // {
    //     $this->valueProduct = Product::where('id', $id)->first();
    //     $this->add += 1;

    //     // dd($id);
    // }

    // public function remove()
    // {
    //     if ($this->add == 0) {
    //         return;
    //     }
    //     $this->add -= 1;
    // }
}
