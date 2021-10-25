
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Video Viewer</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"><!-- https://getbootstrap.com -->
        <link href="https://vjs.zencdn.net/5.19.2/video-js.css" rel="stylesheet"><!-- https://videojs.com -->
        <style type="text/css">
            .video-js {
                font-size: 1rem;
            }

            * {
                box-sizing: border-box;
            }
            body {
                font-family: 'Montserrat', sans-serif;
                line-height: 1.6;
                margin: 0;
                min-height: 100vh;
            }
            ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }


            h2,
            h3,
            a {
                color: #34495e;
            }

            a {
                text-decoration: none;
            }



            .logo {
                margin: 0;
                font-size: 1.45em;
            }

            .main-nav {
                margin-top: 5px;

            }
            .logo a,
            .main-nav a {
                padding: 10px 15px;
                text-transform: uppercase;
                text-align: center;
                display: block;
            }

            .main-nav a {
                color: #34495e;
                font-size: .99em;
            }

            .main-nav a:hover {
                color: #718daa;
            }



            .header {
                padding-top: .5em;
                padding-bottom: .5em;
                border: 1px solid #a2a2a2;
                background-color: #f4f4f4;
                -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }


            /* ================================= 
              Media Queries
            ==================================== */




            @media (min-width: 769px) {
                .header,
                .main-nav {
                    display: flex;
                }
                .header {
                    flex-direction: column;
                    align-items: center;
                    .header{
                        width: 80%;
                        margin: 0 auto;
                        max-width: 1150px;
                    }
                }

            }

            @media (min-width: 1025px) {
                .header {
                    flex-direction: row;
                    justify-content: space-between;
                }

            }

        </style>
    </head>
    <body class="bg-light">


        <div class="container">
            @foreach($videos as $video)
            <div class="my-5 embed-responsive embed-responsive-16by9">
                <video id="video" class="embed-responsive-item video-js vjs-default-skin" width="300" height="360" autoplay controls></video>
            </div>

        </div>
        <script src="https://vjs.zencdn.net/5.19.2/video.js"></script><!-- https://videojs.com -->
        <script src="/js/hls.min.js?v=v0.9.1"></script><!-- https://github.com/video-dev/hls.js -->
        <script src="/js/videojs5-hlsjs-source-handler.min.js?v=0.3.1"></script><!-- https://github.com/streamroot/videojs-hlsjs-plugin -->
        <script src="/js/vjs-quality-picker.js?v=v0.0.2"></script><!-- https://github.com/streamroot/videojs-quality-picker -->
        <script>
            var player = videojs('video');

            player.qualityPickerPlugin();

            player.src({
                src: 'http://localhost:8000/storage/{{ $video->stream_path }}',
                type: 'application/x-mpegURL'
            });

            player.play();
        </script>
        @endforeach
    </body>
</html>

