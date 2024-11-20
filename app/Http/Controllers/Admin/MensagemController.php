<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use App\Models\User;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        $mensagem = Mensagem::all();
        return view('admin.mensagens.index', compact('users', 'mensagem'));
    }

   
   
    public function viewMessage(Request $request)
    {
        $userId = $request->user_id;
    
        // Verificar se o usuário foi selecionado
        if (!$userId) {
            return redirect()->back()->with('error', 'Selecione um usuário.');
        }
    
        // Recuperar o usuário e as mensagens relacionadas
        $user = User::with('mensagens')->find($userId);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }
    
        $mensagens = $user->mensagens;
    
        // Passar a lista de usuários para a view novamente
        $users = User::all();
    
        return view('admin.mensagens.index', compact('mensagens', 'users'));
    }
    
}
