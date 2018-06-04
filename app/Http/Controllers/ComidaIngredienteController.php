<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ComidaIngrediente;
use App\Ingredientes;
use Response;
use Validator;

class ComidaIngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(ComidaIngrediente::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ingrediente'  => 'required'
        ]);
        if ( $validator->fails() ) {
            $returnData = array (
                'status' => 400,
                'message' => 'Invalid Parameters',
                'validator' => $validator
            );
            return Response::json($returnData, 400);
        }
        else {
            try {
                $newObject = new ComidaIngrediente();
                $newObject->nombre            = $request->get('nombre');
                $newObject->codigo            = $request->get('codigo');
                $newObject->costo             = $request->get('costo');
                $newObject->comida            = $request->get('comida');
                $newObject->combo             = $request->get('combo');
                $newObject->ingrediente       = $request->get('ingrediente');
                $newObject->save();
                return Response::json($newObject, 200);
            
            } catch (\Illuminate\Database\QueryException $e) {
                if($e->errorInfo[0] == '01000'){
                    $errorMessage = "Error Constraint";
                }  else {
                    $errorMessage = $e->getMessage();
                }
                $returnData = array (
                    'status' => 505,
                    'SQLState' => $e->errorInfo[0],
                    'message' => $errorMessage
                );
                return Response::json($returnData, 500);
            } catch (Exception $e) {
                $returnData = array (
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objectSee = ComidaIngrediente::find($id);
        if ($objectSee) {
            return Response::json($objectSee, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function ingredientesOfComida($id)
    {
        $objectSee1 = Ingredientes::all();
        $objectSee = ComidaIngrediente::whereRaw('comida=?',$id)->get();

        $ingredientes = [];

        if ($objectSee1) {
            foreach ($objectSee1 as $value1) {
                $value1->agregado = 0;
                $value1->addId = null;
                foreach ($objectSee as $value) {
                    if($value1->id == $value->ingrediente)
                    {
                        $value1->agregado = 1;
                        $value1->addId = $value->id;
                    }
                }
                array_push($ingredientes, $value1);
            }
            return Response::json($ingredientes, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    public function ingredientesOfCombo($id)
    {
        $objectSee1 = Ingredientes::all();
        $objectSee = ComidaIngrediente::whereRaw('combo=?',$id)->get();

        $ingredientes = [];

        if ($objectSee1) {
            foreach ($objectSee1 as $value1) {
                $value1->agregado = 0;
                $value1->addId = null;
                foreach ($objectSee as $value) {
                    if($value1->id == $value->ingrediente)
                    {
                        $value1->agregado = 1;
                        $value1->addId = $value->id;
                    }
                }
                array_push($ingredientes, $value1);
            }
            return Response::json($ingredientes, 200);
        
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objectUpdate = ComidaIngrediente::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->nombre            = $request->get('nombre', $objectUpdate->nombre);
                $objectUpdate->codigo            = $request->get('codigo', $objectUpdate->codigo);
                $objectUpdate->costo             = $request->get('costo', $objectUpdate->costo);
                $objectUpdate->estado            = $request->get('estado', $objectUpdate->estado);
                $objectUpdate->comida            = $request->get('comida', $objectUpdate->comida);
                $objectUpdate->ingrediente       = $request->get('ingrediente', $objectUpdate->ingrediente);
                
                $objectUpdate->save();
                return Response::json($objectUpdate, 200);
            } catch (\Illuminate\Database\QueryException $e) {
                if($e->errorInfo[0] == '01000'){
                    $errorMessage = "Error Constraint";
                }  else {
                    $errorMessage = $e->getMessage();
                }
                $returnData = array (
                    'status' => 505,
                    'SQLState' => $e->errorInfo[0],
                    'message' => $errorMessage
                );
                return Response::json($returnData, 500);
            } catch (Exception $e) {
                $returnData = array (
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objectDelete = ComidaIngrediente::find($id);
        if ($objectDelete) {
            try {
                ComidaIngrediente::destroy($id);
                return Response::json($objectDelete, 200);
            } catch (Exception $e) {
                $returnData = array (
                    'status' => 500,
                    'message' => $e->getMessage()
                );
                return Response::json($returnData, 500);
            }
        }
        else {
            $returnData = array (
                'status' => 404,
                'message' => 'No record found'
            );
            return Response::json($returnData, 404);
        }
    }
}
