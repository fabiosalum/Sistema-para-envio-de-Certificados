@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Certificados Enviados</h4>
                        </div>
                        <div class="card-body">
                            {{ $certificatesCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Nota Total ENARE</h4>
                        </div>
                        <div class="card-body">
                            {{ (Auth::user()->nota) ? (Auth::user()->nota) : '0' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div>
                <h2 class="section-title">Certificados Enviados</h2>

                @foreach ($certificates as $c)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ $c->user ? $c->user->name : 'Usuário não encontrado' }}</h4>
                        </div>

                        <div class="card-body">
                            <h6>{{ $c->title }} | {{ $c->type }} | {{$c->activity}}</h6>  
                            <span>Enviado: {{ $c->created_at->diffForHumans() }} </span>
                        </div>

                    </div>
                @endforeach

                <nav aria-label="Page navigation example">
                    {{ $certificates->links() }}
                </nav>
            </div>


    </section>
@endsection
