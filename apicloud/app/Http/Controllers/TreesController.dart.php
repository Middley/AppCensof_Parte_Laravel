<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Trees;
use Validator;

class TreesController extends Controller
{
    //funcion que me devuelve los arboles ya registrados
    public function index()
    {
    $trees = Trees::select("trees.*")->get()->toArray();

                return response()->json($trees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //permite crear un nuevo registro  de arboles
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_project'=>'required|numeric',
            'nombre_comun'=>'required|unique:trees|max:100',
            'nombre_cientifico'=>'required|unique:trees|max:100',
            'altura'=>'required|numeric',
            'coor_este'=>'required|numeric',
            'coor_norte'=>'required|numeric',
            'observaciones'=>'required',
            'fecha'=>'required|date'
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }
        try {
            Trees::create($input);
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
         $trees = Trees::select("trees.*")
             ->where("trees.id", $id)
             ->first();
         return response()->json([
             "ok" => true,
            "data" => $trees,            
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
    public function update(Request $request, $id) {
         $input = $request->all();
         $validator = Validator::make($input, [

            'id_project'=>'required|numeric',
            'nombre_comun'=>'required|unique:trees|max:100',
            'nombre_cientifico'=>'required|unique:trees|max:100',
            'altura'=>'required|numeric',
            'coor_este'=>'required|numeric',
            'coor_norte'=>'required|numeric',
            'observaciones'=>'required',
            'fecha'=>'required|date'
         ]);
         if ($validator->fails()) {
             return response()->json([
                  'ok' => false,
                 'error' => $validator->messages(),
             ]);
         }
         try {
             $trees = Trees::find($id);
             if ($trees == false) {
                 return response()->json([
                     "ok" => false,
                     "error" => "No se encontro",
                 ]);
             }
             $trees->update($input);
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
 
     //remover un producto, pasando como parametro un id, para eliminar
     public function destroy($id)
     {
         try {
             $trees = Trees::find($id);
             if ($trees == false) {
                 return response()->json([
                     "ok" => false,
                     "error" => "No se encontro",
                 ]);
             }
 
             //se elimina
             $trees->delete([
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
