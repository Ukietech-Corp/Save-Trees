<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Problem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProblemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $problems = Problem::paginate(5);
        return response(array(
            'error' => false,
            'products' =>$problems->toArray(),
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
        Problem::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'Problem created successfully',
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
        $problem = Problem::find($id);
        return response(array(
            'error' => false,
            'problem' =>$problem,
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
        Problem::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'Problem updated successfully',
        ),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Problem::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'Problem deleted successfully',
        ),200);
    }
}
