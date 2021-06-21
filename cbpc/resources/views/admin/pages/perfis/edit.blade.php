@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>Editar Perfil  <b>{{ $profile->nome }}</b></h1>
@stop

@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('perfis.update',$profile->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.perfis._partials.form')
            </form>
        </div>
    </div>
</div>
@stop
