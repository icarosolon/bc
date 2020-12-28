<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Sector;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search)
            /* $articles = Article::orderByDesc('rank_search')
            ->orderByDesc('rank_like')->paginate(5); */
            $articles = Article::where('title', $request->input('search'))->get();
        else
            $articles = $articles = Article::orderByDesc('rank_search')
                ->orderByDesc('rank_like')->get();
        return view('articles.index', compact('articles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            $response =  'Artigo ' . $request->input('title') . ' criado com sucesso!';
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $response = $message;
        }
        $request->session()->flash('success', $response);
        return redirect()->route('articles.index');
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
    public function destroy(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->documents()->delete();
        $article->delete();
        $request->session()->flash('success', 'Artigo Deletado com sucesso!');
        return redirect()->back();
    }
}
