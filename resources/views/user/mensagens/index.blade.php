@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Feedback</h1>
        </div>

        <h2 class="section-title">Mensagens</h2>

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
        <p>Nenhuma mensagem encontrada.</p>
    @endif
            

         

    </section>
@endsection
