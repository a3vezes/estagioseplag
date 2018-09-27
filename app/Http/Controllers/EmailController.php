<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    
    public function enviar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'titulo' => 'required|string|max:50',
            'mensagem' => 'required|string|max:191'
        ]);
             
       $data = array('msg'=> $request->mensagem, 'email' => $request->email, 'titulo' => $request->titulo);
        
        Mail::send(['text'=>'mail'], $data, function($message) use ($data) {
            $message->subject($data['titulo'], 'Titulo');
            $message->to($data['email']);
                     
         });  

         DB::table('emails')->insert(
            ['email' => $request->email,
            'titulo' => $request->titulo,
            'mensagem' => $request->mensagem]
        );

         return redirect('home');
    }

    public function listar(){
        $email = DB::table('emails')
        ->select('id','email','titulo','mensagem')        
        ->get();
        return view('listar',['email' => $email]);
    }
    
}
