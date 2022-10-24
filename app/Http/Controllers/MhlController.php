<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mhls;

class MhlController extends Controller
{
    /**
     * @method_name :- getMlAll
     * -------------------------------------------------------- 
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:48:59
     * description :- See the all license data list
     */
    public function getMlAll()
    {
        try {
                $mlAll = Mhls::select('l_id','lg_id','created_at','updated_at')->get();
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully', 'Data'=> $mlAll]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }
    /**
     * @method_name :- mlStore
     * -------------------------------------------------------- 
     * @param  :-  $request
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:51:09
     * description :- first check lg_id then save the data into the database.
     */
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
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * @method_name :- mlEdit
     * -------------------------------------------------------- 
     * @param  :-  $id
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:53:01
     * description :- Id wise data license return.
     */
    public function mlEdit($id)
    {

        try {
            if(!empty($id)){
                $mhlsEdit = Mhls::where('l_id','=', $id)->get();
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully', 'Data'=> $mhlsEdit]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        
    }
    /**
     * @method_name :- method_name
     * -------------------------------------------------------- 
     * @param  :-  {{}|any}
     * ?return :-  {{}|any}
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:55:54
     * description :- A method is simply a “chunk” of code.
     */
    public function mlUpdate(Request $request, $id)
    {
        try {
            $mlUpdate = Mhls::where('l_id', '=', $request->id)->first();
            $mlUpdate->lg_id = $request->lg_id;
            $mlUpdate->update();
            
            
        }  catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Save Successfully']);
    }
    /**
     * @method_name :- mlDestroy
     * -------------------------------------------------------- 
     * @param  :-  $id
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:54:49
     * description :- Id wise data delete
     */
    public function mlDestroy($id)
    {
        try {
            $mlDelete = Mhls::where('l_id','=',$id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Delete Successfully']);
    }
}
