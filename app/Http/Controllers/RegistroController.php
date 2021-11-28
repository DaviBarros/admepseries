<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create(){
        return view('registro.create');
    }

    public function store(Request $request){
        try {
            $data = $request->except('_token');
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
    
            Auth::login($user);
    
            return redirect('/series');
        } catch (Exception $e) {
            echo "Erro:" . $e->getMessage() . "<br />";
            echo "Linha:" . $e->getLine();
        }
       
    }
    
}
