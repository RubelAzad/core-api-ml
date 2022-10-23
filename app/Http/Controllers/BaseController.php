<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{
    /**
     * @method_name :- __construct
     * -------------------------------------------------------- 
     * @param  :-  $model
     * ?return :-  $model
     * author :-  Abul Kalam Azad
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:16:01
     * description :- Globaly data found
     */
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * @method_name :- setPageData
     * -------------------------------------------------------- 
     * @param  :-  $page_title,$sub_title,$page_icon
     * ?return :-  view()
     * author :-  Abul Kalam Azad
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:16:56
     * description :- every view return page title, sub title, page icon use this function
     */
    protected function setPageData($page_title,$sub_title,$page_icon)
    {
        view()->share(['page_title'=>$page_title,'sub_title'=>$sub_title,'page_icon'=>$page_icon]);
    }
    /**
     * @method_name :- delete_message
     * -------------------------------------------------------- 
     * @param  :- $result
     * ?return :-  $result
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:20:24
     * description :- if you delete any date this function use and easly delete message response show.
     */
    protected function delete_message($result)
    {
        return $result ? ['status'=>'success','message'=> 'Data has been deleted successfully']
        : ['status'=>'error','message'=> 'Failed to delete data'];
    }
    /**
     * @method_name :- bulk_delete_message
     * -------------------------------------------------------- 
     * @param  :-  $result
     * ?return :-  $result
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:23:17
     * description :- if you bulk delete this function use and easly delete message response show.
     */
    protected function bulk_delete_message($result)
    {
        return $result ? ['status'=>'success','message'=> 'Selected data has been deleted successfully']
        : ['status'=>'error','message'=> 'Failed to delete selected data'];
    }
    /**
     * @method_name :- data_message
     * -------------------------------------------------------- 
     * @param  :-  $data
     * ?return :-  $data
     * author :-  API
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:25:05
     * description :- parametter request if data failed status=error with message show it.
     */
    protected function data_message($data)
    {
        return $data ? $data : ['status'=>'error','message'=>'No data found'];
    }

    /**
     * @param $error_code
     * @param $message
     * @return response
     */
    protected function showErrorPage($error_code=404,$message=null)
    {
        $data['message'] = $message;
        return response()->view('errors.'.$error_code,$data,$error_code);
    }

    /**
     * @param $status
     * @param $message
     * @param $data
     * @param $response_code
     * @return response
     * created_by:- Abul Kalam Azad
     * created_at:- 17/10/2022 15:25:05
     */

    protected function response_json($status='success',$message=null,$data=null,$response_code=200)
    {
        return response()->json([
            'status'        => $status,
            'message'       => $message,
            'data'          => $data,
            'response_code' => $response_code,
        ]);
    }
}