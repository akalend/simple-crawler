<?php

namespace App\Library;

use Illuminate\Support\Facades\Cache;
use \App\Library\Parser;
use \App\Film;


class PageLoader
{


	private static $isFirst = false;


    /**
     * Crawle url
     *
     * @return void
     */
    static public function run($url, $last_update)
    {
        $html = file_get_contents($url);

        $pos = 0;

        while ( 1 ) {    
            list($row, $pos) = Parser::getRowHtml($html, $pos);
            if( !$pos) break;

            $film = new Film();
            $season = Parser::getSeasonNum($row);
            $film->season = $season['season'];
            $film->episode_num = $season['episode'];
            $film->title = Parser::getFilmTitle($row);
     
            $key = $film->title . '_'. $season['season'] . '/'. $season['episode'];

            if ($last_update == $key) return -1;
			if ($last_update == ''  ||  static::$isFirst ) {
				Cache::forever('last_film', $key);
				static::$isFirst = false;
			} 


            $film->date_show =  Parser::getDateEpisode($row);

            // if ($film->date_show  < $last_update  )///

            $film->episode_name = Parser::getEpisodeName($row);
            
            $film->link =  Parser::getLink($row);
            
            $film->save();
            print( sprintf("download: %s [%s/%s]\n",  
                $film->title, $season['season'], $season['episode'] ));

            unset($film);
        }    
       
        return 0;
    }

     /**
     * Init Page Loader
     *
     * @return void
     */
    static public function init() 
    {
    	static::$isFirst = true;
    }
}