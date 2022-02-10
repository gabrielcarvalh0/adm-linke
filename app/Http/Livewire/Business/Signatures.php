<?php

namespace App\Http\Livewire\Business;

use App\Models\Business;
use App\Models\Link;
use App\Models\Signatures as ModelsSignatures;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Signatures extends Component
{
    public $showSuccesNotification  = false;
    public $showSuccesNotificationUnlock  = false;
    public $link;

    public $businessAccess;

    public $business;

    public function mount()
    {
        SEOMeta::setTitle('Empresas assinates');
        $this->business = Business::get();
        $this->businessAccess = ModelsSignatures::get();
        $this->link = Link::get();
    }

    public function render()
    {
        $adapter = Storage::disk('dropbox')->getAdapter();
        $client = $adapter->getClient();
        
        return view('livewire.business.signatures', [
            'client' => $client
        ]);
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
