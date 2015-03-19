<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>FMA-r</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="stylesheets/btns.min.css" >

    <style>
        #box{
            width: 300px;
            height: 50px;
            margin: auto;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
        }
        #media{
            height:50px;

        }
        .nextSong{
            float:right;
        }
    </style>

</head>

<body>

<div id="box">
    <div id="media"></div>
    <br>
    <a href="#" class="btn btn--m btn--black prevSong">Prev</a>
    <a href="#" class="btn btn--m btn--black nextSong">Next</a>
</div>



<script>
    $(document).ready(function(){
        $('.nextSong').on('click',function(e){
            $.ajax({
                type:'POST',
                url:'get_track.php',
                success: function(media){
                    $('#media').html(media)
                }
            });
        })
    })
</script>
</body>
</html>

