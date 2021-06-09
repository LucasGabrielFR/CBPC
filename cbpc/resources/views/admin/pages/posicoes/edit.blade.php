@extends('adminlte::page')

@section('title', 'Editar Posicão')

@section('content_header')
    <h1>Editar Posicão  <b>{{ $posicao->nome }}</b></h1>
@stop

@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('posicoes.update',$posicao->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.posicoes._partials.form')
            </form>
        </div>
    </div>
</div>
@stop
