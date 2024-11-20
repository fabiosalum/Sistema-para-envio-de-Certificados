<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CerificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.certificates.index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'certificate_file' => 'required|file|mimes:pdf,jpg,png|max:5000', // Aceita apenas arquivos JPG, PNG, PDF de até 5 MB
        ]);
    
        // Criação de um novo objeto de certificado
        $certificate = new Certificates();
        $certificate->title = $request->title;
        $certificate->type = $request->type;
        $certificate->activity = $request->activity;
        $certificate->user_id = Auth::id(); // Obtém o ID do usuário logado
        
        // Processamento do upload do arquivo
        if ($request->hasFile('certificate_file')) {
            $file = $request->file('certificate_file');
            
            // Define o nome único para o arquivo
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            
            // Armazena o arquivo na pasta "private/certificates" dentro de "storage/app"
            $path = $file->storeAs('private/certificates', $filename);

            // Salva o caminho do arquivo no banco de dados
            $certificate->path = $path;
        }
    
        $certificate->save();
    
        return redirect()->route('user.certificates')->with('success', 'Certificado salvo com sucesso!');
        
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


}
