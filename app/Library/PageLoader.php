<?php

namespace App\Library;

use \App\Library\Parser;
use \App\Film;


class PageLoader
{


    /**
     * Crawle url
     *
     * @return void
     */
    static public function run($url, $last_update)
    {
        $html = file_get_contents($url);

        $pos=0;

        while ( 1 ) {    
            list($row, $pos) = Parser::getRowHtml($html, $pos);
            if( !$pos) break;

            $film = new Film();
            $season = Parser::getSeasonNum($row);
            $film->season = $season['season'];
            $film->episode_num = $season['episode'];
            $film->title = Parser::getFilmTitle($row);
     
            $key = film->title . '_'. $season['season'] . '_'. $season['episode'];

            if ($last_update == $key) return -1;

            $film->date_show =  Parser::getDateEpisode($row);

            // if ($film->date_show  < $last_update  )///

            $film->episode_name = Parser::getEpisodeName($row);
            
            $film->link =  Parser::getLink($row);
            
            $film->save();

            unset($film);
        }    
       
        return 0;
    }
}