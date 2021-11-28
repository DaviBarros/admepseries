<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(){

        return view('entrar.index');
        
    }

    public function entrar(Request $request){
                 
    
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect('/series');
            }else{
                return redirect('/erroemail');
            }      
    }
}

?>

<script>
    function ola()
    {
        alert('oi');
    }
</script>
