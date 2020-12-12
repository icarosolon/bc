@extends('layouts.template')

@include('partials.navbar')

@section('title', 'Artigos')

@section('content')

<div class="card-body">
    <table class="table table-hover table-dark table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Documento</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td>
                        <a class="btn float-left btn-light btn-sm" href="#"><i class="fas fa-edit"></i></a>
                        <form id="form_article_destroy{{ $article->id }}" action="{{ route('articles.destroy', $article->id) }}" method="post" style="display:none">
                            {{ csrf_field() }}

                            {{ method_field('delete') }}
                            
                            </form>

                              <button type="submit" form="form_article_destroy{{ $article->id }}" class="btn float-right btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir o registro de {{ $article->title }}')"><i class="fa fa-trash" ></i></button>
                            
                    </td>
                    
                </tr>
            @endforeach
            
        </tbody>
      </table>
</div>

@endsection

@section('footer')
<div class="card-footer">
    <div class="d-flex justify-content-center links">
        Dica: Faça uma busca pelo item que procura  &nbsp <i class="far fa-smile-wink"></i>
    </div>
</div>
@endsection