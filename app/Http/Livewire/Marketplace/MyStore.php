<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Business;
use App\Models\Category;
use App\Models\Link;
use App\Models\User;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyStore extends Component
{
    use WithFileUploads;

    public $allCategory;
    public $business;
    public User $user;
    public $showSuccesNotification  = false;
    public $newimage;
    public $link;


    protected $rules = [
        'business.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:11',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount()
    {
        SEOMeta::setTitle('Minha loja');

        $this->user = auth()->user();
        $this->allCategory = Category::where('user_id', auth()->id())->get();
        $this->business = Business::where('user_id', auth()->id())->first();
        $this->link = Link::where('business_id', $this->business->id)->first(); 
    }

    public function render()
    {
        return view('livewire.marketplace.my-store');
    }



    public function update()
    {
        if ($this->newimage) {
            $img =  $this->newimage->store('image-product');
            $this->business->image = $img;
        }
        $this->validate();
        $this->business->save();
        $this->user->save();
        $this->showSuccesNotification = true;
    }
}
