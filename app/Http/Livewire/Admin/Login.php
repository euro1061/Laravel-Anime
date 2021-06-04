<?php

namespace App\Http\Livewire\Admin;
use Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email'=> '',
        'password'=>''
    ];

    public function submit(){
        $this->validate([
            'form.email'=>'required|email',
            'form.password'=>'required|min:6',
        ],
        [
            'form.password.required'=>'กรุณากรอก Password',
            'form.password.min'=>'กรุณากรอก Password อย่างน้อย 6 ตัว',
            'form.email.required'=>'กรุณากรอก Email',
            'form.email.email'=>'กรุณากรอก Email จริงๆ'
        ]);
        if(Auth::attempt($this->form)){
            return redirect(route('admin'));
        }else{
            $this->dispatchBrowserEvent('swal:login', [
                'type'=>'error',
                'title'=>'Login Failed!',
                'text' => 'Email หรือ Password ของคุณไม่ถูกต้อง'
            ]);
        }

    }

    public function render()
    {
        return view('livewire.admin.login')
        ->layout('layouts/loginbase');
    }
}
