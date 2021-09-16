<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ImmeubleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return ['immeubles' => Immeuble::all()]; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|between:2,100',
            'name' => 'required|string|between:2,100',
            'code_soc' => 'required|integer',
            'code_im' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $immeuble = Immeuble::create($validator->validated());

        return response()->json([
            'message' => 'Immeuble successfully created',
            'immeuble' => $immeuble
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [
            'address' => 'required_without_all:name,code_soc,code_im|string|between:2,100',
            'name' => 'required_without_all:address,code_soc,code_im|string|between:2,100',
            'code_soc' => 'required_without_all:address,name,code_im|integer',
            'code_im' => 'required_without_all:address,name,code_soc,code_im|integer'
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $immeuble = Immeuble::findOrFail($id);

        $immeuble->update($validator->validated());

        return response()->json([
            'message' => 'Immeuble successfully updated',
            'immeuble' => $immeuble
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $immeuble = Immeuble::findOrFail($id);

        $immeuble->delete();

        return response()->json([
            'message' => 'Immeuble successfully deleted',
        ], 200);
        

        
    }
    
}
