<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function index(){
        return view('front.pages.index');
    }

    /**
     *
     * @Route front.lang
     *
     * setlang method take's one param $lang
     *
     * the value incoming to the method should be used to set
     *
     * the lang of the app to the user
     *
     * the value MUST be an shortcut to lang name like
     *
     * ar for arabic en for english es for eSpanish .etc
     */
    public function setlang($lang){
        App::setLocale($lang);
        Session::put('lang',$lang);
        return view('front.pages.index');
    }
}
