<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Countries;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function registerPage(){
    	return view('frontend.register.index');
    }

    public function registerClientForm(){
        $countries = Countries::all();
        return view('frontend.register.client',compact('countries'));
    }

    public function registerCompanyForm(){
    	$countries = Countries::all();
        return view('frontend.register.company',compact('countries'));
    }
}
