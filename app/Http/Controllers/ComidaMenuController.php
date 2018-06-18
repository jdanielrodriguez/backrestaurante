<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ComidaMenu;
use App\ComidaMenuIngrediente;
use App\ComidaIngrediente;
use Response;
use Validator;

class ComidaMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json(ComidaMenu::with('ingredientes')->get(), 200);
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
            'comida'       => 'required',
            'menu'         => 'required',
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
                $newObject = new ComidaMenu();
                $newObject->nombre            = $request->get('nombre');
                $newObject->codigo            = $request->get('codigo');
                $newObject->costo             = $request->get('costo');
                $newObject->comida            = $request->get('comida');
                $newObject->combo             = $request->get('combo');
                $newObject->menu              = $request->get('menu');
                $newObject->save();
                // $objectSee = ComidaIngrediente::whereRaw('comida=?',$newObject->comida)->get();
                // if ($objectSee) {
                //     foreach ($objectSee as $variable) {
                //         $newObject2 = new ComidaMenuIngrediente();
                //         $newObject2->comida_menu       = $newObject->id;
                //         $newObject2->ingrediente       = $variable->ingrediente;
                //         $newObject2->save();
                //     }
                //     $newObject->ingredientes;
                //     return Response::json($newObject, 200);
                
                // }
                // else {
                //     $returnData = array (
                //         'status' => 404,
                //         'message' => 'No record found'
                //     );
                //     return Response::json($returnData, 404);
                // }
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
        $objectSee = ComidaMenu::find($id);
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
        $objectUpdate = ComidaMenu::find($id);
        if ($objectUpdate) {
            try {
                $objectUpdate->nombre            = $request->get('nombre', $objectUpdate->nombre);
                $objectUpdate->codigo            = $request->get('codigo', $objectUpdate->codigo);
                $objectUpdate->costo             = $request->get('costo', $objectUpdate->costo);
                $objectUpdate->estado            = $request->get('estado', $objectUpdate->estado);
                $objectUpdate->comida            = $request->get('comida', $objectUpdate->comida);
                $objectUpdate->combo             = $request->get('combo', $objectUpdate->combo);
                $objectUpdate->menu              = $request->get('menu', $objectUpdate->menu);
                
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
        $objectDelete = ComidaMenu::find($id);
        if ($objectDelete) {
            try {
                ComidaMenu::destroy($id);
                $objectSee = ComidaMenuIngrediente::whereRaw('comida_menu=?',$id)->get();
                if ($objectSee) {
                    foreach ($objectSee as $variable) {
                        $objectDelete = ComidaMenuIngrediente::find($variable->id);
                        if ($objectDelete) {
                            try {
                                ComidaMenuIngrediente::destroy($id);
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
                    return Response::json($objectDelete, 200);
                
                }
                else {
                    $returnData = array (
                        'status' => 404,
                        'message' => 'No record found'
                    );
                    return Response::json($returnData, 404);
                }
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
