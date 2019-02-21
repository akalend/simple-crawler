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
    static public function run($url)
    {
        $html = file_get_contents($url);

        $pos=0;

        while ( 1 ) {    
            list($row, $pos) = Parser::getRowHtml($html, $pos);
            if( !$pos) break;

            $film = new Film();
            $film->title = Parser::getFilmTitle($row);
            $film->episode_name = Parser::getEpisodeName($row);
            $film->date_show =  Parser::getDateEpisode($row);
            $film->link =  Parser::getLink($row);
            $season = Parser::getSeasonNum($row);
            $film->season = $season['season'];
            $film->episode_num = $season['episode'];
            
            $film->save();
        }    
       
    }
}