<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $files = File::paginate(5);
        return response(array(
            'error' => false,
            'files' =>$files->toArray(),
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
        File::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'File created successfully',
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
        $file = File::find($id);
        return response(array(
            'error' => false,
            'file' =>$file,
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
        File::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'File updated successfully',
        ),200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        File::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'File deleted successfully',
        ),200);
    }
}