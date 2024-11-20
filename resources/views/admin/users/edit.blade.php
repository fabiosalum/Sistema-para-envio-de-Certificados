@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Usuários</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Atualizar Status do Usuário {{$user->name}} </h4>

        </div>
        <div class="card-body">
            <form action="{{route('admin.usuarios.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group col-md-6">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option @selected($user->role === 'admin') value="admin">Admin</option>
                        <option @selected($user->role === 'user') value="user">User</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option @selected($user->status === 1) value="1">Ativo</option>
                        <option @selected($user->status === 0) value="0">Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a class="btn btn-primary" href="{{route('admin.usuarios')}}" > Voltar</a>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')

@endpush
