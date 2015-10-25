<?php

namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use App\Models\Admin\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        $users['users'] = User::all();
        return response()->json(['status'=>'ok','response'=>$users], 200);
    }
}
