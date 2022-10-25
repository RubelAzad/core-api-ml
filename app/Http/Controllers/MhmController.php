<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MhmFormRequest;
use App\Models\Mhms;

class MhmController extends Controller
{
    /**
     * @method_name :- getmhmAll
     * -------------------------------------------------------- 
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:48:59
     * description :- See the all license data list
     */
    public function getMhmAll()
    {
        try {
                $mhmAll = Mhms::select('m_id','mg_id','m_name','created_at','updated_at')->get();
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully', 'Data'=> $mhmAll]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }
    /**
     * @method_name :- mhmStore
     * -------------------------------------------------------- 
     * @param  :-  $request
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:51:09
     * description :- first check lg_id then save the data into the database.
     */
    public function mhmStore(Request $request)
    {
        $mg_id = $request->mg_id;
        if (empty($mg_id)){
            return response()->json(['status' => 'error', 'message' => 'You must fill the fields']);
        }

        try {
            $mhms = new Mhms();
            $mhms->mg_id = $request->mg_id;
            $mhms->m_name = $request->m_name;

            if ($mhms->save()) {
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    /**
     * @method_name :- mhmEdit
     * -------------------------------------------------------- 
     * @param  :-  $id
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:53:01
     * description :- Id wise data license return.
     */
    public function mhmEdit($id)
    {

        try {
            if(!empty($id)){
                $mhmEdit = Mhms::where('m_id','=', $id)->get();
                return response()->json(['status' => '200', 'message' => 'Data Edit Successfully', 'Data'=> $mhmEdit]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        
    }
    /**
     * @method_name :- mhmUpdate
     * -------------------------------------------------------- 
     * @param  :-  $request, $id
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:55:54
     * description :- id wise update
     */
    public function mhmUpdate(MhmFormRequest $request, $id)
    {
        try {
            $mhmUpdate = Mhms::where('m_id', '=', $request->id)->first();
            $mhmUpdate->mg_id = $request->mg_id;
            $mhmUpdate->m_name = $request->m_name;
            $mhmUpdate->update();
            
            
        }  catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Save Successfully']);
    }
    /**
     * @method_name :- mhmDestroy
     * -------------------------------------------------------- 
     * @param  :-  $id
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:54:49
     * description :- Id wise data delete
     */
    public function mhmDestroy($id)
    {
        try {
            $mhmDelete = Mhms::where('m_id','=',$id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Delete Successfully']);
    }
}
