<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index(){

        $user = Auth::id();
        $mensagem = User::with('mensagens')->find($user);
        $mensagens = $mensagem->mensagens;
        return view('user.mensagens.index', compact('mensagens'));

    }
}
