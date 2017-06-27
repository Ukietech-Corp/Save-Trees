<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $categories = Category::paginate(5);
        return response(array(
            'error' => false,
            'categories' =>$categories->toArray(),
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
        Category::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'Category created successfully',
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
        $category = Category::find($id);
        return response(array(
            'error' => false,
            'category' =>$category,
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
        Category::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'Category updated successfully',
        ),200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Category::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'Category deleted successfully',
        ),200);
    }
}