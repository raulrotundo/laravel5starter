<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin/dashboard', [
<<<<<<< HEAD
            'name'    => Auth::user()->name
=======
            'name' => Auth::user()->name
>>>>>>> 317455b974d439fbc434032fc00e68c3e31a8719
        ]);
    }
}
