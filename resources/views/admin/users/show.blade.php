@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header d-flex flex-column align-items-start">
            <div>
                <h1>Certificados {{ $user->name }}</h1>
            </div>
            <div><span>Faculdade: {{ $user->faculdade }} / Período: {{ $user->periodo }}</span></div>
            <div><span>E-mail: {{ $user->email }} / Telefone: {{ $user->phone }}</span></div>
        </div>

        <div>
            <!-- Primeiro formulário -->
            <div class="col-md-6">
                <form action="{{ route('admin.salvar.nota', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Total Nota ENARE</label>
                        <input type="text" class="form-control" name="nota" value="{{ $user->nota ?? '0' }}"></input>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-icon btn-primary">Salvar Nota</button>
                    </div>

                </form>
            </div>

            <!-- Segundo formulário -->
            <div class="col-md-6">
                <form action="{{ route('admin.salvar.mensagem', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Mensagem FeedBack</label>
                        <textarea class="form-control" name="mensagem" value="" rows="50"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-icon btn-primary">Enviar Mensagem</button>
                    </div>
                </form>
            </div>

        </div>
        <hr>

        <div class="card card-primary">

            <table id="certificates" class="table table-striped" style="width:95">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tipo de Certificado</th>
                        <th>Quantidade de horas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->type }}</td>
                            <td>{{ $c->hours }}</td>
                            <td>
                                <a href="{{ route('admin.certificates.download', $c->id) }}"
                                    class="btn btn-icon btn-primary"></i>Download</a>
                                <a href="{{ route('admin.certificates.destroy', $c->id) }}"
                                    class="btn btn-icon btn-danger delete-item">Excluir</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="m-3">
                <a href="{{ route('admin.usuarios') }}" class="btn btn-icon btn-primary"></i>Voltar</a>
            </div>

        </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Data table -->
    <script>
        $(document).ready(function() {
            $('#certificates').DataTable({
                language: {
                    url: "http://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
                }
            });
        });
    </script>
@endpush
