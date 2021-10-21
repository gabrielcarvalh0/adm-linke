<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\VisitStore;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        SEOMeta::setTitle('Painel inicial');
    }

    public function render()
    {
        $allProducts =  Product::where('user_id', auth()->id());
        $allVisits =  VisitStore::where('user_id', auth()->id());

        return view('livewire.dashboard', [
            'allProducts' => $allProducts->count(),
            'allVisits' => $allVisits->count(),
        ]);
    }
}
