<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Business;
use App\Models\Category;
use App\Models\Link;
use App\Models\VisitStore;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;

    public $allCategory;
    public $business;
    public $showSuccesNotification  = false;

    public function mount($link)
    {

        SEOMeta::setTitle($link);
        
        $link = Link::where('link', $link)->first();
        if (!$link) {
            return redirect('/');
        }
        $this->allCategory = Category::where('user_id', $link->user_id)->get();
        $this->business = Business::where('id', $link->business_id)->first();
    
        $ip =  $_SERVER['REMOTE_ADDR'];
        $ipSql = VisitStore::where('location', $ip)->first();
        if(!$ipSql){
            VisitStore::create([
                'user_id' => $link->user_id,
                'business_id' => $link->business_id,
                'location' => $ip
            ]);
        }
        
    }


    public function render()
    {
        return view('livewire.marketplace.store');
    }

}
