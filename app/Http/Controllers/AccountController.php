<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return ['accounts' => Account::all()]; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'immeuble_id' => 'required|integer|exists:immeubles,id',
            'content' => 'required|string|min:10',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $account = Account::create($validator->validated());

        return response()->json([
            'message' => 'Account successfully created',
            'account' => $account
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required_without_all:immeuble_id,content|exists:users,id',
            'immeuble_id' => 'required_without_all:immeuble_id,content|integer|exists:immeubles,id',
            'content' => 'required_without_all:user_id,immeuble_id|string|min:10',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $account=Account::findOrFail($id);

        $account->update($validator->validated());

        return response()->json([
            'message' => 'Account successfully updated',
            'account' => $account
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $account = Account::findOrFail($id);

        $account->delete();

        return response()->json([
            'message' => 'Account successfully deleted',
        ], 200);
    }
}
