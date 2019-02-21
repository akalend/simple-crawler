<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Library\Parser;
use \App\Film;

class Crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse HTML content from lost.tv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // $link = "http://www.lostfilm.tv/new";
        // $html = file_get_contents($link);

        
        $html = file_get_contents('lostfilm.html');

        $pos=0;

        while ( 1 ) {    
            list($row, $pos) = Parser::getRowHtml($html, $pos);
            if( !$pos) break;

            $film = new Film();
            $film->title = Parser::getFilmTitle($row);
            $film->episode_name = 'Тестовый фильм'; //Parser::getEpisodeName($row);
            $film->date_show =  Parser::getDateEpisode($row);
            $film->link =  Parser::getLink($row);
            $film->season = 1;
            $film->episode_num = 2;
            $film->save();
        }    
    }
}
