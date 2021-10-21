<?php

namespace App\Http\Livewire\Business;

use App\Models\Business;
use App\Models\Signatures as ModelsSignatures;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Signatures extends Component
{
    public $showSuccesNotification  = false;
    public $showSuccesNotificationUnlock  = false;

    public $businessAccess;

    public $business;

    public function mount()
    {
        SEOMeta::setTitle('Empresas assinates');
        $this->business = Business::get();
        $this->businessAccess = ModelsSignatures::get();
    }

    public function render()
    {
        return view('livewire.business.signatures');
    }

    public function block($id)
    {
        $business = Business::where('id', $id)->first();
        $isBlock = ModelsSignatures::where('link', $business->name)->first();
        if (!$isBlock) {
            ModelsSignatures::create([
                'link' => $business->name
            ]);
            $this->showSuccesNotification = true;
        }
    }

    public function unlock($id)
    {
        $business = Business::where('id', $id)->first();
        $block =   ModelsSignatures::where('link', $business->name)->delete();
        $this->showSuccesNotificationUnlock = true;
    }
}
