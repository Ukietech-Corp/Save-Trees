<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $articles = Article::paginate(5);
        return response(array(
            'error' => false,
            'articles' =>$articles->toArray(),
        ),200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'Article created successfully',
        ),200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return response(array(
            'error' => false,
            'article' =>$article,
        ),200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        Article::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'Article updated successfully',
        ),200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Article::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'Article deleted successfully',
        ),200);
    }
}