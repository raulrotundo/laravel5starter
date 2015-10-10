<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Lang;

class LanguageController extends Controller {

	public function switchLang($lang)
	{
		if (array_key_exists($lang, Config::get('languages'))) {
			Session::set('applocale', $lang);
		}
		return Redirect::back();
	}

	public function DataTableLang()
	{
		return Lang::get('admin/datatable');
	}
}
