<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            body {
                background: #eeeded;
            }

            .card {
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                transition: all 0.2s ease-in-out;
                box-sizing: border-box;
                margin-top:10px;
                margin-bottom:10px;
                background-color:#FFF;
            }

            .card:hover {
                box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            }
            .card > .card-inner {
                padding:10px;
            }
            .card .header h2, h3 {
                margin-bottom: 0px;
                margin-top:0px;
            }
            .card .header {
                margin-bottom:5px;
            }
            .card img{
                width:100%;
            }
        </style>
    </head>
    <body>
        <div class="container" style="margin-top:10px;">
 <a href="/uploader" class="btn btn-primary">Add videos</a>
            <div class="row">

                @foreach($videos as $video)      
                <div class="col-md-4">
                    <div class="card">
                        <div class="image img-reponsive">
                            <img src="/image/play-button.png" />
                        </div>
                        <div class="card-inner">
                            <div class="header">
                                <h2>{{ $video->title }}</h2>
                                <h3>{{ $video->original_name }}</h3>
                            </div>
                            <div class="content">
                                <p>{{ $video->converted_for_streaming_at }}</p>
                                <a href="/viewsinglevideo/{{ $video->id }}" class="btn btn-default">View Video</a>
                                <a href="/uploader" class="btn btn-primary">Add videos</a>
                            </div>

                        </div>
                    </div>
                </div>     
                @endforeach

            </div>

        </div>

    </body>
</html>
