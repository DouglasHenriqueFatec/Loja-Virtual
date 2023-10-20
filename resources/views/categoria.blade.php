@extends('layout')
@section('conteudo')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-2">
            <div class="list-group">
                {{-- LISTAGEM DE CATEGORIAS --}}
                @if (isset($data['categorias']))
                    @foreach ($data['categorias'] as $cat)
                        <a class="list-group-item list-group-item-action @if ($cat->id == $data['id_categoria']) active @endif"
                            href="{{ route('categoria_por_id', ['id_categoria' => $cat->id]) }}">{{ $cat->nome_categoria }}</a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-12 col-sm-10 mb-3 h-100 text-center">
            @include('_produtos', ['lista' => $data])
        </div>
    </div>
@endsection
