<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $photos = Photo::paginate(5);
        return response(array(
            'error' => false,
            'photos' =>$photos->toArray(),
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
        Photo::create($request->all());
        return response(array(
            'error' => false,
            'message' =>'Photo created successfully',
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
        $photo = Photo::find($id);
        return response(array(
            'error' => false,
            'photo' =>$photo,
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
        Photo::find($id)->update($request->all());
        return response(array(
            'error' => false,
            'message' =>'Photo updated successfully',
        ),200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Photo::find($id)->delete();
        return response(array(
            'error' => false,
            'message' =>'Photo deleted successfully',
        ),200);
    }
}