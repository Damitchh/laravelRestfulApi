<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjangs = Keranjang::get();
        $response = [
            'message' => 'Daftar Produk dalam Keranjang',
            'data' => $keranjangs
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
            'jumlah_pemesanan' => ['required']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $keranjangs = Keranjang::create($request->all());
            $response = [
                'message' => 'Keranjang terdaftar!',
                'data' => $keranjangs

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
        $keranjangs = Keranjang::findOrFail($id);
        $response = [
            'message' => 'Detail Keranjang!',
            'data' => $keranjangs

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
        $keranjangs = Keranjang::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'jumlah_pemesanan' => ['required']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $keranjangs->update($request->all());
            $response = [
                'message' => 'Keranjang terupdate!',
                'data' => $keranjangs

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
        $keranjangs = Keranjang::findOrFail($id);


        try {
            $keranjangs->delete();
            $response = [
                'message' => 'Keranjang terhapus!'

            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo

            ]);
        }
    }
}