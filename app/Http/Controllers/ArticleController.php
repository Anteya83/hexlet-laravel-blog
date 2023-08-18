<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate();

         // Статьи передаются в шаблон
        ///compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
         return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
                         'name' => 'required|unique:articles',
                         'body' => 'required|min:10',//минимум 10 знаков
                     ]);
            
                     $article = new Article();
                     // Заполнение статьи данными из формы
                     $article->fill($data);
                    // При ошибках сохранения возникнет исключение
                     $article->save();
            
                     // Редирект на указанный маршрут
                    return redirect()
                        ->route('articles.index');
                
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article);
         return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        
        return view('article.edit', compact('article'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        
     $data =$this->validate($request, [
         // У обновления немного измененная валидация. В проверку уникальности добавляется название поля и id текущего объекта
         // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
         'name' => 'required|unique:articles,name,' . $article->id,
         'body' => 'required|min:100',
     ]);

     $article->fill($request->except('_token'));
     $article->save();
     return redirect()
         ->route('articles.index', $article);//
 }
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
       
   
       $article->delete();
     
     return redirect()->route('articles.index');//
 }
 
}
