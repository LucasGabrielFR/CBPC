{{-- @include('admin.includes.alerts') --}}
<div class="form-group">
    <label>Nome da Posicão</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $posicao->nome ?? old('nome')}}">
</div>
<div class="form-group">
    <label>Sigla</label>
    <input type="text" name="sigla" class="form-control" placeholder="Sigla" value="{{ $posicao->sigla ?? old('sigla') }}">
</div>
<div class="form-group">
    <label>Setor</label>
    <input type="text" name="setor" class="form-control" placeholder="Setor" value="{{ $posicao->setor ?? old('setor') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
