@extends('layouts.template')

@section('title')
<div class="links">
   {{--   {{ $articles->total() }}  --}} Artigos 
    <a href="{{ route('articles.create') }}" class="links" title="Adicionar Artigo"><span><i class="fas fa-plus-circle"></i></span></a>
</div> 
@endsection

@section('content')
<div class="card-body">
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
            <input oninput="searchArticle()" autofocus="true" type="text" id="searchArticle" name="searchArticle" class="form-control" placeholder="Pesquise um artigo..." >   
    </div>
    <div id="searchResult">

    </div>
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
                        <div>
                            <a class="btn float-left btn-light btn-sm" href="#" title="Editar"><i class="fas fa-edit"></i></a>&nbsp
                            <a class="btn float-left btn-info btn-sm" href="#" title="Adicionar Documento"><i class="fas fa-plus-circle"></i></a>
                            <form id="form_article_destroy{{ $article->id }}" action="{{ route('articles.destroy', $article->id) }}" method="post" style="display:none">
                                {{ csrf_field() }}

                                {{ method_field('delete') }}
                                
                                </form>

                                <button type="submit" form="form_article_destroy{{ $article->id }}" class="btn float-left btn-danger btn-sm" title="Excluir" onclick="return confirm('Deseja realmente excluir o registro de {{ $article->title }}')"><i class="fa fa-trash" ></i></button>
                            
                        </div>
                        
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
      </table>
      
      <div class="links">
        {{--  {{ $articles->links() }}  --}}
    </div>
</div>
     
@endsection

@section('footer')
<div class="card-footer">
    <div class="d-flex justify-content-center links">
        Dica: Faça uma busca pelo item que procura  &nbsp <i class="far fa-smile-wink"></i>
    </div>
</div>
@endsection