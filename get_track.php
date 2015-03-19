<?php

$page = rand(1,4057);
$track_id = rand(0, 19);

$url = "http://freemusicarchive.org/api/get/tracks.json?api_key=7Y2HJLL7FFMODARC&page=$page";
$content = file_get_contents($url);
$json = json_decode($content, true);

$track_id = $json['dataset'][$track_id]['track_id'];

$player = <<<EOD
    <div id="box">
    <object width="300" height="50"><param name="movie" value="http://freemusicarchive.org/swf/trackplayer.swf"/>
        <param name="flashvars" value="track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml"/>
        <param name="allowscriptaccess" value="sameDomain"/>
        <embed type="application/x-shockwave-flash" src="http://freemusicarchive.org/swf/trackplayer.swf" width="300" height="50" flashvars="track=http://freemusicarchive.org/services/playlists/embed/track/$track_id.xml" allowscriptaccess="sameDomain" />
    </object>
EOD;

echo $player;

?>