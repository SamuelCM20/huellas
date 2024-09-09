<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    
    public function index($post_id)
    {
        $coordinates = Coordinate::where('post_id', $post_id)->first();
        return view('publications.coordinates', compact('coordinates'));
       
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $coordinate = new Coordinate($request->all());
        $coordinate->save();

        return response()->json(['message' => 'Publicacion y coordenadas guardada correctamente.'], 201);
    }

    
    public function show(Request $request, $coordinate)
    {
       
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Request $request, $post_id )
    {
        $coordinate = Coordinate::where('post_id', $post_id)->first();
        $coordinate->delete();
        if (!$request->ajax()) return back()->with("success", 'Coordinate deleted');
        return response()->json([], 204);
    }
}
