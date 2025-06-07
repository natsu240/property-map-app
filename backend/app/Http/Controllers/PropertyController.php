<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Property;

class PropertyController extends Controller
{
    /*
     * 物件一覧取得
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProperties(): JsonResponse
    {
        $properties = Property::all();
        return response()->json($properties);
    }

    /*
     * 物件更新
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProperty(Request $request, int $id): JsonResponse
    {
        $property = Property::find($id);

        // 物件が存在しない場合は404エラーを返す
        if (!$property) {
            return abort(404);
        }

        $property->update($request->all());
        return response()->json($property);
    }

    /*
     * 物件登録
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProperty(Request $request): JsonResponse
    {
        $property = Property::create($request->all());
        return response()->json($property, 201);
    }
}
