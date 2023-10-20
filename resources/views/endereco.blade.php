@extends('layout')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('usuario'))
                    <p>Seja bem vindo {{ session('usuario')->nome }}</p>
                @endif
            </div>
        </div>
        <div class="row bg-light p-1 justify-content-center">
            <div class="col-md-auto">
                <h1 class="mt-2"><i class="bi bi-person-lines-fill"></i></h1>
            </div>
            <div class="col-md-8">
                <h1>Cadastro</h1>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('cadastrar_endereco') }}">
                @csrf
                <div class="row p-3 justify-content-center p-3">
                    <div class="col-12 col-sm-8">
                        <h3>Endereço</h3>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="col-12 col-sm-2">
                                    <div class="">
                                        <label for="cep"class="form-label" id="label-cep">CEP</label>
                                    </div>
                                    <div class="">
                                        <input class="form-control" @required(true) type="text"
                                            placeholder="Ex. 11111-111" aria-label="label-cep" id="cep"
                                            name="cep">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-12 col-sm-6">
                                <div class="">
                                    <label for="logradouro"class="form-label" id="label-name">Rua</label>
                                </div>
                                <div class="">
                                    <input class="form-control" @required(true) type="text"
                                        placeholder="Ex. Rua Jose Ferreira" aria-label="label-name" id="logradouro"
                                        name="logradouro">
                                </div>
                            </div>
                            <div class="col-6 col-sm-2">
                                <div class="">
                                    <label for="name"class="form-label" id="label-numero">Numero</label>
                                </div>
                                <div class="">
                                    <input class="form-control" @required(true) type="text" placeholder="Ex. 1234"
                                        aria-label="label-numero" id="numero" name="numero">
                                </div>
                            </div>
                            <div class="col-6 col-sm-2">
                                <div class="">
                                    <label for="complemento"class="form-label" id="label-complemento">Complemento</label>
                                </div>
                                <div class="">
                                    <input class="form-control" @required(true) type="text"
                                        placeholder="Ex. Casa, Predio, etc" aria-label="label-complemento" id="complemento"
                                        name="complemento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <label for="bairro" class="form-label" id="label-bairro">Bairro</label>
                                <input type="text" class="form-control" placeholder="Ex. Bairro da Gloria"
                                    @required(true) for="label-bairro" id="bairro" name="bairro">
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="cidade" class="form-label" id="label-cidade">Cidade</label>
                                <input type="text" class="form-control" placeholder="Ex. São Paulo" @required(true)
                                    for="label-cidade" id="cidade" name="cidade">
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="estado" class="form-label" id="label-cidade">Estado</label>
                                <input type="text" class="form-control" placeholder="Ex. São Paulo" @required(true)
                                    for="label-estado" id="estado" name="estado">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="d-flex justify-content-end col-12 col-sm-8">
                        {{-- <div class="g-recaptcha" data-sitekey="COLE-SUA-CHAVE-DE-SITE-AQUI"></div> --}}
                        <div class="col-12 col-sm-2 mt-3">
                            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function() {

            const cep = document.querySelector("input[id=cep]");

            cep.addEventListener('blur', e => {
                const value = cep.value.replace(/[^0-9]+/, '');
                const url = `https://viacep.com.br/ws/${value}/json/`;

                fetch(url)
                    .then(response => response.json())
                    .then(json => {

                        if (json.logradouro) {
                            document.querySelector('input[id=logradouro]').value = json.logradouro;
                            // document.querySelector('input[id=logradouro]').disabled = true;

                            document.querySelector('input[id=bairro]').value = json.bairro;
                            // document.querySelector('input[id=bairro]').disabled = true;

                            document.querySelector('input[id=cidade]').value = json.localidade;
                            // document.querySelector('input[id=cidade]').disabled = true;

                            // document.querySelector('input[id=estado]').disabled = true;
                            document.querySelector('input[id=estado]').value = json.uf;

                            document.querySelector('input[id=numero]').focus();
                        }
                    });
            });

        })();
    </script>
@endsection
