<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $article = $request->input('id');
        return view('documents.create', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            if(!empty($request->input('article_id'))){
                $article = $request->input('article_id');
                $article = Article::findOrFail($article);
            }else{
                return $response = [
                    'Status' => 'Informe o id de um artigo!'
                ];
            }

            if (empty($nameFile)){
                $nameFile = null;
            }
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('document') && $request->file('document')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));
                // Recupera a extensão do arquivo
                $extension = $request->document->extension();
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";
                // Faz o upload:
                $upload = $request->document->storeAs('documents', $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/documents/nomedinamicoarquivo.extensao
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if (!$upload)
                    $response = [
                        'Status' => 'Falha no upload do arquivo!'
                    ];
                    $statusCode = 500;
            }
            //Inserindo artigo no banco de acordo com a requisição e nome do arquivo sendo o endereço
            $document = $article->documents()->create([
                'article_id' => $request->input('article_id'),
                'name' => $request->input('name'),
                'document' => $nameFile
            ]);

            $response = [
                'Status' => 'Documento '. $document->name . ' inserido com sucesso no artigo ' . $document->article->title . '!'
            ];
            $statusCode = 200;

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
