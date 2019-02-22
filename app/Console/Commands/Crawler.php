<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use \App\Library\Parser;
use \App\Library\PageLoader;
use \App\Film;


class Crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parse {level}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse HTML content from lostfilm.tv';

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





        $last_load = Cache::get('last_film', '');
        $level = (int) $this->argument('level'); 
        
        PageLoader::init();
        
        $i = 1;
        while ( $level-- > 0) {
        $url = sprintf("http://www.lostfilm.tv/new/page_%d", $i++);    

            $this->info($url);
            if ( PageLoader::run($url, $last_load ) == -1) break;

        }

        

    }
}
