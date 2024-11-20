<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use App\Models\Mensagem;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = User::findOrFail($id);
        $certificates = Certificates::where('user_id', $id)->get();

        return view('admin.users.show', compact('user', 'certificates'));
    }

    public function download($id)
    {
        // Busca o certificado pelo ID
        $certificate = Certificates::findOrFail($id);
    
        // Caminho completo do arquivo armazenado
        $filePath = storage_path('app/' . $certificate->path);
    
        // Verifica se o arquivo existe antes de iniciar o download
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Certificado não encontrado.');
        }
    
        // Realiza o download do arquivo
        return response()->download($filePath, basename($filePath), [
            'Content-Type' => mime_content_type($filePath) // Define o tipo MIME do arquivo
        ]);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function salvarnota(string $id, Request $request)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->nota = $request->nota;
        }
        $user->save();

        return redirect()->back()->with('success', 'Atualizado com sucesso!');
    }



    public function salvarmensagem(string $id, Request $request)
    {

        // Encontrar o usuário pelo ID
        $user = User::findOrFail($id);

        // Criar uma nova mensagem e associá-la ao usuário
        $mensagem = new Mensagem();
        $mensagem->mensagem = $request->mensagem;

        // Salvar a mensagem no banco de dados
        $mensagem->save();

        // Associar a mensagem ao usuário 
        $user->mensagens()->attach($mensagem->id);

        return redirect()->back()->with('success', 'Mensagem salva com sucesso!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->status = $request->status ?? $user->status;
        $user->role = $request->role ?? $user->role;

        $user->save();

        return redirect()->route('admin.usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            try {
                Certificates::findOrFail($id)->delete();
                return response(['status' => 'success', 'message' => 'Deletado com sucesso!']);
            } catch (\Exception $e) {
                return response(['status' => 'error', 'message' => 'Algo de errado aconteceu!']);
            }
        }
    }
}
