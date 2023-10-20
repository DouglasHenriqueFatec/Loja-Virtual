@extends('layout')
@section('conteudo')
    <div class="col-12 col-sm-6">
        <h1 class="mb-5">Carrinho de compras</h1>
        @if (isset($data['cart']) && count($data['cart']) > 0)
            <table class="table table-light p-5">
                <tbody>
                    @foreach ($data['cart'] as $indice => $itens)
                        <tr>
                            <td>{{ $itens->nome_produto }}</td>
                            <td><img src="{{ Vite::asset($itens->link_imagem) }}" alt="" class="" height="50"
                                    width="50"></td>
                            <td>R${{ $itens->preco_promocional }}</td>
                            <td><a class="btn btn-danger btn-sm"
                                    href="{{ route('excluir_carrinho', ['indice' => $indice]) }}"><i
                                        class="bi bi-trash me-1"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-light" role="alert">
                Seu carrinho está vazio!
            </div>
        @endif
        <div class="col-12 col-sm-6">
            <div class="row mb-3 mb-sm-0">
                <div class="col-12 col-sm-auto">
                    <label for="cep" class="form-label">CEP</label>
                </div>
                <div class="col-12 col-sm-8">
                    <input type="text" name="cep" id="cep" placeholder="Ex. 00000-000" class="form-control"
                    @if (session('usuario')) value="{{ session('usuario')['usuario_cep'] }}" @endif>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 m-sm-5">
        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Subheading</div>
                    Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Subheading</div>
                    Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Subheading</div>
                    Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
        </ol>
    </div>
@endsection
