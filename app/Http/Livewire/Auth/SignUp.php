<?php

namespace App\Http\Livewire\Auth;

use App\Models\Business;
use App\Models\Link;
use Livewire\Component;
use App\Models\User;
use App\Models\UserAdm;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    protected $message = [
        'name.required' => 'O campo nome é obrigatório!',
        'phone.required' => 'O campo telefone é obrigatório!',
        'email.required' => 'O campo email é obrigatório!',
        'password.required' => 'O campo senha é obrigatório!',
    ];

    public function mount()
    {
        SEOMeta::setTitle('Criar conta adm');

        if (auth()->user()) {
            redirect('/dashboard');
        }
    }

    public function register()
    {
        $this->validate($this->rules, $this->message);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => 'user-profile/avatar.png',
            'password' => Hash::make($this->password)
        ]);

        UserAdm::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => 'user-profile/avatar.png',
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
