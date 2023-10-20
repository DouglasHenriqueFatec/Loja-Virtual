@extends('layout')
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4 border-end border-bottom">
                <h3>Fazer Login</h3>
                @if (isset($data['mensagem']))
                    <spam> {{ $data['mensagem'] }} </spam>
                @endif
                <form method="POST" action="{{ route('logar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div id="emailHelp" class="form-text">Nunca compartilhe a sua senha</div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Checar</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-12 col-sm-4">Logar</button>
                </form>
            </div>
            <div class="col-12 col-sm-4 border-bottom">
                <h3>Cadastre-se</h3>
                <form method="POST" action="{{ route('verificar_email') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-auto">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-auto">
                                @if (isset($data['mensagem2']))
                                    <small class="border border-danger p-1 rounded bg-danger text-white">
                                        {{ $data['mensagem2'] }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <input type="email" @required(true) class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 col-sm-4">Cadastrar</button>
                </form>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center border-top" style="text-decoration: none;">
                        <h6 class="mt-3">Ou Entrar com</h6>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 mb-3">
                    <div class="col-4 col-sm-auto m-sm-5">
                        <a href="#"><img src="{{ Vite::asset('resources/images/marcas/google-symbol.png') }}"
                                alt="" width="75" height="80"></a>
                    </div>
                    <div class="col-4 col-sm-auto m-sm-5">
                        <a href="#"><img src="{{ Vite::asset('resources/images/marcas/facebook-symbol.png') }}"
                                alt="" width="75" height="80"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
