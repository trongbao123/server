<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatrixCell;
use App\Http\ResponseMessage\ResponseMessage;
use App\Http\StatusCode\StatusCode;


class MatrixCellController extends Controller
{
    //[GET] /matrix-cells
    public function getMatricCell()
    {
        try {
            $matrixCells = MatrixCell::all();
            return response()->json([
                "data" => $matrixCells,
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

    //[GET] /matrix-cells/{id}
    public function getDetailsMactricCell($id)
    {
        try {
            $matrixCell = MatrixCell::findOrFail($id);
            return response()->json([
                "data" => $matrixCell,
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

    //[POST] /matrix-cells
    public function createMatricCell(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'matrix_id' => 'required',
                "row_number" => "required",
                'column_number' => 'required|integer',
                "label" => 'required',
                "attribute" => 'required',
                
            ]);

            $matrixCell = MatrixCell::create($validatedData);

            return response()->json([
                "data" => $matrixCell,
                "message" => ResponseMessage::CREATED,
                "status" => StatusCode::created,
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

    // //[PUT] /matrix-cells/{id}
    public function updateMatricCell(Request $request, $id)
    {
        try {
            $matrixCell = MatrixCell::findOrFail(intval($id));
            if (!$matrixCell) {
                return response()->json([
                    "data" => null,
                    "message" => ResponseMessage::NOT_FOUND,
                    "status" => StatusCode::notFound,
                    "error" => true
                ], StatusCode::notFound);
            } else {
                $matrixCell->update($request->all());
                return response()->json([
                    "data" => $matrixCell,
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

    //[delete] /matrix-cells/{id}
    public function deleteMatricCell($id)
    {
        try {
            $matrixCell = MatrixCell::find(intval($id));
            if (!$matrixCell) {
                return response()->json([
                    "data" => null,
                    "message" => ResponseMessage::NOT_FOUND,
                    "status" => StatusCode::notFound,
                    "error" => true
                ], StatusCode::notFound);
            } else {
                $matrixCell->delete();
                return response()->json([
                    "data" => $matrixCell,
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
