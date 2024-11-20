@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perfil</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Atualizar configurações de usuário</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Atualizar imagem</label>
                                <input type="file" name="avatar" id="image-upload" />
                              </div>
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label>telefone</label>
                            <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Faculdade</label>
                            <input type="text" class="form-control" name="faculdade" value="{{ auth()->user()->faculdade }}">
                        </div>
                        <div class="form-group">
                            <label>Período</label>
                            <select class="form-control selectric" name="periodo" id="periodo" value="{{ auth()->user()->periodo }}">
                              <option value="1º" @selected(auth()->user()->periodo == '1º')>1º</option>
                              <option value="2º" @selected(auth()->user()->periodo == '2º')>2º</option>
                              <option value="3º" @selected(auth()->user()->periodo == '3º')>3º</option>
                              <option value="4º" @selected(auth()->user()->periodo == '4º')>4º</option>
                              <option value="5º" @selected(auth()->user()->periodo == '5º')>5º</option>
                              <option value="6º" @selected(auth()->user()->periodo == '6º')>6º</option>
                              <option value="7º" @selected(auth()->user()->periodo == '7º')>7º</option>
                              <option value="8º" @selected(auth()->user()->periodo == '8º')>8º</option>
                              <option value="9º" @selected(auth()->user()->periodo == '9º')>9º</option>
                              <option value="10º" @selected(auth()->user()->periodo == '10º')>10º</option>
                              <option value="11º" @selected(auth()->user()->periodo == '11º')>11º</option>
                              <option value="12º" @selected(auth()->user()->periodo == '12º')>12º</option>
                            </select>
                          </div>
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </form>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Atualizar Senha</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Senha atual</label>
                            <input type="password" class="form-control" name="current_password">
                        </div>

                        <div class="form-group">
                            <label>Nova senha</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Confirme sua senha</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>

                        <button class="btn btn-primary" type="submit">Salvar</button>

                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url({{ asset(auth()->user()->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush
