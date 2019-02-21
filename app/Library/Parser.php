<?php

namespace App\Library;


class Parser 
{

	protected $content;


    /**
     * Create a new  instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }
    /**
     * @parm html string - input html.
     *
     * @return string 
     */
    public static function getRowHtml($html, $pos0)
    {
        $pos1 = strpos( $html, '<div class="row">', $pos0+1);

        $pos2 = strpos( $html, '<div class="hor-breaker dashed">', $pos1);
        $tag =  substr( $html, $pos1 , $pos2-$pos1);
        return [ substr( $tag, strpos($tag,'>') +1 ), $pos1];
    }

    /**
     * @parm html string - input html.
     *
     * @return string Russian Film title 
     */
    public static function getFilmTitle($html)
    {
        $pos1 = strpos( $html, '<div class="name-ru">');
        $pos2 = strpos( $html, '</div>', $pos1);
        $tag =  substr( $html, $pos1 , $pos2-$pos1);
		return substr( $tag, strpos($tag,'>') +1 );
    }

    /**
     * @parm html string - input html.
     *
     * @return string Russian Episode title 
     */
     public static function getEpisodeName($html) {
        $pos1 = strpos( $html, '<div class="alpha">');
        $pos2 = strpos( $html, '</div>', $pos1);
        $tag =  substr( $html, $pos1 , $pos2-$pos1);
        return substr( $tag, strpos($tag,'>') +1 );
    }    

    /**
     * @parm html string - input html.
     *
     * @return string Russian Episode title 
     */
     public static function getDateEpisode($html) {
        $pos0 = strpos( $html, '<div class="hor-spacer3">');
        $pos1 = strpos( $html, '<div class="alpha">', $pos0);
        $pos2 = strpos( $html, '</div>', $pos1);
        $tag =  substr( $html, $pos1 , $pos2-$pos1);
        $res = substr( $tag, strpos($tag,'>') + 1 );
        // return substr($res, strpos( $res, ':') + 2 );
        $d1 = strtotime(substr($res, strpos( $res, ':') + 2 )); // переводит из строки в дату
        return date("Y-m-d", $d1); 
    }    



    /**
     * @parm html string - input html.
     *
     * @return string Russian Episode title 
     */
     public static function getSeasonNum( $row )
     {
        $html_div_1 = '<div class="left-part">';
        $pos1 = strpos( $row, $html_div_1);
        $pos2 = strpos( $row, "сезон");
        $pos3 = strpos( $row, " ", $pos2);

        $content = substr($row, $pos1 + strlen($html_div_1), $pos2 - $pos1 - strlen($html_div_1));

        $pos3 = strpos( $row, " ", $pos2);
        $pos4 = strpos($row,  "серия" , $pos1);

        return [
           'season'=> $content,  // season
            'episode' => substr($row, $pos3 +1, $pos4 - $pos3 - 1 ), // seria
        ];


     }




    /**
     * @parm html string - input html.
     *
     * @return string data of show in Russia 
     */
    public static function getLink($html) {
        preg_match('/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/', $html, $matches);
        
        return $matches[2];
    }    
}
