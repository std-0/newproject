<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Отобразить список всех статей.
     *
     * @return \Illuminate\Http\Response
     */


     public function indexHome()
     {
         $articles = Article::limit(6)->get();
         return view('index', ['articles' => $articles]);
     }
 
     public function about()
     {
         return view('partials.about');
     }
 
     public function contact()
     {
         return view('partials.contact');
     }
 
     public function index()
     {
         $articles = Article::all();
         return view('articles.index', compact('articles'));
     }
 
     public function viewAllArticles()
     {
         $articles = Article::all();
         return view('articles.view_all', compact('articles'));
     }
 
     public function create()
     {
         $categories = Category::all();
         return view('articles.create', compact('categories'));
     }



    /**
     * Сохранить новую статью.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;


        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {

            $imageName = 'logo.png';
        }

        $article = new Article([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imageName,
        ]);

        if ($request->has('category')) {
            $article->category_id = $request->input('category');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Articolul a fost creat cu succes.');
    }





    /**
     * Отобразить конкретную статью.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Показать форму для редактирования статьи.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all(); // Aduceți toate categoriile din baza de date
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Обновить статью в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $article = Article::find($id);
        $article->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Articolul a fost actualizat cu succes.');

    }

    /**
     * Удалить статью из хранилища.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::find($id);

        if ($article->image && file_exists(public_path('images/' . $article->image))) {
            unlink(public_path('images/' . $article->image));
        }
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Articolul a fost șters cu succes.');
    }

}