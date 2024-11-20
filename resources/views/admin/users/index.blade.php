@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Usuários</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Todos Usuários</h4>
                {{-- <div class="card-header-action">
                    <a href="#" class="btn btn-primary">
                        Criar novo
                    </a>
                </div> --}}
            </div>

            <table id="users" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Faculdade</th>
                        <th>Período</th>
                        <th>Permissão</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td> 
                            <td>{{ $user->phone }}</td> 
                            <td>{{ $user->faculdade }}</td> 
                            <td>{{ $user->periodo }}</td> 
                            <td>{{ $user->role }}</td> 
                            <td class="{{ $user->status == '1' ? 'badge badge-primary' : 'badge badge-danger' }}">
                                {{ $user->status == '1' ? 'Ativo' : 'Inativo' }}
                            </td> 
                            <td>
                                <a href="{{route('admin.usuarios.show', $user->id)}}" class="btn btn-icon btn-warning"></i>Vizualizar</a>
                                <a href="{{route('admin.usuarios.edit', $user->id)}}" class="btn btn-icon btn-primary">Editar</a>

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('scripts')

    <!-- Data table -->
    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                language: {
                    url: "http://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
                }
            });
        });
    </script>
    

@endpush
