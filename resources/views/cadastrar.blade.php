@extends('layout')
@section('conteudo')
    <div class="container">
        <div class="row bg-light p-1 justify-content-center">
            <div class="col-md-auto">
                <h1 class="mt-2"><i class="bi bi-person-lines-fill"></i></h1>
            </div>
            <div class="col-md-8">
                @if (session('usuario'))
                    <h1>Atualizar</h1>
                    <h3>Cliente {{ $data['usuario']->nome }}</h3>
                @else
                    <h1>Cadastro</h1>
                @endif
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('cadastrar_cliente') }}">
                @csrf
                <div class="row p-3 justify-content-center">
                    <div class="col-12 col-sm-4">
                        <h3>Dados Pessoais</h3>
                        <div class="row">
                            <div class="">
                                <label for="nome" class="form-label" id="label-nome">Nome</label>
                            </div>
                            <div class="">
                                <input class="form-control" @required(true) type="text" placeholder="Nome"
                                    aria-label="label-nome" id="nome" name="nome"
                                    @if (session('usuario')) value="{{ $data['usuario']->nome }}" @endif>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-6">
                                <div class="col-auto">
                                    <label for="cpf" class="col-form-label" id="label-cpf">CPF</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="cpf" class="form-control" aria-describedby="textcpf"
                                        aria-label="label-cpf" placeholder="000.000.000-00" name="cpf"
                                        onkeyup="formatarCPF()"
                                        @if (session('usuario')) value="{{ $data['usuario']->cpf }}" @endif>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-auto">
                                    <label for="telefone" class="col-form-label">Telefone</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="telefoine" class="form-control" aria-describedby="telefone"
                                        placeholder="(00)00000-0000" name="telefone" onkeyup="formatarTelefone()"
                                        @if (session('usuario')) value="{{ $data['usuario']->telefone }}" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-6">
                                <label for="data_nascimento" class="col-form-label" id="label-data-nascimento">Data de
                                    Nascimento</label>
                                <input type="text" id="data_nascimento" class="form-control"
                                    aria-describedby="data_nascimento" placeholder="00/00/0000" name="data_nascimento"
                                    onkeyup="formatarData()"
                                    @if (session('usuario')) value="{{ implode('/', array_reverse(explode('-', $data['usuario']->data_nascimento))) }}" @endif>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label for="genero" class="col-form-label">Gênero</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-auto">
                                        <input class="form-check-input" type="radio" name="genero" id="feminino"
                                            value="feminino" name="feminino"
                                            @if (session('usuario') && $data['usuario']->genero == 'feminino') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="col-md-auto">
                                        <input class="form-check-input" type="radio" name="genero" id="masculino"
                                            @if (session('usuario') && $data['usuario']->genero == 'masculino') checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Masculino
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- segunda metade do form --}}

                    <div class="col-12 col-sm-4">
                        <h3>Dados de acesso</h3>
                        <div class="row">
                            <div class="">
                                <label for="email" class="form-label" id="label-mail">E-mail</label>
                            </div>
                            <div class="">
                                <input class="form-control" type="e-mail" placeholder="email@example.com"
                                    aria-label="label-email" id="email" name="email"
                                    @if (session('usuario')) value="{{ $data['usuario']->email }}" @endif>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-6">
                                <div class="col-auto">
                                    <label for="password" class="col-form-label">Senha</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="password" class="form-control"
                                        aria-describedby="textpassword" placeholder="************" autocomplete="off"
                                        name="password"
                                        @if (session('usuario')) value="{{ $data['usuario']->password }}" @endif>
                                </div>
                            </div>
                            @if (!session('usuario'))
                                <div class="col-6">
                                    <div class="col-auto">
                                        <label for="inputPassword" class="col-form-label">Repita a senha</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="password" id="password2" class="form-control"
                                            aria-describedby="textpassword" placeholder="************" autocomplete="off"
                                            name="senha2">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="d-flex justify-content-end col-12 col-sm-8">
                        {{-- <div class="g-recaptcha" data-sitekey="COLE-SUA-CHAVE-DE-SITE-AQUI"></div> --}}
                        <div class="col-12 col-sm-2">
                            <button type="submit" class="btn btn-success w-100">
                                @if (!session('usuario'))
                                    Cadastrar
                                @else
                                    Atualizar
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
                {{-- botão que abre o modal de politica de privacidade de dados --}}
                <!-- Scrollable modal -->
                <div class="row justify-content-center mt-3">
                    <div class="col-8">
                        <a type="" href="#" class="text-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-shield-fill-check"></i>
                            Privacidade de dados
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes sobre Privacidade
                                                de dados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            De acordo com a Lei Geral de Proteção de Dados Pessoais (LGPD), para que os seus
                                            dados pessoais estejam seguros e possam ser utilizados apenas nos benefícios que
                                            você deseja, é necessário que você consinta o uso deles.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </form>
        </div>
        {{-- div para login google --}}
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
    <script>
        const cpf = document.getElementById("cpf");
        const data_nascimento = document.getElementById("data_nascimento");
        const telefone = document.getElementById("telefone");

        function formatarTelefone(f) {

            // var t = e.target.value.replace(/\D/g, "");

            // t = t.replace(/^(\d\d)(\d)/g, "($1)$2");

            // t = t.replace(/(\d{5})(\d)/, "$1-$2");

            // f.target.value = t;
            telefone.mask('(00)00000-0000');
        }

        function formatarCPF(e) {

            var v = e.target.value.replace(/\D/g, "");

            v = v.replace(/(\d{3})(\d)/, "$1.$2");

            v = v.replace(/(\d{3})(\d)/, "$1.$2");

            v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

            e.target.value = v;

        }

        function formatarData(e) {

            var v = e.target.value.replace(/\D/g, "");

            v = v.replace(/(\d{2})(\d)/, "$1/$2")

            v = v.replace(/(\d{2})(\d)/, "$1/$2")

            e.target.value = v;


        }
        cpf.addEventListener("keyup", formatarCPF);

        telefone.addEventListener("keyup", formatarTelefone);

        data_nascimento.addEventListener("keyup", formatarData);
    </script>
@endsection
