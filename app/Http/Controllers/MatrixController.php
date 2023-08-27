<?php

namespace App\Http\Controllers;

use App\Http\ResponseMessage\ResponseMessage;
use App\Http\StatusCode\StatusCode;
use Illuminate\Http\Request;
use App\Models\Matrix;

class MatrixController extends Controller
{
    //[Get] /matrices
    public function getMatrices()
    {
        try {
            $matrices = Matrix::all();
            return response()->json([
                "data" =>  $matrices,
                "message" => ResponseMessage::OK,
                "status" => StatusCode::ok,
                "error" => false
            ], StatusCode::ok);
        } catch (\Throwable $error) {
            return response()->json([
                "data" => $error,
                "message" => ResponseMessage::INTERNAL_SERVER_ERROR,
                "status" => StatusCode::internalServerError,
                "error" => true
            ], StatusCode::internalServerError);
        }
    }

    //[get] /matrix/{id}
    public function getDetailsMatrix($id)
    {
        try {
            $matrix = Matrix::findOrFail($id);
            return response()->json([
                "data" =>  $matrix,
                "message" => ResponseMessage::OK,
                "status" => StatusCode::ok,
                "error" => false
            ], StatusCode::ok);
        } catch (\Throwable $error) {
            return response()->json([
                "data" => $error,
                "message" => ResponseMessage::NOT_FOUND,
                "status" => StatusCode::notFound,
                "error" => true
            ], StatusCode::notFound);
        }
    }

    //[POST] /matrix
    public function createMatrix(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "name" => "required",
                'row' => 'required',
                "columns" => 'required',
            ]);

            $matrix = Matrix::create($validatedData);

            return response()->json([
                "data" => $matrix,
                "message" => ResponseMessage::CREATED,
                "status" => StatusCode::created,
                "error" => false
            ], StatusCode::created);
        } catch (\Throwable $error) {
            return response()->json([
                "data" => $error,
                "message" => ResponseMessage::INTERNAL_SERVER_ERROR,
                "status" => StatusCode::internalServerError,
                "error" => true
            ], StatusCode::internalServerError);
        }
    }

    //[PUT] matrix/{id}
    public function updateMatrix(Request $request, $id)
    {
        try {
            $matrix = Matrix::findOrFail(intval($id));
            if (!$matrix) {
                return response()->json([
                    "data" => null,
                    "message" => ResponseMessage::NOT_FOUND,
                    "status" => StatusCode::notFound,
                    "error" => true
                ], StatusCode::notFound);
            } else {
                $matrix->update($request->all());
                return response()->json([
                    "data" => $matrix,
                    "message" => ResponseMessage::CREATED,
                    "status" => StatusCode::created,
                    "error" => false
                ], StatusCode::created);
            }
        } catch (\Throwable $error) {
            return response()->json([
                "data" => $error,
                "message" => ResponseMessage::INTERNAL_SERVER_ERROR,
                "status" => StatusCode::internalServerError,
                "error" => true
            ], StatusCode::internalServerError);
        }
    }

    public function destroy($id)
    {
        try {
            $matrix = Matrix::find(intval($id));
            if (!$matrix) {
                return response()->json([
                    "data" => null,
                    "message" => ResponseMessage::NOT_FOUND,
                    "status" => StatusCode::notFound,
                    "error" => true
                ], StatusCode::notFound);
            } else {
                $matrix->delete();
                return response()->json([
                    "data" => $matrix,
                    "message" => ResponseMessage::OK,
                    "status" => StatusCode::ok,
                    "error" => false
                ], StatusCode::ok);
            }
        } catch (\Throwable $error) {
            return response()->json([
                "data" => $error,
                "message" => ResponseMessage::INTERNAL_SERVER_ERROR,
                "status" => StatusCode::internalServerError,
                "error" => true
            ], StatusCode::internalServerError);
        }
    }
}
