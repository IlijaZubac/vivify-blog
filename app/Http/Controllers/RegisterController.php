<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegisterController extends Controller
{
    public function __construct(){

        $this->middleware('guest');
        $this->middleware('checkAge')->only('store');
    }
    public function create(){
        return view('register.create');
    }

    public function store(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required | email | unique:users',
            'password'=>'required | min:6'
        ]);
        
        $user= new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        auth()->login($user);

        session()->flash('message', 'Uspešno ste se registrovali');

        return redirect('/posts');
    }
}