<?php

namespace App\Http\Livewire\Settings;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;
use Livewire\Request;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public User $user;
    public $showSuccesNotification  = false;
    public $newimage;
    public $showDemoNotification = false;

    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:11',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount()
    {
        SEOMeta::setTitle('Configurações');
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.settings.settings');
    }

    public function update()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            if ($this->newimage) {
                $img =  $this->newimage->store('user-profile');
                $this->user->avatar = $img;
            }
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }
}
