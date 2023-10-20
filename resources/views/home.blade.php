@extends('layout')
@section('conteudo')
    <div class="col-12 col-sm-8 mb-3 h-100 text-center">
        @include('_produtos', ['lista' => $data])
    </div>
@endsection
