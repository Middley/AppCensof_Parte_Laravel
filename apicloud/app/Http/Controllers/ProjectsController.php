<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Projects;
use Validator;

class ProjectsController extends Controller
{
    public function index()
    {
 
    //para 
    $trees = Trees::select("projects.*")->get()->toArray();

                return response()->json($projects);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //permite crear un nuevo registro  
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            
            'fecha'=>'required|date',
            'name'=>'required|255', 
            'region'=>'required|255',
            'provincia'=>'required|255',
            'distrito'=>'required|255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }
        try {
            Projects::create($input);
            return response()->json([
                "ok" => true,
                "mensaje" => "Se registro con exito",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //funcion para mostrar, trae todo lo que está en una tabla x, en formato json
    public function show($id)
    {
        $projects = Projects::select("projects.*")
            ->where("projects.id", $id)
            ->first();
        return response()->json([
            "ok" => true,
           "data" => $projects,            
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //actualizar
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'fecha'=>'required|date',
            'name'=>'required|255', 
            'region'=>'required|255',
            'provincia'=>'required|255',
            'distrito'=>'required|255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }
        try {
            $projects = projects::find($id);
            if ($projects == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "No se encontro",
                ]);
            }
            $projects->update($input);
            return response()->json([
                "ok" => true,
                "mensaje" => "Se modifico con exito",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //remover un projecto, pasando como parametro un id, para eliminar
    public function destroy($id)
    {
        try {
            $projects = Projects::find($id);
            if ($projects == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "No se encontro",
                ]);
            }

            //se elimina
            $projects->delete([
            ]);
            return response()->json([
                "ok" => true,
                "mensaje" => "Se elimino con exito",
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
}
