@extends('user.layouts.master')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                }).then(function() {
                    window.location.href = '{{ route('user.certificates') }}';
                });
            });
        </script>
    @endif

    <section class="section">
        <div class="section-header">
            <h1>Certificados</h1>
        </div>
        <div class="card">
            <form action="{{ route('user.certificates.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Token CSRF para segurança -->
                <div class="card-header">
                    <h4>Enviar Certificado</h4>
                </div>
                <div class="card-body col-md-6">

                    <div class="form-group">
                        <label>Título do certificado</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label>Atividade</label>
                        <select class="form-control" name="activity">
                            <option value="Histórico Escolar">Histórico Escolar</option>
                            <option value="Projeto de Extensão">Projeto de Extensão</option>
                            <option value="Evento de Extensão">Evento de Extensão</option>
                            <option value="Monitoria">Monitoria</option>
                            <option value="Iniciação Científica">Iniciação Científica</option>
                            <option value="Publicação de Artigo">Publicação de Artigo</option>
                            <option value="Ouvinte em Evento">Ouvinte em Evento</option>
                            <option value="Publicação em Anais">Publicação em Anais</option>
                            <option value="Organização de Evento">Organização de Evento</option>
                            <option value="Estágio">Estágio</option>
                            <option value="Proficiência em Língua">Proficiência em Língua</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <select class="form-control" name="type">
                            <option value="Certificado">Certificado</option>
                            <option value="Declaração">Declaração</option>
                            <option value="Histórico Escolar">Histórico Escolar</option>
                            <option value="Carteira de Aprovação">Carteira de Aprovação</option>
                            <option value="Anais de Evento">Anais de Evento</option>
                            <option value="Capa de Periódico">Capa de Periódico</option>
                            <option value="1ª Página de Artigo Científico">1ª Página de Artigo Científico</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Escolher Certificado</label>
                        <input class="form-control" type="file" id="formFile" name="certificate_file">
                        <div class="text-danger mt-2">
                            É possível enviar arquivos em JPG, PNG e PDF de no máximo 5MB.
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Enviar</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
@endsection
