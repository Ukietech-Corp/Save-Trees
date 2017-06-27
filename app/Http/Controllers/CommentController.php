<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $comments = Comment::paginate(5);
        return response(array(
            'error' => false,
            'comments' =>$comments->toArray(),
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
        Comment::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'Comment created successfully',
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
        $comment = Comment::find($id);
        return response(array(
            'error' => false,
            'comment' =>$comment,
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
        Comment::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'Comment updated successfully',
        ),200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Comment::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'Comment deleted successfully',
        ),200);
    }
}