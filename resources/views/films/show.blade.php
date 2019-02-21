<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content-title {
                text-align: left;
                font-family:  sans-serif;
                font-size: 14pt;                
            }

            .content {
                text-align: left;
                font-family:  arial;
                font-size: 14pt; bold;                
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;                
                font-size: 10pt;                
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .page-item {
                list-style-type: none;

            }

            .pagination li {display:inline-block;}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
                

                @if (count($films) > 0)
                    
                    @foreach ($films as $film)
                    <hr/>

                        <div  style="font-size: 10pt">сезон {{ $film->season}}  эпизод {{ $film->episode_num}}</div> 
                        <div class="content">{{ $film->title }} </div>
                        <div  style="font-size: 10pt">дата выхода рус {{ $film->date_show}}</div> 
                        <div  style="font-size: 10pt">{{ $film->episode_name}}</div>
                        <a  style="font-size: 10pt" href="http://www.lostfilm.tv/{{ $film->link}}">{{ $film->episode_name}}</a>
                    @endforeach
                    
                @else
                   <div class="title m-b-md"> Ни чего пока нет </div>    
                @endif
                <div style="list-style-type: none;  display: flex; flex-direction: row; ">  
                {{ $films->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
