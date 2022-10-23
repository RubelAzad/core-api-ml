<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mhls;

class MhlController extends Controller
{
    public function getMlAll(Request $request)
    {
        return "ok";
    }
    public function mlStore(Request $request)
    {
        $lg_id = $request->lg_id;
        if (empty($lg_id)){
            return response()->json(['status' => 'error', 'message' => 'You must fill the fields']);
        }

        try {
            $mhls = new Mhls();
            $mhls->lg_id = $request->lg_id;

            if ($mhls->save()) {
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully']);
            }
        } catch (\Exception$e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
