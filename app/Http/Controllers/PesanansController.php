<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PesanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanan::get();
        $response = [
            'message' => 'Daftar Pesanan',
            'data' =>  $pesanans
        ];

        return response()->json($response, Response::HTTP_OK);
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
            'no_ktp' => ['required', 'numeric'],
            'nama' => ['required']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pesanans = Pesanan::create($request->all());
            $response = [
                'message' => 'Pesanan terdaftar!',
                'data' =>  $pesanans

            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
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
        $pesanans = Pesanan::findOrFail($id);
        $response = [
            'message' => 'Detail Pesanan',
            'data' =>  $pesanans

        ];

        return response()->json($response, Response::HTTP_OK);
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
        $pesanans = Pesanan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'no_ktp' => ['required', 'numeric'],
            'nama' => ['required']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $pesanans->update($request->all());
            $response = [
                'message' => 'Pesanan terupdate!',
                'data' =>  $pesanans

            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
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
        $pesanans = Pesanan::findOrFail($id);


        try {
            $pesanans->delete();
            $response = [
                'message' => 'Pesanan terhapus!'

            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo

            ]);
        }
    }
}