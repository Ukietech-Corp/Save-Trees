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
    public function index($id = null) {
        if ($id == null) {
            return Problem::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $problem = new Problem;

        $problem->name = $request->input('name');
        $problem->description = $request->input('description');
        $problem->created_at = Carbon::now();
        $problem->save();

        return 'Problem record successfully created with id ' . $problem->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Problem::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $problem = Problem::find($id);

        $problem->name = $request->input('name');
        $problem->description = $request->input('email');
        $problem->completed = $request->input('completed');
        $problem->updated_at = Carbon::now();
        $problem->save();

        return "Sucess updating problem #" . $problem->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $problem = Problem::find($request->input('id'));

        $problem->delete();

        return "Problem record successfully deleted #" . $request->input('id');
    }
}
