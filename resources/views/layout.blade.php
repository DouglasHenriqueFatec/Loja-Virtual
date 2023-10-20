<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Site Farmacia</title>

    {{-- css e js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
    <link rel="stylesheet" href="{{ Vite::asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ Vite::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Vite::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    @yield('scripts')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Popular Farma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('categoria') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('categoria') }}" class="dropdown-item">Todas as Categorias</a></li>
                            {{-- LISTAGEM DE CATEGORIAS --}}
                            @if (isset($data['categorias']))
                                @foreach ($data['categorias'] as $cat)
                                    <li><a class="dropdown-item"
                                            href="{{ route('categoria_por_id', ['id_categoria' => $cat->id]) }}">{{ $cat->nome_categoria }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Medicamentos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Genericos</a></li>
                            <li><a class="dropdown-item" href="#">Eticos</a></li>
                            <li><a class="dropdown-item" href="#">Similares</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Saude e Beleza
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cadastrar') }}">Cadastrar</a>
                    </li>
                </ul>
                <nav class="navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            @if (isset(session('usuario')['usuario_id']))
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-fill"></i>
                                    {{ session('usuario')['usuario_nome'] }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        {{-- {{ $id_usuario = session('usuario')['usuario_id'] }} --}}
                                        <a href="{{ route('atualizar') }}" class="dropdown-item">Editar Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                    </li>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}" >
                                        <i class="bi bi-person-fill"></i>
                                        Entrar / Cadastrar
                                    </a>
                            @endif
                        </li>
                    </ul>
                </nav>
                <a href="{{ route('ver_carrinho') }}" class="btn btn-sm">
                    <h3><i class="fa fa-shopping-cart"></i></h3>
                </a>
            </div>
        </div>
    </nav>
    {{-- card de produtos --}}
    <div class="container-fluid">
        <div class="row mt-3 justify-content-center">
            {{-- conteudo --}}
            @yield('conteudo')
        </div>
    </div>

    <div class="position-relative">
        <div class="position-fixed bottom-0">
            Footer
        </div>
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // make it as accordion for smaller screens
        if (window.innerWidth > 992) {

            document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem) {

                everyitem.addEventListener('mouseover', function(e) {

                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if (el_link != null) {
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.add('show');
                        nextEl.classList.add('show');
                    }

                });
                everyitem.addEventListener('mouseleave', function(e) {
                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if (el_link != null) {
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.remove('show');
                        nextEl.classList.remove('show');
                    }


                })
            });

        }
        // end if innerWidth

    });
    // DOMContentLoaded  end
</script>
<style>
    #produto:hover {
        padding: 1px;
        box-shadow: 5px 5px 10px gray;
        cursor: pointer;
    }
</style>
