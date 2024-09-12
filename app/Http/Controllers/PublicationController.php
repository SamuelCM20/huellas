<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Http\Traits\UploadFile;
use App\Models\File;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    use UploadFile;

    public function index(Request $request)
    {
        $publications = Publication::with('user.file', 'file')->get();
        if (!$request->ajax()) return view("publications.index",compact('publications'));
        return response()->json(['publications' => $publications], 200);
    }

    
    public function create()
    {
        //
    }

    
    public function store(PublicationRequest $request)
    {
        $Isfile = true;
        if (!$request->hasFile('file')) {
            unset($request['file']);
            $Isfile = false;
        };


        try {
            DB::beginTransaction();
            $publication = new Publication($request->all());
            $publication->user_id = Auth::id();

            if(!$publication->breed) $publication->breed = 'No especificada';
            $publication->save();

            if (!$Isfile) {
                $file = new File(['route' => '/storage/images/publications/default.jpeg']);
                $publication->file()->save($file);
            } else {
                $this->uploadFile($publication, $request);
                $publication->save();
            }
            DB::commit();
            return response()->json(['id' => $publication->id], 201);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Request $request, Publication $publication)
    {
        $publication->delete();
        if (!$request->ajax()) return back()->with("success", 'Publication deleted');
        return response()->json([], 204);
    }
}
