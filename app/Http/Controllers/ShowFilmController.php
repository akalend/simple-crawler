<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use \App\Film;


class ShowFilmController extends Controller
{
    

    
	public function index(Request $request): View
    {        
        return view('films.show', 
        	['films' => DB::table('films')
        		->orderBy('date_show', 'desc')
        		->paginate(config('view.paging'))] );
    }


}
