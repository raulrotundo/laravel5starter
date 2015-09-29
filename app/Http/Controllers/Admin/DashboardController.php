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
            'name'    => Auth::user()->name
        ]);
    }
}
