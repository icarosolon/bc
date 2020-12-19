<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\ApiMessages;
use App\Article;
use App\Sector;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderByDesc('rank_search')
            ->orderByDesc('rank_like')
            ->get();
        return response()->json($articles);
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
            $sector = $request->input('sector_id');
            if ($sector) {
                $sector = Sector::findOrFail($sector);
                $sector->articles()->create($request->all());
            } else {
                Article::create($request->all());
            }


            $response = ['Status' => 'Artigo ' . $request->input('title') . ' criado com sucesso!'];
            $statusCode = 201;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }

        return $response = response()->json($response, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->rank_search++;
            $article->update(['rank_search' => $article->rank_search]);
            $response = $article;
            $statusCode = 200;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }
        return response()->json($response, $statusCode);
    }

    //Definir pesquisa por tipo de equipamento
    public function search($termo)
    {
        //$response->header('Access-Control-Allow-Origin: *');
        try {
            /* $response = Article::where('title', 'like',  '%' . $termo . '%')
                                    ->orWhere('description', 'like',  '%' . $termo . '%')
                                    ->orWhere('keywords', 'like',  '%' . $termo . '%')
                                    ->get();
             */

            $termo = str_replace(' ', '%', $termo ); //trocando contrabarra por barra. Segundo parametro pega o resultado
            

            $response = Article::leftJoin('documents', 'articles.id', '=', 'documents.article_id')
                ->where('title', 'like',  '%' . $termo . '%')
                ->orWhere('description', 'like',  '%' . $termo . '%')
                ->orWhere('keywords', 'like',  '%' . $termo . '%')
                ->get();

            $statusCode = 200;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 406;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documents($id)
    {
        try {
            $article = Article::findOrFail($id);
            $response = $article->documents;
            $statusCode = 200;
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            $response = $message->getMessage();
            $statusCode = 401;
        }
        return response()->json($response, $statusCode);
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
