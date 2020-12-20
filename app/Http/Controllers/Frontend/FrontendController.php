<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        //to set the local lang as user choice
        App::setLocale($lang);
        //set a session names lang hold the $lang value to use into the page to controle the lang changer appearance
        Session::put('lang',$lang);

        return view('front.pages.index');
    }

    public function parts(Request $request){

    }

    public function contact(Request $request){

        $rules = $this->getrules();

        $massage = $this->getmassages();

        $data = Validator::make($request->all(),$rules,$massage);

        if($data->fails()){

            $request->flash();

            return redirect()->back()->withErrors($data)->withInput($request->all());

         }

        return redirect()->back()->with(['done'=>__('messages.done')]);
    }

    private function getmassages(){
        //get the error massage's from according to the curent local lang
        $file ='trans';
         return $massage =[
        'name.required'=> __("$file.name"),
        'name.max'=> __("$file.name_len"),
        'mail.required'=> __("$file.mail"),
        'mail.email'=> __("$file.mail_type"),
        'phone.required'=> __("$file.phone"),
        'massage.required'=> __("$file.massage"),
        ];
    }

    private function getrules(){
        return $rules = [
        'name'=>'required|max:100',
        'mail'=>'required|email',
        'phone'=>'required',
        'massage'=>'required|max:250',
        ];
    }


}
