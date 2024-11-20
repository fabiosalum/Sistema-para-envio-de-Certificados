@extends('admin.layouts.master')

@section('content')
    @php
        $admin = App\Models\User::where('role', 'admin');
        $user = App\Models\User::where('role', 'user');
    @endphp

    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total de Administradores</h4>
                        </div>
                        <div class="card-body">
                            {{ $admin->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total de Usuários</h4>
                        </div>
                        <div class="card-body">
                            {{ $user->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total de Certificados</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCertificates }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <h2 class="section-title">Certificados Enviados</h2>

        @foreach ($certificates as $c)
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ $c->user ? $c->user->name : 'Usuário não encontrado' }}</h4>
                </div>
                <div class="card-body">
                    <h6>{{ $c->title }} | {{ $c->type }} | {{ $c->activity }}</h6>
                    <span>Enviado: {{ $c->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @endforeach
        
        <nav aria-label="Page navigation example">
            {{ $certificates->links() }}
        </nav>
        

    </section>
@endsection
