<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>FMA-r</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.leddisplay.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="stylesheets/btns.min.css">

    <style>
        body {
            background-color: #ffffff;
        }

        a{
            text-decoration: none;
            color: #000000;
        }

        a:hover{
            text-decoration: underline;
        }

        #header {
            font-family: 'Quicksand', sans-serif;
            font-size: 64pt;
            text-align: center;
        }

        #track_text{
            font-family: 'Quicksand', sans-serif;
            font-weight: 900;
            text-align: center;
        }

        #box {
            width: 300px;
            height: 400px;
            margin: auto;
        }

        #media {
            height: auto
        }

        .nextSong {
            float: right;
        }

        #track_art, #track_art_box {
            height: 300px;
            width: 300px;
        }

        #player_box {
            height: 50px;
            width: 300px;
        }

        #controls {
            visibility: hidden;
        }
    </style>

</head>

<body>
<h1 id="header">FMA-R</h1>

<div id="box">
    <div id="media">
        <div id="track_text">Press play to start</div>
        <br>
        <div id='track_art_box'>
            <a href='#' class="nextSong"><img id='track_art' src='play.png' alt=''/></a>
        </div>
        <div id="player_box">
            <div id="player"></div>
        </div>

    </div>

    <div id="controls">
        <a href="#" class="btn btn--m btn--black prevSong">Prev</a>
        <a href="#" class="btn btn--m btn--black nextSong">Next</a>
    </div>
</div>
<br>



<script>
    var previousSongs = [];
    var song;
    $(document).ready(function () {
        $('.nextSong').on('click', function (e) {

            $.ajax({
                type: 'POST',
                url: 'get_track.php',
                dataType: 'json',
                success: function (track) {
                    song = track;
//                        ['track_id'],
//                        ['track_title'],
//                        ['track_url'],
//                        ['track_image_file'],
//                        ['artist_id'],
//                        ['artist_name'],
//                        ['artist_url'],
//                        ['artist_website'],
//                        ['album_id'],
//                        ['album_title'],
//                        ['album_url'],
//                        ['license_title'],
//                        ['track_duration'],
//                        ['track_number'],
//                        ['track_instrumental'],
//                        ['player']

                    $('#track_text').html("<a href='"+ song['artist_url'] +"' target='_blank'>" + song['artist_name'] + "</a> - <a href='"+ song['track_url'] +"' target='_blank'>" + song['track_title']);

                }
            })

        })


    });

    $(document).ajaxStart(function () {
        $('#controls').fadeOut();
        $('#player').fadeOut();
        $('#track_text').fadeOut();
        $('#track_art').fadeOut(function () {
            $('#track_art').attr('src', 'loading.gif')
        });
        $('#track_art').fadeIn();

    });

    $(document).ajaxComplete(function () {
        $('#track_art').fadeOut(function () {
            $('#track_art').attr('src', song['track_image_file']);
            $("#track_art").one("load", function () {
                $('#controls').css('visibility', 'visible');
                $('#controls').fadeIn(function () {});
                $('#player').html(song['playerHTML']);
                $('#player').fadeIn();
                $('#track_text').fadeIn();
                $('#track_art').fadeIn();

            }).each(function () {
                if (this.complete) $(this).load();
            });

        });
        $('#track_art').attr('alt', song['artist_name']);
    });

    $(document).ajaxError(function (e, jqxhr, settings, exception) {
        alert(exception);
    })
</script>
</body>
</html>

