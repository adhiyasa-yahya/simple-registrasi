<?php

namespace App\Http\Controllers\Api\V1\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrasiContoller extends Controller
{
    public function placeholder()
    {
        return ['welcome :)'];
    }

    public function data()
    {
        $data = User::al();

        return ['status' => true, 'data' => $data]; 
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $data = $request->all();

        try {
            $ins = User::updateOrCreate([
                'id'   => $id,
            ],$data);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => $th->getMessage()
            ], 500);
        }

        return ['status' => true, 'message' => $data]; 
    }
}
