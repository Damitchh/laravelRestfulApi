<?php

namespace App\Http\Controllers;

use App\Models\Bestproducts;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BestProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestproducts = Bestproducts::get();
        $response = [
            'message' => 'Daftar Tiket Dufan',
            'data' => $bestproducts
        ];

        return response() -> json($response, Response::HTTP_OK);
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
            'kode' => ['required'],
            'nama' => ['required'],
            'harga' => ['required', 'numeric'],
            'gambar' => ['required']
            
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            
        }

        try {
            $bestproducts = Bestproducts::create ($request->all());
            $response = [
                'message' => 'Tiket terdaftar!',
                'data' => $bestproducts
                
            ];
            
            return response() -> json($response, Response::HTTP_CREATED);
            
        } catch (QueryException $e) {
            return response() -> json([
                'message' => "Failed" . $e->errorInfo
                
            ]);
            
            
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
        $bestproducts = Bestproducts::findOrFail($id);
        $response = [
            'message' => 'Detail Daftar Tiket Dufan!',
            'data' => $bestproducts
            
        ];

        return response() -> json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bestproducts = Bestproducts::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'kode' => ['required'],
            'nama' => ['required'],
            'harga' => ['required', 'numeric'],
            'gambar' => ['required']
            
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
            
        }

        try {
            $bestproducts->update($request->all());
            $response = [
                'message' => 'Tiket terupdate!',
                'data' => $bestproducts
                
            ];
            
            return response() -> json($response, Response::HTTP_OK);
            
        } catch (QueryException $e) {
            return response() -> json([
                'message' => "Failed" . $e->errorInfo
                
            ]);
            
            
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
        $bestproducts = Bestproducts::findOrFail($id);
        

        try {
            $bestproducts->delete();
            $response = [
                'message' => 'Tiket terhapus!'
                
            ];
            
            return response() -> json($response, Response::HTTP_OK);
            
        } catch (QueryException $e) {
            return response() -> json([
                'message' => "Failed" . $e->errorInfo
                
            ]);
            
        }
        
    }
}