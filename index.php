<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>FMA-r</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="stylesheets/btns.min.css">

    <style>
        #header{
            font-family: 'Quicksand', sans-serif;
            font-size: 64pt;
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

        #track_art, #track_art img {
            height: 300px;
            width: 300px;
        }
    </style>

</head>

<body>
<h1 id="header">FMA-R</h1>
    <div id="box">
        <div id="media"><?php require('get_track.php') ?></div>
        <br>
        <a href="#" class="btn btn--m btn--black prevSong">Prev</a>
        <a href="#" class="btn btn--m btn--black nextSong">Next</a>
    </div>

<script>
    $(document).ready(function () {
        $('.nextSong').on('click', function (e) {

            $.ajax({
                type: 'POST',
                url: 'get_track.php',
                success: function (media) {
                    $('#media').html(media);
                }
            });

        })

//        $('html').css({
//            "background": "url(" + $('#track_art img').attr('src') + ") no-repeat center center fixed",
//            "-webkit-background-size": "cover",
//            "-moz-background-size": "cover",
//            "-o-background-size": "cover",
//            "background-size": "cover"
//        })
    });

    $(document).ajaxStart(function () {
        $('#track_art img').fadeOut();
    });
    //
    $(document).ajaxStop(function () {

    });

    $(document).ajaxError(function (e, jqxhr, settings, exception) {
        alert(exception);
    })


</script>
</body>
</html>

