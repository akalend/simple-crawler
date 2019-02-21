<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use \App\Film;


class ShowFilmController extends Controller
{
    //
	public function index(Request $request): View
    {
        
        $Film = new Film();

        // $films = ;


        return view('films.show', ['films' => $Film::all()] );
    }


}
