
    <div class="row">
        @if (isset($data['lista']))
            @foreach ($data['lista'] as $prod)
                <div class="col-12 col-sm-3 mb-3">
                    <div class="card" id="produto">
                        <img src="{{ Vite::asset($prod->link_imagem) }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h2>{{ $prod->nome_produto }}</h2>
                            {{-- <div class="card-title">{{ $prod->descricao_produto }}</div> --}}
                            <h5 class="text-secondary">De: <spam class="text-decoration-line-through">
                                    {{ $prod->preco }}</spam>
                            </h5>
                            <h1 class="text-danger">{{ $prod->preco_promocional }}</h1>
                            <a href="{{ route('adicionar_carrinho', ['id_produto' => $prod->id]) }}" class="btn btn-success btn-sm">Adicionar ao carrinho</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Não há dados para serem exibidos</p>
        @endif
    </div>