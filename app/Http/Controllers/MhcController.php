<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mhcs;

class MhcController extends Controller
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
    public function getMhcAll()
    {
        try {
                $mhcAll = Mhcs::with(['mhlId','mhmId'])->get();
                //$mhcAll = Mhcs::select('cg_id','c_name','cgl_id','cgm_id','c_sdate','c_edate','created_at','updated_at')->get();
                return response()->json(['status' => '200', 'message' => 'Data Save Successfully', 'Data'=> $mhcAll]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }
    /**
     * @method_name :- Mhcstore
     * -------------------------------------------------------- 
     * @param  :-  $request
     * ?return :-  response()->json
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 24/10/2022 11:51:09
     * description :- first check lg_id then save the data into the database.
     */
    public function Mhcstore(Request $request)
    {
        $cg_id = $request->cg_id;
        if (empty($cg_id)){
            return response()->json(['status' => 'error', 'message' => 'You must fill the fields']);
        }

        try {
            $Mhcs = new Mhcs();
            $Mhcs->cg_id = $request->cg_id;
            $Mhcs->c_name = $request->c_name;
            $Mhcs->cgl_id = $request->cgl_id;
            $Mhcs->cgm_id = $request->cgm_id;
            $Mhcs->c_sdate = $request->c_sdate;
            $Mhcs->c_edate = $request->c_edate;

            if ($Mhcs->save()) {
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
    public function mhcEdit($id)
    {

        try {
            if(!empty($id)){
                $mhcEdit = Mhcs::where('c_id','=', $id)->get();
                return response()->json(['status' => '200', 'message' => 'Data  Edit Successfully', 'Data'=> $mhcEdit]);
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
    public function mhcUpdate(MhmFormRequest $request, $id)
    {
        try {
            $mhcUpdate = Mhcs::where('c_id', '=', $request->id)->first();
            $mhcUpdate->cg_id = $request->cg_id;
            $mhcUpdate->c_name = $request->c_name;
            $mhcUpdate->cgl_id = $request->cgl_id;
            $mhcUpdate->cgm_id = $request->cgm_id;
            $mhcUpdate->c_sdate = $request->c_sdate;
            $mhcUpdate->c_edate = $request->c_edate;
            $mhcUpdate->update();
            
            
        }  catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Updated Successfully']);
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
    public function mhcDestroy($id)
    {
        try {
            $mhcDelete = Mhcs::where('c_id','=',$id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json(['status' => '200', 'message' => 'Data Delete Successfully']);
    }
}
