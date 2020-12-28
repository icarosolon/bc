@extends('layouts.template')

@section('title','Adicionar Documento')

@section('content')
<div class="card-body">
    {{ $article }}
    <form method="POST" action="{{ route('documents.store') }}">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Input</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">{{ $article }}Choose file</label>
            </div>
          </div>
        <div class="input-group form-group form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-heading"></i></span>
            </div>
            <input type="text" id="title" name="title" class="form-control" placeholder="Título" required>   
        </div>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        <div class="input-group form-group form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bars"></i></span>
            </div>
            <textarea type="text" id="description" name="description" class="form-control" placeholder="Resumo" required></textarea>   
        </div>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
        <div class="input-group form-group form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <textarea type="text" id="keywords" name="keywords" class="form-control" placeholder="Palavras-chave" required></textarea>   
        </div>
        @if ($errors->has('keywords'))
            <span class="help-block">
                <strong>{{ $errors->first('keywords') }}</strong>
            </span>
        @endif
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn float-right login_btn">
        </div>
    </form>
</div>
     
@endsection

@section('footer')
<div class="card-footer">
    <div class="d-flex justify-content-center links">
        Dica: Faça uma busca pelo item que procura  &nbsp <i class="far fa-smile-wink"></i>
    </div>
</div>
@endsection