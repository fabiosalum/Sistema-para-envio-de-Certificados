@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mensagens</h1>
        </div>

        <form action="{{ route('admin.mensagem.view') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <div><label>Usuário</label></div>
                    <select class="form-control select2" name="user_id">
                        <option value="" selected disabled>Selecione um usuário</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-icon btn-primary">Visualizar Mensagens</button>
            </div>
        </form>

        @if (isset($mensagens) && $mensagens->count() > 0)
            @foreach ($mensagens as $mensagem)
                <div class="card card-primary">
                    <div class="card-header">
                        <span>{{ $mensagem->mensagem }}</span>
                    </div>
                    <div class="card-body">
                        <span>Enviado: {{ $mensagem->created_at->diffForHumans() }} </span>
                    </div>
                </div>
            @endforeach
        @elseif (isset($mensagens))
            <p>Nenhuma mensagem encontrada para o usuário selecionado.</p>
        @endif

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
